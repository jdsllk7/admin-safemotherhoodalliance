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
		$sql = "SELECT * FROM emailsubscribe ORDER BY emailSubscribeDate DESC";
		return $this->connect()->query($sql);
	} //end getSubscribedEmails()

	public function deleteEmail($emailId)
	{
		$sql = "DELETE FROM emailsubscribe WHERE emailSubscribeId = $emailId";
		if ($this->connect()->query($sql) === TRUE) {
			// if (true) {
			$this->response['status'] = true;
			$this->response['message'] = 'Email deleted successfully';
		} else {
			$this->response['status'] = false;
			$this->response['message'] = 'Failed to delete email. Please try again';
		}
		return $this->response;
	} //end deleteEmail()
}//end class
