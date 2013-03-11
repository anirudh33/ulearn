<?php
//session_start();
require_once ($_SESSION["SITE_PATH"]."/libraries/AUser.php");
class Admin extends AUser
{
    protected $firstname;
    protected $lastname;
    protected $phone;
    protected $d_o_b;
    protected $address;
    protected $profilepicture;
    protected $language;
    protected $state;
    
    
    public function __construct() {
        parent::__construct();
        
    }
    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }
    public function getDOB() {
        return $this->d_o_b;
    }

    public function setDOB($d_o_b) {
        $this->d_o_b = $d_o_b;
    }
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }
    public function getLanguage() {
        return $this->language;
    }

    public function setLanguage($language) {
        $this->language = $language;
    }
    public function getProfilePicture() {
        return $this->profilepicture;
    }

    public function setProfilePicture($profilepicture) {
        $this->profilepicture = $profilepicture;
    }
    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }
    
public function FindUsers() {
    
      $this->db->Fields(array("firstname as f","lastname","email"));
//	  $this->db->Where(array("firstname"=>"ambar"));
	  //$this->db->Where(array("(firstname = 'ambar' OR lastname = 'sharma')"),true);
	  //$this->db->Where(array("(email = 'amber.sharma@osscube.com' OR phone = '2121222121')"),true);
	  //$this->db->where(array("u.id IN(1,2,3,4,5,6,7,8,9)"),true,"OR");
	  //$this->db->Like("firstname","am");
	  //$this->db->Like("password","abc","OR");
	  $this->db->From("users");
	  //$this->db->Join("profile as p"," u.id = p.user_id ");
	  //$this->db->Join("details as d","u.id = d.user_id","left");
	//$this->db->OrderBy("username asc");
	  //$this->db->GroupBy("username");
	  //$this->db->Having(array("f"=>"zero"));
	  $this->db->Where(array("id"),true);
	  $this->db->Between(5,10);
	  $this->db->Select();
	echo $this->db->lastQuery();
	  $result = $this->db->resultArray();
	  echo "<pre/>";
	  print_r($result);
	  
	 
	  
    }
	public function AddUser(){
	
		$this->db->Fields(array("firstname"=>"newname","lastname"=>"nlastname"));
		$this->db->From("users");
		$this->db->Insert();
		echo $this->db->lastQuery();
	}
	public function UpdateUser(){
	
		$this->db->Fields(array("firstname"=>"haha"));
		$this->db->From("users");
		$this->db->Where(array("firstname"=>"hihi"));
		$this->db->Update();
		echo $this->db->lastQuery();
	}
	public function DeleteUser(){
		$this->db->From("users");
		$this->db->Where(array("id"=>42));
		$this->db->Delete();
		echo $this->db->lastQuery();
	}
	public function doTransaction(){
	$this->db->Fields(array("firstname","lastname","email"));
	$this->db->Where(array("id >"=>"40"));
	$this->FindUsers();
	//echo "+++++".$this->db->lastQuery()."++++++";
	$this->db->startTransaction();
	echo $this->db->lastQuery();
	$this->AddUser();
	//$this->UpdateUser();
	//echo "<br> Adding-----------------------<br>";
	//$this->db->Fields(array("firstname","lastname","email"));
	//$this->db->Where(array("id >"=>"40"));
	//$this->FindUsers();
	$this->db->rollback();
	echo $this->db->lastQuery();
	 
	 //echo "<br> Rolling back-----------------------<br>";
	 //$this->db->Fields(array("firstname","lastname","email"));
	 //$this->db->Where(array("id >"=>"40"));
	 //$this->FindUsers();
	 //$this->AddUser();
	 //echo "<br> Updating-----------------------<br>";
	 //$this->UpdateUser();
	 //$this->AddUser();
	 //$this->db->commit();
	 //echo $this->db->lastQuery();
	 //echo "-----------------------<br>";
	 
	 
	 $this->db->Fields(array("firstname","lastname","email"));
	 $this->db->Where(array("id >"=>"40"));
	 $this->FindUsers();
	 }
public function fetchUser(){}
public function showView(){}
public function showManageTeachersView(){}
public function showManageStudentsView(){}
public function showProfileView(){}
public function showreportView(){}
}

?>
