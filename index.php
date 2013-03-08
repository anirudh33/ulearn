<?php
/*
 **************************** Creation Log *******************************
File Name                   -  authentication.php
Description                 -  Class file for Authentication of users credentials
Version                     -  1.0
Created by                  -  Anirudh Pandita
Created on                  -  March 02, 2013
****************************************************************************
 Sr.NO.        Version        Updated by           Updated on          Description
  -------------------------------------------------------------------------
    1            1.0            Anirudh Pandita     March 08, 2013      paths,language set in session
 * ************************************************************************
*/

//if(isset($_REQUEST[]))
//{
//    
//}
//define("SERVER_PATH",$_SERVER["DOCUMENT_ROOT"]);
//define("BASE_PATH",SERVER_PATH."/ulearn");
//echo SERVER_PATH; 
session_start();
//echo "<pre>";
//echo getcwd();
//print_r (scandir(getcwd()));
//
//print_r($_SERVER); 
$_SESSION["SITE_PATH"]=getcwd();
//"/var/www/ulearn/branches/development";
$_SESSION["DOMAIN_PATH"]=$_SERVER["SERVER_NAME"]."/ulearn/branches/development";
$_SESSION["DB_NAME"]="ulearndb";
$_SESSION['lang']="HINDI";
require_once($_SESSION["SITE_PATH"]."/controllers/MainController.php");


$obj= new MainController();
if(isset($_REQUEST["msg"])){
$message=$_REQUEST["msg"];

?>
<script type="text/javascript">

showMessage(<?php echo $message?>);

</script>
<!--

//-->
</script>
<?php 
$obj->setMessage($message);
}
$obj->showMainView();
if(isset($_REQUEST['method'])){
	 
	$obj->registerClick();
	 
}


?>




