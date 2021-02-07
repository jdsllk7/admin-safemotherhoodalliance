<?php

namespace SubscribedEmails;

use Db;

class SubscribedEmails extends Db
{
	private $response = array(
		'status' => false,
		'message' => '',
		'type' => ''
	);
	public function getSubscribedEmails()
	{
		$conn = $this->connect();
		$sql = "SELECT * FROM emailsubscribe ORDER BY emailSubscribeDate DESC";
		return $conn->query($sql);
	} //end getSubscribedEmails()

	public function deleteEmail($emailId)
	{
		$conn = $this->connect();
		$sql = "DELETE FROM emailsubscribe WHERE emailSubscribeId = $emailId";
		if ($conn->query($sql) === TRUE) {
			// if (true) {
			$this->response['status'] = true;
			$this->response['message'] = 'Email deleted successfully';
		} else {
			$this->response['status'] = false;
			$this->response['message'] = 'Failed to delete email. Please try again';
		}
		return $this->response;
	} //end deleteEmail()

	public function emailBlog($blogTitle, $blogText, $blogId, $filePath)
	{
		$conn = $this->connect();
		$sql = "SELECT * FROM emailsubscribe ORDER BY emailSubscribeDate DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				//send email
				$receiverName = '';
				$receiverEmail = $row["email"];
				$senderEmail = "blog@safemotherhoodalliance.org";
				$btn = '<a target="_blank" href="https://safemotherhoodalliance.org/blog-single.php?blog=' . $blogId . '" class="btn text-white baby-pink-darkest-bg">Read More</a>';
				$emailSubject = "New Blog By Safemotherhoodalliance";
				$heading = "New Blog";
				$img = '<img class="mb-2 rounded" src="https://admin.safemotherhoodalliance.org/' . $filePath . '" alt="Logo" width="100%" height="auto">';
				$subheading = "";
				$subSubheading = '<h5 class="mb-3" style="color: rgba(0,0,0,.7);">' . $blogTitle . '</h5>';
				$extra = "Please take time to read our online <a href='https://safemotherhoodalliance.org/blog.php'>blog</a>";
				$this->sendEmail($receiverName, $receiverEmail, $senderEmail, $btn, $emailSubject, $heading, $subheading, $extra, $img, $subSubheading);
			}
			$sql = "UPDATE blog SET shared = 1 WHERE blogId = $blogId";
			if ($conn->query($sql) === TRUE) {
				$this->response['status'] = true;
				$this->response['message'] = 'Blog sent to all subscribers successfully';
			} else {
				$this->response['status'] = false;
				$this->response['message'] = 'System error. Blog has been email successfully but server is unresponsive';
			}
		} else {
			$this->response['status'] = false;
			$this->response['message'] = 'No subscribed emails to send to';
		}
		return $this->response;
	} //end emailBlog()


}//end class
