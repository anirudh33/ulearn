<?php
// session_start();
require_once ($_SESSION["SITE_PATH"] . "/libraries/AUser.php");

class Teacher extends AUser
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
            "lastname"
        ));
        $this->db->From("teacherdetails");
        $this->db->Where();
        $this->db->Select();
        
        $this->setTdata($this->db->resultArray());
        
        // $this->tdata=array("teacher1","teacher2");
    }
    public function showMessageView ()
    {}

    public function showWriteMessageView ()
    {}

    public function showProfileView ()
    {}

    public function showUploadView ()
    {}

    public function addCourse ()
    {}
}
?>
