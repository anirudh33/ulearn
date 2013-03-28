<?php
/*
 * *************************** Creation Log ******************************* 
 * File Name - Authenticate.php 
 * Description - Class file for Authentication of users credentials 
 * Version - 1.0 Created by - Anirudh Pandita Created on - March 02, 2013 
 * *************************************************************************** 
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 * 1			1.0			Anirudh Pandita	28/04/2013	Being used in various controllers
 * ************************************************************************
*/
class Authenticate
{

    private $_message = "";
    private $_requiredType="";
    
    
    
    /**
	 * @return the $_message
	 */
	public function getMessage() {
		return $this->_message;
	}

	/**
	 * @param string $_message
	 */
	public function setMessage($_message) {
		$this->_message = $_message;
	}

	public function getRequiredType ()
    {
    	return $this->_requiredType;
    }
    
    public function setRequiredType ($requiredType)
    {
    	$this->_requiredType = $requiredType;
    }
    
    public function __construct($requiredType)
    {
    	$this->setRequiredType ($requiredType);
    }
    
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
    	if ($_SESSION['userType'] == $this->getRequiredType()) { 
            return 1;
        } else {
            return 0;
        }
    }
    
    public function validate($Fields)
    {
    	
    }
}

?>