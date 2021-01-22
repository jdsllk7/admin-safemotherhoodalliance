<?php

namespace AdminLogin;

use Db;

class AdminLogin extends Db
{
	private $email; //class field
	private $password; //class field
	private $response = array(
		'status' => false,
		'message' => '',
		'type' => ''
	);

	public function isAdmin($email, $password)
	{
		session_start();
		//clean up values
		$this->email = $this->stripOff($this->connect(), $email);
		$this->password = $this->stripOff($this->connect(), $password);
		$sql = "SELECT * FROM admin WHERE email LIKE '" . $this->email . "' AND password LIKE '" . $this->password . "'";
		$result = $this->connect()->query($sql);
		if ($result->num_rows == 1) {
			$this->response['status'] = true;
			$this->response['message'] = 'Login successful!';
			$_SESSION["login"] = $this->response['status'];
		} else {
			$this->response['status'] = false;
			$this->response['message'] = 'Login failed. Please try again';
		}
		return $this->response;
	} //end isAdmin()

}//end class
