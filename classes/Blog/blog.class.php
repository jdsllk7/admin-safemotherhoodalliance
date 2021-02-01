<?php

namespace Blog;

use Db;

class Blog extends Db
{
	private $blogTitle;
	private $blogText;
	private $blogId;
	private $action;
	private $response = array(
		'status' => false,
		'message' => '',
		'type' => ''
	);

	public function getAllBlogs()
	{
		$conn = $this->connect();
		$sql = "SELECT * FROM blog ORDER BY uploadDate DESC";
		return $conn->query($sql);
	} //end getAllBlogs()


	public function getHTMLBlogs()
	{
		$conn = $this->connect();
		$html = "";
		$result = $this->getAllBlogs();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$dt = new \DateTime($row["uploadDate"]);
				$newDate = $dt->format('d-m-Y');
				$html .= '
				<div class="card card-widget collapsed-card blogPost">
				  <div class="card-header border-0">
					<div class="user-block hand" data-card-widget="collapse">
					  <img class="img-circle" src="' . $this->getFilePath('blog', $row["blogId"], $conn)[0] . '" alt="Image">
					  <span class="username"><span class="text-primary">' . $row["blogTitle"] . '</span></span>
					  <span class="description">Published on: ' . $newDate . ' | ' . $this->getTimeAgo($row["uploadDate"]) . '</span>
					</div>
					<div class="card-tools">
					  <form class="inline previewBlogForm">
						<input type="hidden" name="filePath" value="' . $this->getFilePath('blog', $row["blogId"], $conn)[0] . '">
						<input type="hidden" name="blogTitle" value="' . $row["blogTitle"] . '">
						<input type="hidden" name="blogText" value="' . $row["blogText"] . '">
						<input type="hidden" name="blogId" value="' . $row["blogId"] . '">
						<button type="submit" class="btn btn-tool" title="Edit Blog">
						  <i class="fas fa-edit"></i>
						</button>
					  </form>
					  <button type="button" class="btn btn-tool" title="Hide/Show Post" data-card-widget="collapse">
						<i class="fas fa-plus"></i>
					  </button>
					  <form class="inline deleteBlogForm">
						<input type="hidden" name="blogId" value="' . $row["blogId"] . '">
						<button type="submit" class="btn btn-tool" title="Delete Blog">
						  <i class="fas fa-trash"></i>
						</button>
					  </form>
					</div>
				  </div>
				  <div class="card-body pb-1">
					<div class="attachment-block clearfix border-0 p-2">
					  <img class="attachment-img rounded" src="' . $this->getFilePath('blog', $row["blogId"], $conn)[0] . '" alt="Attachment Image">
					  <div class="attachment-pushed">
						<h4 class="attachment-heading"><a class="text-primary font-medium bold">' . $row["blogTitle"] . '</a></h4>
						<div class="attachment-text font-medium">
							' . $row["blogText"] . '
						</div>
					  </div>
					</div>
					<iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fsafemotherhoodalliance.org/blog-single.php?blogId=' . $row["blogId"] . '&layout=button_count&size=large&appId=2016607135310765&width=88&height=28" width="88" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

					<a class="btn btn-sm btn-primary font-small bold mb-4" style="background-color: #55acee" href="http://twitter.com/share?text=Some accompanying text&url=https://safemotherhoodalliance.org/blog-single.php?blogId=' . $row["blogId"] . '&hashtags=SafeMotherhoodAlliance,SafeDelivery" role="button"><i class="fab fa-twitter me-2"></i>Twitter</a>
					<!-- <button type="button" title="Share on Twitter" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Twitter</button> -->
					<!-- <button type="button" title="Share on LinkedIn" class="btn btn-default btn-sm"><i class="fas fa-share"></i> LinkedIn</button> -->
					<!-- <button type="button" title="Send to all Email Subscribers" class="btn btn-default btn-sm"><i class="fas fa-share"></i> All Subscribers</button> -->
				  </div>
				</div>
				';
			} //end while()
			$this->response['status'] = true;
			$this->response['message'] = $html;
		} else {
			$this->response['status'] = false;
		}
		return $this->response;
	} //end getHTMLBlogs()

	public function deleteBlog($blogId)
	{
		$conn = $this->connect();
		$sql = "DELETE FROM blog WHERE blogId = $blogId";
		if ($conn->query($sql) === TRUE) {
			// if (true) {
			$this->response['status'] = true;
			$this->response['message'] = 'Blog deleted successfully';
		} else {
			$this->response['status'] = false;
			$this->response['message'] = 'Failed to delete blog. Please try again';
		}
		return $this->response;
	} //end deleteBlog()


	public function saveBlog($files, $blogTitle, $blogText, $blogId, $action)
	{
		//db connector
		$conn = $this->connect();
		//clean up
		$this->blogTitle = $this->stripOff($conn, $blogTitle);
		$this->blogText = $this->stripOff($conn, $blogText);
		$this->blogId = $this->stripOff($conn, $blogId);
		$this->action = $this->stripOff($conn, $action);

		//validate
		if (!$this->isFileSelected($files, "", 'img')) { //types: img, pdf, video, word, excel, ...
			$this->response['status'] = false;
			$this->response['message'] = 'Please attach valid image of format: (.jpg / .png / .jpeg)';
		} elseif (!$this->validate_text($this->blogTitle, 'required')) {
			$this->response['status'] = false;
			$this->response['message'] = 'Please provide valid blog title';
		} elseif (!$this->validate_textarea($this->blogText, 'required')) {
			$this->response['status'] = false;
			$this->response['message'] = 'Please provide valid blog text';
		} elseif (!$this->validate_decimal_or_whole_number($this->blogId, '')) {
			$this->response['status'] = false;
			$this->response['message'] = 'System error. Reload page and try again';
		} elseif (!$this->validate_text($this->action, 'required')) {
			$this->response['status'] = false;
			$this->response['message'] = 'System error. Reload page and try again';
		} else {

			if ($this->action == "new") {
				$sql = "INSERT INTO `blog`(`blogTitle`, `blogText`) VALUES ('" . $this->blogTitle . "', '" . $this->blogText . "')";
			} elseif ($this->action == "old") {
				$sql = "UPDATE blog SET blogTitle = '$this->blogTitle', blogText = '$this->blogText' WHERE blogId = $this->blogId";
			} else {
				$this->response['status'] = false;
				$this->response['message'] = 'System error. Reload page and try again';
			}

			if ($conn->query($sql) === TRUE) {

				$last_id = "";
				if ($this->action == "old") {
					$blogData = $conn->query("SELECT blogId FROM blog WHERE blogId = $this->blogId");
					$blogResult = mysqli_fetch_assoc($blogData);
					$last_id = $blogResult["blogId"];
				} elseif ($this->action == "new") {
					$last_id = $conn->insert_id;
					// var_dump($conn->insert_id);
				} else {
					$this->response['status'] = false;
					$this->response['message'] = 'System error. Reload page and try again';
				}
				if (($this->action == "old" || $this->action == "new") && $last_id !== "" && $last_id !== 0) {
					$this->uploadFiles($_FILES, "dist/img/uploads/blog", 'blog', $last_id, "../", true, $conn);
					$this->response['status'] = true;
					if ($this->action == "old") {
						$this->response['message'] = 'Changes saved successfully';
					} elseif ($this->action == "new") {
						$this->response['message'] = 'New blog saved successfully';
					}
				} else {
					$this->response['status'] = false;
					$this->response['message'] = 'System error. Reload page and try again';
				}
			} else {
				$this->response['status'] = false;
				$this->response['message'] = 'System error. Please try again';
			}
		}
		return $this->response;
	} //end saveBlog()
}//end class
