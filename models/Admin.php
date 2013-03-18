<?php
class Admin extends AUser
{

    public function __construct ()
    {
        parent::__construct();
    }

    public $tdata = array();

    public function fetchUser ()
    {
        DBConnection::Connect();
        $this->db->Fields(array(
            "firstname",
            "lastname"
        ));
        // $this->db->Where(array("firstname"=>"ambar"));
        // $this->db->Where(array("(firstname = 'ambar' OR lastname = 'sharma')"),true);
        // $this->db->Where(array("(email = 'amber.sharma@osscube.com' OR phone = '2121222121')"),true);
        // $this->db->where(array("u.id IN(1,2,3,4,5,6,7,8,9)"),true,"OR");
        // $this->db->Like("firstname","am");
        // $this->db->Like("password","abc","OR");
        $this->db->From("teacherdetails");
        // $this->db->Join("profile as p"," u.id = p.user_id ");
        // $this->db->Join("details as d","u.id = d.user_id","left");
        // $this->db->OrderBy("username asc");
        // $this->db->GroupBy("username");
        // $this->db->Having(array("f"=>"zero"));
        // $this->db->Where(array("id"),true);
        // $this->db->Between(5,10);
        $this->db->Where();
        $this->db->Select();
      
        $this->tdata = $this->db->resultArray();
         
        
        
        
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
