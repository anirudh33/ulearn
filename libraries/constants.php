<?php
/*
 * *************************** Creation Log ******************************* 
 * File Name 		- constants.php
 * Description 	- File is used to have all the configuration variables 
 * Version 	- 1.0 
 * Created by 	- Anirudh Pandita 
 * Created on 	- March 6 2013 
 * **************************************************************************
 * 
 */
https://www.google.co.in/search?client=ubuntu&channel=fs&q=http%2F%2Flocalhost%2Fulearn%2Fbranches%2Fdevelopment%2F%2Findex.php&ie=utf-8&oe=utf-8&redir_esc=&ei=saNmUf3MCcbNrQf9pYDIBw
/* URL like http://localhost/ulearn */
define('SITE_URL','http://'.$_SERVER['SERVER_NAME'] . "/ulearn/branches/development");

/* Absolute directory path like /var/www/ulearn//branches/development/ */
define('SITE_PATH',getcwd());

/* Database server */
define('DB_SERVER',"localhost");

/* Database user name */
define('DB_USER',"root");

/* Database password */
define('DB_PASSWORD',"root");

/* Database name */
define('DB_COMMON',"ulearndb");

/* Version */
define('VERSION',"1.0");

/* Setting paths in session as we used these before */
$_SESSION['SITE_PATH'] = SITE_PATH;
$_SESSION['DOMAIN_PATH'] = SITE_URL;

?>
