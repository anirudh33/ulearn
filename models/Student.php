<?php
// session_start();
require_once ($_SESSION["SITE_PATH"] . "/libraries/AUser.php");

class Student extends AUser
{

    public function __construct ()
    {
        parent::__construct();
    }

    private $tdata = array();

    /**
     *
     * @return the $tdata
     */
    public function getTdata ()
    {
        return $this->tdata;
    }

    /**
     *
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
            "lastname",
            "phone",
            "address",
            "qualification",
            "gender",
            "dob"
        ));
        $this->db->From("studentdetails");
        $this->db->Where();
        $this->db->Select();
        
        $this->setTdata($this->db->resultArray());
    }

    public function editStudent ($firstname, $lastname, $phone, $address, $qualification, $gender, $dob)
    {
        DBConnection::Connect();
        $this->db->From("studentdetails");
        $this->db->Fields(array(
            "firstname" => "$firstname",
            "lastname" => "$lastname",
            "phone" => "$phone",
            "address" => "$address",
            "qualification" => "$qualification",
            "gender" => "$gender",
            "dob" => "$dob"
        ));
        $this->db->Update();
        echo $this->db->lastQuery();
    }

    public function registerCourse ($course_id, $student_id)
    {
        DBConnection::Connect();
        $this->db->From("enrolls");
        $this->db->Fields(array(
            "course_id" => "$course_id",
            "student_id" => "$student_id"
        ));
        $this->db->Insert();
        echo $this->db->lastQuery();
    }

    public function messageSend ($message_id, $body, $subject, $sentfrom, $sentto)
    {
        DBConnection::Connect();
        $this->db->From("studentmessage");
        $this->db->Fields(array(
            "message_id" => "$message_id",
            "body" => "$body",
            "subject" => "$subject",
            "sentfrom" => "$sentfrom",
            "sentto" => "$sentto"
        ));
        $this->db->Insert();
        echo $this->db->lastQuery();
    }

    public function downloadContent ()
    {}
}
?>