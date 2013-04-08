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
	
	public function verifyEmail($email1)
	{
		DBConnection::Connect();
		DBConnection::Connect();
		$this->db->From("userdetails");
		$this->db->Fields(array(
		
				"email"
		));
		$this->db->Where(array("email"=>$email1));
		$this->db->Select();
		//echo
		$a=$this->db->resultArray();
		//echo $this->db->lastQuery();
		if(!empty($a))
		{
			return true;
			
		}
		
	}
	
	
	
    public function newStudentRegistration ($email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype,$status, $profilepicture,$confirm_code)
    {
    	
    	
    	
    	
    	$new_date = date('Y-m-d', strtotime($date));
        DBConnection::Connect();
        $this->db->From("userdetails");
        $this->db->Fields(array(
            "user_id" => "",
            "email" => "$email",
            "password" => "$password",
            "user_type" => "$usertype",
        		"confirm_code"=>"$confirm_code"
        ));
        $this->db->Insert();
      
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
        		"status"=>"$status",
            "profilepicture" => "$profilepicture",
        	"createdon"=>date("Y/m/d")	
        ));
        $this->db->Insert();
		header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=RECORD HAS BEEN ADDED" );
    }

    public function confirmEmail($email,$pass)
    {
    	DBConnection::Connect();
    	$this->db->From("userdetails");
    	$this->db->Fields(array(
    			 
    			"email","user_type"
    	));
    	$this->db->Where(array("confirm_code"=>$pass));
    	$this->db->Select();
    	//echo
    	$a=$this->db->resultArray();
    	echo $this->db->lastQuery();
    	//echo"<pre>";
    	//print_r($a) ;
    	 $rr=$a[0]["user_type"];
    	 //echo $rr;
    	
    	//echo $email.$pass;
    	
    	
    	if(!empty($a))
    	{
    		
    		$this->db->From("userdetails");
    		$this->db->Fields(array(
    		
    				"user_id"
    		));
    		$this->db->Where(array("email"=>$email));
    		$this->db->Select();
    		//echo
    		$b=$this->db->resultArray();
    		
    		//print_r($b) ;
    	
    		
    		if($rr=='student')
    		{
    			//echo "YOU HAVE BEEN ACTIVATED";
    			
    			$this->db->From("studentdetails");
    			
    			
    			$this->db->Where(array(
    					"user_id"=>$b[0]["user_id"]
    			));
    			$this->db->Fields(array(
    					"status" => "1"
    			));
    			
    			 echo $this->db->Update();
    			 
    			 echo $this->db->lastQuery();
    			//return $objReturn;
    			
    			header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=You Are Activated" );
    			//  $this->db->lastQuery();
    			//echo $this->db->lastQuery();
    			
    			
    		}if($rr=='teacher')
    			
    		{
    			echo "YOU HAVE BEEN ACTIVATED";
    			 
    			$this->db->From("teacherdetails");
    			 
    			 
    			$this->db->Where(array(
    					"user_id"=>$b[0]["user_id"]
    			));
    			$this->db->Fields(array(
    					"status" => "1"
    			));
    			 
    			 $this->db->Update();
    			 header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=You Are Activated" );
    			//return $objReturn;
    			//  $this->db->lastQuery();
    			//echo $this->db->lastQuery();
    	
    		}
 	   		
    	}

    }
    
    public function newteacherRegistration ($email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype,$status, $profilepicture,$confirm_code)
    {
    	$new_date = date('Y-m-d', strtotime($date));
        DBConnection::Connect();
        $this->db->From("userdetails");
        $this->db->Fields(array(
            "user_id" => "",
            "email" => "$email",
            "password" => "$password",
            "user_type" => "$usertype",
        		"confirm_code"=>"$confirm_code"
        ));
        $this->db->Insert();
    //    echo $this->db->lastQuery();
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
        		"status"=>"$status",
            "profilepicture" => "$profilepicture",
        	"createdon"=>date("Y/m/d")
        ));
        $this->db->Insert();
		header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=RECORD HAS BEEN ADDED" );    
    }
}


?>
