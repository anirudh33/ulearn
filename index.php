<?php
/*
 **************************** Creation Log *******************************
File Name                   -  authentication.php
Description                 -  Class file for Authentication of users credentials
Version                     -  1.0
Created by                  -  Anirudh Pandita
Created on                  -  March 02, 2013
****************************************************************************
*/
//if(isset($_REQUEST[]))
//{
//    
//}
//define("SERVER_PATH",$_SERVER["DOCUMENT_ROOT"]);
//define("BASE_PATH",SERVER_PATH."/ulearn");
//echo SERVER_PATH; 
require_once("./controllers/MainController.php");


$obj= new MainController();
if(isset($_REQUEST["msg"])){
$message=$_REQUEST["msg"];
$obj->setMessage($message);
}
$obj->showMainView();
?>