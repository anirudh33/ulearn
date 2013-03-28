<?php
/*
 * *************************** Creation Log *******************************
* File Name - MainController.php Description - Main Controller Version - 1.0
* Created by - Anirudh Pandita Created on - March 08, 2013
* ***************************************************************************
* Sr.NO. Version Updated by Updated on Description
* -------------------------------------------------------------------------
* 
* ************************************************************************
*/
class Authenticate
{

    private $_message = "";
    /* Check if user has logged in */
    public function isValidUser ()
    {
        if ($this->sessionExists() == 1) {
            
            return 1;
        } else {
            
            $this->_message .= "Session has expired or doesnt exist";
            
            return 0;
        }
    }
    
    /* Check if user session exists */
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
    
    /* Check if user in session is of this particular type like Admin in this case */
    public function isRequiredType ()
    {
        if ($_SESSION['userType'] == $this->getRequiredType()) { // If the session has been maintained and the user type is of Admin then an instance of Admin
            return 1;
        } else {
            
            return 0;
        }
    }
}

?>