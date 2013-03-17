<?php
// session_start();
require_once ($_SESSION ["SITE_PATH"] . "/libraries/AUser.php");
class Student extends AUser {
	public function __construct() {
		parent::__construct ();
	}
	public function fetchUser() {
		$this->db->Fields ( array (
				"firstname as f",
				"lastname",
				"email" 
		) );
		// $this->db->Where(array("firstname"=>"ambar"));
		// $this->db->Where(array("(firstname = 'ambar' OR lastname = 'sharma')"),true);
		// $this->db->Where(array("(email = 'amber.sharma@osscube.com' OR phone = '2121222121')"),true);
		// $this->db->where(array("u.id IN(1,2,3,4,5,6,7,8,9)"),true,"OR");
		// $this->db->Like("firstname","am");
		// $this->db->Like("password","abc","OR");
		$this->db->From ( "users" );
		// $this->db->Join("profile as p"," u.id = p.user_id ");
		// $this->db->Join("details as d","u.id = d.user_id","left");
		// $this->db->OrderBy("username asc");
		// $this->db->GroupBy("username");
		// $this->db->Having(array("f"=>"zero"));
		$this->db->Where ( array (
				"id" 
		), true );
		$this->db->Between ( 5, 10 );
		$this->db->Select ();
		echo $this->db->lastQuery ();
		$result = $this->db->resultArray ();
		echo "<pre/>";
		print_r ( $result );
	}
	public function showMessageView() {
	}
	public function showWriteMessageView() {
	}
	public function showProfileView() {
	}
	public function showDownloadView() {
	}
}

?>
