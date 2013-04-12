<?php 
/*
 * *************************** Creation Log *******************************
* File Name 	- Registeration.php
* Description 	- registeration model class holds business logic methods 
* Version 		- 1.0
* Created by	- Kawaljeet Singh 
* Created on 	- March 01, 2013
*/

class Registration extends AUser
{
	public $message = "added";
	
	public function setmessage()
	{
		$this->message = "successful";
	}
	
	public function getmessage()
	{
		return $this->message;
	}
	
	 /* Method called to verify email in registeration form */
	public function verifyEmail($email1)
	{
		DBConnection::Connect ();
		DBConnection::Connect ();
		$this->db->From ( "userdetails" );
		$this->db->Fields ( array (
				
				"email" 
		) );
		$this->db->Where ( array (
				"email" => $email1 
		) );
		$this->db->Select ();
		
		$a = $this->db->resultArray ();
		
		if (! empty ( $a )) {
			return true;
		}
	}
	
	 /* Method called to register student in database from registeration form */
	public function newStudentRegistration(	$email, 
											 	$password, 
											 	$firstname, 
											 	$lastname, 
											 	$phone, 
												$address, 
												$qualification, 
												$gender, 
												$date, 
												$usertype, 
												$status, 
												$profilepicture, 
												$confirm_code	)
	{
		$new_date = date ( 'Y-m-d', strtotime ( $date ) );
		$password = sha1 ( $password );
		
		DBConnection::Connect ();
		$this->db->From ( "userdetails" );
		$this->db->Fields ( array (
				"user_id" => "",
				"email" => "$email",
				"password" => "$password",
				"user_type" => "$usertype",
				"confirm_code" => "$confirm_code" 
		) );
		$this->db->Insert ();		
		$i = $this->db->lastInsertId ();		
		$this->db->From ( "studentdetails" );
		$this->db->Fields ( array (
				"user_id" => "$i",
				"firstname" => "$firstname",
				"lastname" => "$lastname",
				"phone" => "$phone",
				"address" => "$address",
				"qualification" => "$qualification",
				"gender" => "$gender",
				"dob" => "$new_date",
				"status" => "$status",
				"profilepicture" => "$profilepicture",
				"createdon" => date ( "Y/m/d" ) 
		) );
		$this->db->Insert ();
		$obj = new MainController ();
		$obj->setCustomMessage ( "SuccessMessage", "Record Has Been Added , Please Activate Your Account" );
		
		header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
	}
	 
	 /* Method called to confirm email in registeration form */
	public function confirmEmail($email, $pass)
	{
		DBConnection::Connect ();
		$this->db->From ( "userdetails" );
		$this->db->Fields ( array (
				
				"email",
				"user_type" 
		) );
		$this->db->Where ( array (
				"confirm_code" => $pass 
		) );
		$this->db->Select ();
		
		$a = $this->db->resultArray ();
		
		$rr = $a [0] ["user_type"];
		
		if (! empty ( $a )) {
			
			$this->db->From ( "userdetails" );
			$this->db->Fields ( array (
					
					"user_id" 
			) );
			$this->db->Where ( array (
					"email" => $email 
			) );
			$this->db->Select ();
			
			$b = $this->db->resultArray ();
			
			if ($rr == 'student') {
				
				$this->db->From ( "studentdetails" );
				
				$this->db->Where ( array (
						"user_id" => $b [0] ["user_id"] 
				) );
				$this->db->Fields ( array (
						"status" => "1" 
				) );
				
				$this->db->Update ();
				
				header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=You Are Activated" );
			}
			if ($rr == 'teacher') {
				
				$this->db->From ( "teacherdetails" );
				
				$this->db->Where ( array (
						"user_id" => $b [0] ["user_id"] 
				) );
				$this->db->Fields ( array (
						"status" => "1" 
				) );
				
				$this->db->Update ();
				$obj = new MainController ();
				$obj->setCustomMessage ( "SuccessMessage", "You have been activated, Login using your email id" );
				header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=You Are Activated" );
			}
		}
	}
	/* Method called to register teacher in database from registeration form */
	public function newteacherRegistration($email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code)
	{
		$new_date = date ( 'Y-m-d', strtotime ( $date ) );
		$password = sha1 ( $password );
		DBConnection::Connect ();
		$this->db->From ( "userdetails" );
		$this->db->Fields ( array (
				"user_id" => "",
				"email" => "$email",
				"password" => "$password",
				"user_type" => "$usertype",
				"confirm_code" => "$confirm_code" 
		) );
		$this->db->Insert ();
		
		$i = $this->db->lastInsertId ();
		$this->db->From ( "teacherdetails" );
		$this->db->Fields ( array (
				"user_id" => "$i",
				"firstname" => "$firstname",
				"lastname" => "$lastname",
				"phone" => "$phone",
				"address" => "$address",
				"qualification" => "$qualification",
				"gender" => "$gender",
				"dob" => "$new_date",
				"status" => "$status",
				"profilepicture" => "$profilepicture",
				"createdon" => date ( "Y/m/d" ) 
		) );
		$this->db->Insert ();
		$obj = new MainController ();
		$obj->setCustomMessage ( "SuccessMessage", "Record Has Been Added , Please Activate Your Account" );
		
		header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
	}
}

?>
