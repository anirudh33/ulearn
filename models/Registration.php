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
	
	public function newStudentRegistration($email,$password,$firstname,$lastname,$phone,$address,$qualification,$gender,$date,$usertype)
	{
		DBConnection::Connect();
		$this->db->From("userdetails");
		$this->db->Fields(array("user_id"=>"","email"=>"$email","password"=>"$password","user_type"=>"$usertype"));
		$this->db->Insert();
		echo $this->db->lastQuery();
		$i=$this->db->lastInsertId();
		//echo "$i";
		$this->db->From("studentdetails");
		$this->db->Fields(array("user_id"=>"$i","firstname"=>"$firstname","lastname"=>"$lastname","phone"=>"$phone","address"=>"$address","qualification"=>"$qualification","gender"=>"$gender","dob"=>"$date"));
		$this->db->Insert();
		echo $this->db->lastQuery();
	}
	public function newteacherRegistration($email,$password,$firstname,$lastname,$phone,$address,$qualification,$gender,$date,$usertype)
	{
		DBConnection::Connect();
		$this->db->From("teacherdetails");
		$this->db->Fields(array("user_id"=>"","email"=>"$email","password"=>"$password","user_type"=>"$usertype"));
		$this->db->Insert();
		echo $this->db->lastQuery();
		$i=$this->db->lastInsertId();
		//echo "$i";
		$this->db->From("teacherdetails");
		$this->db->Fields(array("user_id"=>"$i","firstname"=>"$firstname","lastname"=>"$lastname","phone"=>"$phone","address"=>"$address","qualification"=>"$qualification","gender"=>"$gender","dob"=>"$date"));
		$this->db->Insert();
		echo $this->db->lastQuery();
	}
	
}



?>
