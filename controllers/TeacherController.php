
<?php
//session_start();


require_once ($_SESSION["SITE_PATH"]. "/libraries/UserFactory.php");
class TeacherController {

    private $_requiredType = "teacher";
    private $_objUser = "";
    private $_message = "";

    public function getRequiredType() {
        return $this->_requiredType;
    }

    public function setRequiredType($requiredType) {
        $this->_requiredType = $requiredType;
    }

    public function __construct() {

        $this->process();
    }

    public function showView() {
        header("Location:http://".$_SESSION["DOMAIN_PATH"]."/views/TeacherViews/TeaherView.php");
    }

    public function process() {
        echo "-----------processing started ------";

        if ($this->isValidUser() == 1) {
            $this->_objUser = UserFactory::createUser(ucfirst($_SESSION["userType"])); // user is created by calling the createUser method of the UserFactory class.
            $this->_objUser->setFirstName($_SESSION["emailID"]);
            $this->showView();
        } else {
            echo "-----------user not valid ------";
            echo $this->_message;
            header("Location:http://".$_SESSION["DOMAIN_PATH"]."/index.php?msg=" . $this->_message . "");
        }
    }

    public function isValidUser() {
        echo"check valid";
        
        if ($this->sessionExists() == 1) {

            return 1;
        } else {


            $this->_message.= "Session has expired or doesnt exist";

            return 0;
        }
    }

    public function sessionExists() {

        print_r($_SESSION);
        

        if (isset($_SESSION['userID']) and isset($_SESSION['userType']) and $_SESSION['emailID']) {
            echo "-----------session ex ------";
            
            if ($this->isRequiredType() == 1) {
   
                return 1;
            } else {
                             
                $this->_message = "You are not authorized to view this page";

                return 0;
            }
        } else {
            echo "-----------session does not ex ------";
            die;
            return 0;
        }
    }

    public function isRequiredType() {

        if ($_SESSION['userType'] == $this->getRequiredType()) {   // If the session has been maintained and the user type is of Teacher then an instance of Admin
            return 1;
        } else {

            return 0;
        }
    }

    public function logout() {
        session_destroy();
        header("Location:http://".$_SESSION["DOMAIN_PATH"]."/index.php");
    }
 public function showMessage() {
    	$this->_objUser->fetchUser();
    
    	$this->showMessageView();
    }
    public function writeMessage() {
    	$this->_objUser->fetchUser();
    
    	$this->showWriteMessageView();
    }
    public function manageProfile() {
    	$this->_objUser->fetchUser();
    
    	$this->showProfileView();
    }
    public function showStudyMaterial() {
    	$this->_objUser->fetchUser();
    
    	$this->showUploadView();
    }
   
}
//
//if (isset($_REQUEST["method"])) {// initiate cant be called
  //  $obj1 = new AdminController();
  //$obj1->$_REQUEST["method"]();
//}
?>
