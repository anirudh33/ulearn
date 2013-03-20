<?php

class AdminController
{

    private $_requiredType = "admin";

    private $_objUser;

    private $_message = "";

    public function getRequiredType ()
    {
        return $this->_requiredType;
    }

    public function setRequiredType ($requiredType)
    {
        $this->_requiredType = $requiredType;
    }

    public function __construct ()
    {
        
        // $this->process();
    }

    public function showAdminView ($data = array())
    {
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }

    public function process ()
    {
        // echo "-----------processing started ------";
        if ($this->isValidUser() == 1) {
            $this->createUser();
            
            // $_SESSION["objAC"]=serialize($this);
            $this->showAdminView();
        } else {
            // echo "-----------user not valid ------";
            // echo $this->_message;
            header("Location:http://" . $_SESSION["DOMAIN_PATH"] . "/index.php?msg=" . $this->_message . "");
        }
    }

    /**
     */
    private function createUser ()
    {
        $this->_objUser = UserFactory::createUser(ucfirst($_SESSION["userType"])); // user is created by calling the createUser method of the UserFactory class.
        $this->_objUser->setFirstName($_SESSION["emailID"]);
    }

    public function isValidUser ()
    {
        // echo"check valid";
        if ($this->sessionExists() == 1) {
            
            return 1;
        } else {
            
            $this->_message .= "Session has expired or doesnt exist";
            
            return 0;
        }
    }

    public function sessionExists ()
    {
        
        // print_r($_SESSION);
        if (isset($_SESSION['userID']) and isset($_SESSION['userType']) and $_SESSION['emailID']) {
            // echo "-----------session exists on controller ------";
            
            if ($this->isRequiredType() == 1) {
                
                return 1;
            } else {
                
                $this->_message = "You are not authorized to view this page";
                
                return 0;
            }
        } else {
            // echo "-----------session does not exist on controller ------";
            
            return 0;
        }
    }

    public function isRequiredType ()
    {
        if ($_SESSION['userType'] == $this->getRequiredType()) { // If the session has been maintained and the user type is of Admin then an instance of Admin
            return 1;
        } else {
            
            return 0;
        }
    }

    public function logout ()
    {
        session_destroy();
        header("Location:http://" . $_SESSION["DOMAIN_PATH"] . "/index.php");
    }

    public function manageTeachersClick ()
    {
        // $objAC = new AdminController();
        // $objAC = unserialize($_SESSION["objAC"]);
        if ($this->isValidUser() == 1) {
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing AdminView with teacher data */
            $this->showAdminView($this->_objUser->getTdata());
        }
    }
    // public function showManageTeachersView($data=array())
    // {
    
    // require_once $_SESSION ["SITE_PATH"] . "/views/AdminViews/ManageTeacherView.php";
    // }
    public function manageStudents ()
    {
        $this->_objUser->fetchUser();
        
        $this->showManageStudentsView();
    }

    public function reportGeneration ()
    {
        $this->_objUser->fetchUser();
        
        $this->showreportView();
    }

    public function manageProfile ()
    {
        $this->_objUser->fetchUser();
        
        $this->showProfileView();
    }
}

?>
