<?php 
/*
 * *************************** Creation Log *******************************
* File Name - index.php
* Description - Landing page
* Version - 1.0 Created by - Anirudh Pandita Created on - March 02, 2013
* ***************************************************************************
* Sr.NO. Version Updated by Updated on Description
* -------------------------------------------------------------------------
* 1 1.0 Anirudh Pandita March 08, 2013 paths,language set in session
*
* ************************************************************************
*/

//@todo anirudh :why does firefox ask to remember password before form is submitted
//@todo search filters on manage teacher view in Admin views

/* Starting session  */
session_start();

/* Including all constants to be used */

require_once ('/var/www/ulearn/branches/development/libraries/constants.php');


/* Log errors to a specific file */
ini_set('log_errors',1);
ini_set('error_log',getcwd().'/errors.log');

/* Log session specific errors,messages,notices */
if(isset($_SESSION["ErrorMessage"])) {
	if(!empty($_SESSION["ErrorMessage"])) {
$line = date ( 'Y-m-d H:i:s' ) . "," . session_id () . "," . 
		$_SERVER ['REMOTE_ADDR'].',Message:'.$_SESSION["ErrorMessage"];
		file_put_contents ( 'logs/app.log', $line . PHP_EOL, FILE_APPEND );
	}
}


/* Requiring all the necessary files controllers and libraries required */

/* Libraries */
require_once (SITE_PATH . '/libraries/DBConnect.php');
require_once (SITE_PATH . '/libraries/AModel.php');
require_once (SITE_PATH . '/libraries/AUser.php');
require_once (SITE_PATH . '/libraries/InitiateUser.php');
require_once (SITE_PATH . '/libraries/Language.php');
require_once (SITE_PATH . '/libraries/Paging.php');
require_once (SITE_PATH . '/libraries/Authenticate.php');
require_once (SITE_PATH . '/libraries/securimage/securimage.php');
require_once (SITE_PATH . '/libraries/Authenticate.php');
require_once (SITE_PATH . '/libraries/PHPMailer/class.phpmailer.php');

/* Models */
require_once (SITE_PATH . '/models/Admin.php');
require_once (SITE_PATH . '/models/Teacher.php');
require_once (SITE_PATH . '/models/Student.php');
require_once (SITE_PATH . '/models/Registration.php');
require_once (SITE_PATH . '/models/Course.php');

require_once (SITE_PATH . '/libraries/UserFactory.php');

/* Controllers  */
require_once (SITE_PATH . '/controllers/AController.php');
require_once (SITE_PATH . '/controllers/MainController.php');
require_once (SITE_PATH . '/controllers/AdminController.php');
require_once (SITE_PATH . '/controllers/TeacherController.php');
require_once (SITE_PATH . '/controllers/StudentController.php');



/* Method Handling from called from Views */
if (isset($_REQUEST['method'])) {
    
    if (isset($_REQUEST['controller'])) {
        
        if ($_REQUEST['controller'] == 'Admin') {            
            $controllerObject = new AdminController();
        } elseif ($_REQUEST['controller'] == 'Student') {
            $controllerObject = new StudentController();
        } elseif ($_REQUEST['controller'] == 'Teacher') {
            $controllerObject = new TeacherController();
        } elseif ($_REQUEST['controller'] == 'Main') {
            $controllerObject = new MainController();
        } else {
        	/* if controller name doesnt match */
        	die("Stop playing with the urls! | Controller doesnt exist");
        }
        
    }
    if (isset($_SESSION['userType']) && $_REQUEST['controller'] == 'Main' && $_REQUEST['method']!='unsetMessages' ) {
        
    	$controllerObject->showUserPanel();
    
    }elseif(method_exists($controllerObject, $_REQUEST['method'])) {
    	
    	  		$controllerObject->$_REQUEST['method']();
    	
    } else {
    	/* if method name doesnt match */
    	die("Stop playing with the urls! | Method doesnt exsist");
    }
    
    
}

/* Creating MainController Object as no method was called */
$obj = new MainController();


/*
 * Check if a user is logged in using session variable which is set everytime a 
 * user logs in
 */
if (isset ( $_REQUEST ['method'] )) {
	if ($_REQUEST ['method'] != 'unsetMessages') {
		
		if (isset ( $_SESSION ['userType'] )) {
			$obj->showUserPanel ();
		}
		
		
	}
} 


/* If no method has been called show the main view/homepage */
if (! isset($_REQUEST['method']) or isset($_REQUEST['language'])) {
	
    /*showing main view*/
    $obj->showMainView();
}


?>

<?php require_once (SITE_PATH . '/views/Footer.php');?>


