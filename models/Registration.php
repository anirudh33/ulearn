<!-- Creation Log
 
  File Name                   -  Registration.php
  Description                 -  Registration 
  Version                     -  1.0
  Created by                  -  Kawaljeet Singh
  Created on                  -  March 25, 2013
 
  -->

<?php

class Registration extends AUser
{

	public 	$message="added";
	public function setmessage()
	{
		$this->message="successful";
	}
	public function getmessage()
	{
		return $this->message;
	}
    public function newStudentRegistration ($email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $profilepicture)
    {
    	$new_date = date('Y-m-d', strtotime($date));
        DBConnection::Connect();
        $this->db->From("userdetails");
        $this->db->Fields(array(
            "user_id" => "",
            "email" => "$email",
            "password" => "$password",
            "user_type" => "$usertype"
        ));
        $this->db->Insert();
        echo $this->db->lastQuery();
        $i = $this->db->lastInsertId();
        // echo "$i";
        $this->db->From("studentdetails");
        $this->db->Fields(array(
            "user_id" => "$i",
            "firstname" => "$firstname",
            "lastname" => "$lastname",
            "phone" => "$phone",
            "address" => "$address",
            "qualification" => "$qualification",
            "gender" => "$gender",
            "dob" => "$new_date",
            "profilepicture" => "$profilepicture",
        	"createdon"=>date("Y/m/d")	
        ));
        $this->db->Insert();
		header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=RECORD HAS BEEN ADDED" );
    }

    public function newteacherRegistration ($email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $profilepicture)
    {
    	$new_date = date('Y-m-d', strtotime($date));
        DBConnection::Connect();
        $this->db->From("userdetails");
        $this->db->Fields(array(
            "user_id" => "",
            "email" => "$email",
            "password" => "$password",
            "user_type" => "$usertype"
        ));
        $this->db->Insert();
        echo $this->db->lastQuery();
        $i = $this->db->lastInsertId();
        // echo "$i";
        $this->db->From("teacherdetails");
        $this->db->Fields(array(
            "user_id" => "$i",
            "firstname" => "$firstname",
            "lastname" => "$lastname",
            "phone" => "$phone",
            "address" => "$address",
            "qualification" => "$qualification",
            "gender" => "$gender",
            "dob" => "$new_date",
            "profilepicture" => "$profilepicture",
        	"createdon"=>date("Y/m/d")
        ));
        $this->db->Insert();
		header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=RECORD HAS BEEN ADDED" );    }
}

?>
