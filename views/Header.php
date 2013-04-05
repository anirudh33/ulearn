<?php
/* Creation Log

File Name                   -  Header.php
Description                 -  header to be included in all views
Version                     -  1.1
Created by                  -  Anirudh Pandita
Created on                  -  April 04, 2013
* **************************** Update Log ********************************
Sr.NO.        Version        Updated by           Updated on          Description
-------------------------------------------------------------------------

* ************************************************************************
*/

/* Getting default Language to be used in various views
 * Usage: Just use $lang->CONSTANTNAME to display the language specific value */
$lang = Language::getinstance();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- jquery source -->
<script src="assets/js/jquery/jquery.js" type="text/javascript"></script>

<!-- toast plugin -->
<link rel="stylesheet" href="assets/plugins/toast/src/main/resources/css/jquery.toastmessage.css" 
type="text/css" media="screen" />
<script	src="assets/plugins/toast/src/main/javascript/jquery.toastmessage.js"></script>	

<!-- <SCRIPT> $(DOCUMENT).READY(FUNCTION(){$().TOASTMESSAGE('SHOWSUCCESSTOAST','WELCOME');}); 
	</SCRIPT> -->
	
<?php 
/* Checking for which page is requiring this header for custom content */

if(isset($pageName)) {

/*---------------------------------------------------------------------------*/

	if($pageName=="MainView") {
?>
	<!-- Main View Header -->
	<title> <?php if(isset($lang->TITLE)){echo $lang->TITLE;} else {echo "Welcome to ulearn";} ?></title>
	
	<!-- Links for stylesheet -->
	<link rel="stylesheet" href="assets/style/MainViewStyle.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="assets/style/Slide.css" 		 type="text/css" media="screen" />
	<link rel="stylesheet" href="assets/style/MainView.css" 	 type="text/css" media="screen" />
	
	<!-- Easing jquery for easy to use animate functions -->
	<script src="assets/js/jquery/jquery.easing.1.3.js"	type="text/javascript"></script>
	
	<!-- Other javascript source  -->
	<script src="assets/js/MainViewSlide.js" type="text/javascript"></script>
	<script src="assets/js/MainView.js" type="text/javascript"></script>
	
	<!-- sticky plugin -->
	<script type="text/javascript" src="assets/plugins/sticky/sticky.min.js"></script>
	<link rel="stylesheet" href="assets/plugins/sticky/sticky.min.css" type="text/css" />
	<!-- <script> $.sticky('The page has loaded!'); </script>-->
	
	
	<style>
	#header3 {
		font-size: 20px;
		color: green;
		background-color: white;
	}
	</style>
	
	</head>

<?php }

/*---------------------------------------------------------------------------*/

	if($pageName=="RegistrationView") {

	?>
	<!-- Registration View Header -->
	<title> <?php if(isset($lang->TITLE)){echo $lang->TITLE;} else {echo "Register| Welcome to ulearn";} ?></title>
	
	<!-- Links for stylesheet -->
	<link rel="stylesheet" href="assets/style/Registration.css"
		type="text/css" media="screen" />
	
	<!-- jquery source -->
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	
	<!-- Custom js -->
	<script src="assets/js/MainViewSlide.js" type="text/javascript"></script>
	<script src="assets/js/MainView.js" type="text/javascript"></script>
	<script src="assets/js/RegistrationView.js" type="text/javascript"></script>
	
	<link rel="stylesheet"
		href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	
	<?php //@todo put in proper css file ?>
	<style type="text/css">
	#error {
		background-color: white;
	}
	</style>
	</head>
<?php }

/*---------------------------------------------------------------------------*/

	if($pageName=="TeacherView") {
?>
	<!-- Teacher View Header -->
	<title><?php  if(isset($lang->HELLOTEACHER)){echo $lang->HELLOTEACHER;} else {echo "Welcome Teacher";} ?> </title>
	
	<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
		media="screen" />
	
	<!-- Add Course View header -->
	<link rel="stylesheet" href="assets/style/Views.css" type="text/css" media="screen" />
	<script src="assets/js/RegistrationView.js" type="text/javascript"></script>
	
	<!-- Edit profile View header -->
	<!-- Same as add course -->
	
	<!-- Teacher profile View header -->
	<link rel="stylesheet" type="text/css" href="assets/style/global.css" />
	
	<!-- Upload View header -->
	<!-- Css and js file same as add course -->
	
	<!-- Write message View -->
	<!-- css same as add course -->
	<script>
	
	function fncDelete(argId,method) {
		
		$.ajax({ 
	     type: "POST",
	     url: 'index.php?method='+method+'&controller=Teacher',          
	     data: "id="+argId,                        
	     success: function(dataReceived){
	    	   dataReceived=dataReceived.charAt(dataReceived.length-1);
	           if($.trim(dataReceived)=="1") {
	        	   window.location.reload();
	           } else {
	               alert("Problem in deleting record!");
	             <?php //@todo error to be thrown if record doesnt get deleted actually ?>  
	           }
	       }
	   });
	}
	
	function fncActivate(argId,method) {
		
		$.ajax({ 
	     type: "POST",
	     url: 'index.php?method='+method+'&controller=Teacher',          
	     data: "id="+argId,                        
	       success: function(dataReceived){
	    	   dataReceived=dataReceived.charAt(dataReceived.length-1);
	           if($.trim(dataReceived)=="1") {
	        	   window.location.reload();
	           } else {
	               alert("Problem in activating record!");
	               <?php //@todo error to be thrown if record doesnt get activated from ?>  
	           }
	       }
	   });
	}
	</script>
	</head>

<?php }

/*---------------------------------------------------------------------------*/

	if($pageName=="StudentView") {
?>
	<!-- Student View Header -->
	<title><?php if(isset($lang->HELLOSTUDENT)){echo $lang->HELLOSTUDENT;} 
	else {echo "Welcome Student";} 	?> </title>

	<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
	media="screen" />
	
	<!-- Content view header -->
	<link rel="stylesheet" href="assets/style/Registration.css"
	type="text/css" media="screen" />
	
	<!-- Download view header -->
	<link rel="stylesheet" href="assets/style/Views.css"
	type="text/css" media="screen" />
	
	<!-- Edit Profile view header -->
	<!-- css same as download view -->
	<script src="assets/js/RegistrationView.js" type="text/javascript"></script> 
	
	<!-- Message View Header -->
	<!-- css same as download view -->
	<script src="assets/js/RegistrationView.js" type="text/javascript"></script> 
	
	<!-- Register Course header -->
	<!-- css same as download view -->
	
	<!-- Show Messages header -->
	<!-- css same as download view -->
	
	<!-- Register Course View header -->
	<!-- css same as download view -->
	
	<!-- Student profile view header -->
	<link rel="stylesheet" type="text/css" href="assets/style/global.css" />
	
	<!-- Show Messages View header -->
	
	</head>







<?php }

/*---------------------------------------------------------------------------*/

	if($pageName=="AdminView") {
?>	
	<!-- Admin View header -->
	<title><?php if(isset($lang->HELLOADMINISTRATOR)){echo $lang->HELLOADMINISTRATOR;} 
	else {echo "Welcome Administrator";} ?></title>
	
	<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
		media="screen" />
	<link rel="stylesheet" href="assets/style/AdminViewMenu.css" type="text/css"
		media="screen" />
	
	<script type="text/javascript" src="assets/js/jquery/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="assets/js/jquery/jquery.hoverIntent.minified.js"></script>
	<script type="text/javascript" src="assets/js/jquery/jquery.flashyNav.1.0.js"></script>
	<?php //@todo usage  of following code explain with comment here ?>
	<script>
	$(document).ready(function(){
		$("button").click(function(){
		 $.ajax({url:"test.txt",success:function(result){
		   $("#div1").html(result);
		 }});
		});
	});
	</script>
	
	<!-- Admin profile View header -->

	<link rel="stylesheet" type="text/css" href="assets/style/global.css" />
	

	
	<!-- Edit Admin profile View header -->

	<link rel="stylesheet" href="assets/style/Registration.css"
	type="text/css" media="screen" />
	<script src="assets/js/RegistrationView.js" type="text/javascript"></script> 

	
	<!-- Manage student View header -->

	<link rel="stylesheet" type="text/css"
	href="assets/style/ManageStudentView.css" media="screen" />
	<?php //@todo usage  of following code explain with comment here and move to proper js file ?>
	<script>
	
	function fncDelete(argId,method) {
		   
		$.ajax({ 
	     type: "POST",
	     url: 'index.php?method='+method+'&controller=Admin',          
	     data: "id="+argId,                        
	       success: function(dataReceived){
	    	   dataReceived=dataReceived.charAt(dataReceived.length-1);
	           if($.trim(dataReceived)=="1") {
	        	   window.location.reload();
	           } else {
	               alert("Problem in deleting record!");
	             <?php //@todo error to be thrown if record doesnt get deleted actually ?>  
	           }
	       },
	   });
	}
	
	function fncActivate(argId,method) {
	
		$.ajax({ 
	     type: "POST",
	     url: 'index.php?method='+method+'&controller=Admin',          
	     data: "id="+argId,                        
	       success: function(dataReceived){
	    	   dataReceived=dataReceived.charAt(dataReceived.length-1);
	           if($.trim(dataReceived)=="1") {
	        	   window.location.reload();
	           } else {
	               alert("Problem in activating record!");
	               <?php //@todo error to be thrown if record doesnt get activated from ?>  
	           }
	       }
	   });
	}
	</script>

	
	<!-- Manage Teacher View header -->

	<link rel="stylesheet" type="text/css" href="assets/style/ManageTeacherView.css" 
	media="screen" />
	<!-- Same script functions used as in manage student view -->
	<script>
	
	function fncDelete(argId,method) {
		   
		$.ajax({ 
	     type: "POST",
	     url: 'index.php?method='+method+'&controller=Admin',          
	     data: "id="+argId,                        
	       success: function(dataReceived){
	    	   dataReceived=dataReceived.charAt(dataReceived.length-1);
	           if($.trim(dataReceived)=="1") {
	        	   window.location.reload();
	           } else {
	               alert("Problem in deleting record!");
	             <?php //@todo error to be thrown if record doesnt get deleted actually ?>  
	           }
	       },
	   });
	}
	
	function fncActivate(argId,method) {
	
		$.ajax({ 
	     type: "POST",
	     url: 'index.php?method='+method+'&controller=Admin',          
	     data: "id="+argId,                        
	       success: function(dataReceived){
	    	   dataReceived=dataReceived.charAt(dataReceived.length-1);
	           if($.trim(dataReceived)=="1") {
	        	   window.location.reload();
	           } else {
	               alert("Problem in activating record!");
	               <?php //@todo error to be thrown if record doesnt get activated from ?>  
	           }
	       }
	   });
	}
	</script>
	

	
	
	<!-- Report View header -->

	<link rel="stylesheet" href="assets/style/Report.css"
	type="text/css" media="screen" />
	

	</head>
<?php }

?>
<?php }?>







