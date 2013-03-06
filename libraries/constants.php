<?php   
	/*
	    **************************** Creation Log *******************************
	    File Name                  		-  constants.inc
	    Description                 	-  File is used to have all the configuration variables
	    Version                     	-  1.0
	    Created by                  	-  Anirudh Pandita
	    Created on                  	-  March 6 2013
	    ***************************************************************************
	*/
	$Host			= $_SERVER["HTTP_HOST"] ;
	$DB_SERVER     		= "localhost";                              // Database Server machine
    $DB_LOGIN      		= "root";                                   // Database login
	$DB_PASSWORD   		= "root";                                       // Database password
	$DB_COMMON     		= "ulearndb";                           // Database name

	$SITE_PATH		= "http://localhost/ulearn/branches/development";           // Files location
	$UPLOAD_PATH   		= "uploads";                                // Common path for documents to move on from the existing location
	$VERSION    		= "1.0";
	$def_page_size 		= 10;
	echo $_SERVER["HTTP_HOST"] ;
?>
