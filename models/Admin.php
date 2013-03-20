<?php
class Admin extends AUser
{

    public function __construct ()
    {
        parent::__construct();
    }

    private $tdata = array();
    
    
    /**
     * @return the $tdata
     */
    public function getTdata ()
    {
        return $this->tdata;
    }

	/**
     * @param multitype: $tdata
     */
    private function setTdata ($tdata)
    {
        $this->tdata = $tdata;
    }

	public function fetchUser ()
    {
        DBConnection::Connect();
        $this->db->Fields(array(
            "firstname",
            "lastname"
        ));
        $this->db->From("teacherdetails");
        $this->db->Where();
        $this->db->Select();
      
        $this->setTdata($this->db->resultArray());
         
        
        
        
        // $this->tdata=array("teacher1","teacher2");
    }

    public function AddUser ()
    {
        $this->db->Fields(array(
            "firstname" => "newname",
            "lastname" => "nlastname"
        ));
        $this->db->From("users");
        $this->db->Insert();
        echo $this->db->lastQuery();
    }

    public function UpdateUser ()
    {
        $this->db->Fields(array(
            "firstname" => "haha"
        ));
        $this->db->From("users");
        $this->db->Where(array(
            "firstname" => "hihi"
        ));
        $this->db->Update();
        echo $this->db->lastQuery();
    }

    public function DeleteUser ()
    {
        $this->db->From("users");
        $this->db->Where(array(
            "id" => 42
        ));
        $this->db->Delete();
        echo $this->db->lastQuery();
    }

    public function doTransaction ()
    {
        $this->db->Fields(array(
            "firstname",
            "lastname",
            "email"
        ));
        $this->db->Where(array(
            "id >" => "40"
        ));
        $this->FindUsers();
        // echo "+++++".$this->db->lastQuery()."++++++";
        $this->db->startTransaction();
        echo $this->db->lastQuery();
        $this->AddUser();
        // $this->UpdateUser();
        // echo "<br> Adding-----------------------<br>";
        // $this->db->Fields(array("firstname","lastname","email"));
        // $this->db->Where(array("id >"=>"40"));
        // $this->FindUsers();
        $this->db->rollback();
        echo $this->db->lastQuery();
        
        // echo "<br> Rolling back-----------------------<br>";
        // $this->db->Fields(array("firstname","lastname","email"));
        // $this->db->Where(array("id >"=>"40"));
        // $this->FindUsers();
        // $this->AddUser();
        // echo "<br> Updating-----------------------<br>";
        // $this->UpdateUser();
        // $this->AddUser();
        // $this->db->commit();
        // echo $this->db->lastQuery();
        // echo "-----------------------<br>";
        
        $this->db->Fields(array(
            "firstname",
            "lastname",
            "email"
        ));
        $this->db->Where(array(
            "id >" => "40"
        ));
        $this->FindUsers();
    }

    public function showManageTeachersView ()
    {}

    public function showManageStudentsView ()
    {}

    public function showProfileView ()
    {}

    public function showreportView ()
    {}
}

?>
