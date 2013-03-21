<?php 

class Registration extends AUser
{
	
	public function userRegistration($email,$password,$firstname,$lastname,$phone,$address,$qualification,$gender,$date,$usertype)
	{
		DBConnection::Connect();
		$this->db->From("studentdetails");
		$this->db->Fields(array("email"=>"$email","password"=>"$password",));
		$this->db->Insert();
		echo $this->db->lastQuery();
	}
	
	
}



?>
