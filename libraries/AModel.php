<?php

/**
 * Description of Model
 *
 * @author anirudh
 *         Sr.NO. Version Updated by Updated on Description
 *         -------------------------------------------------------------------------
 *         1 1.0 Anirudh Pandita March 08, 2013
 *         ************************************************************************
 */
abstract class AModel {
	protected $db;
	function __construct() {
		$this->db = DBConnection::Connect ();
	}
	/**
	 *
	 * @param unknown $messageType        	
	 * @param unknown $message
	 *        	Uses toast to show messages to user
	 */
	public function setCustomMessage($messageType, $message) {
		if (isset ( $_SESSION ["$messageType"] )) {
			$_SESSION ["$messageType"] .= $message . "<br>";
		} else {
			$_SESSION ["$messageType"] = $message . "<br>";
		}
	}
}

?>
