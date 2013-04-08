<?php

/*
 * To change this template, choose Tools | Templates and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author anirudh
 *         Sr.NO. Version Updated by Updated on Description
 *         -------------------------------------------------------------------------
 *         1 1.0 Anirudh Pandita March 08, 2013
 *         ************************************************************************
 */
abstract class AModel
{

    protected $db;
    // protected $lang;
    function __construct ()
    {
        $this->db = DBConnection::Connect();
        
        // $this->lang = Language::getinstance();
    }
    /**
     * @param unknown $messageType
     * @param unknown $message
     * Uses toast to show messages to user
     */
    
    public function setCustomMessage($messageType,$message)
    {
        $_SESSION ["$messageType"]='';
    	$_SESSION ["$messageType"] .= $message."<br>";
    	
    	
    }
}

?>
