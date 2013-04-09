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
$lang=Language::getinstance();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- jquery source -->
<script src="assets/js/jquery/jquery.js" type="text/javascript"></script>
<!-- Jquery for validations -->
<script type="text/javascript" src="./assets/js/jquery.validate.min.js"></script>



<?php 
/* Checking for which page is requiring this header for custom content */

if(isset($pageName)) {

/*---------------------------------------------------------------------------*/

	if($pageName=="MainView") {
?>
	<!-- Main View Header -->
<title> <?php if(isset($lang->TITLE)){echo $lang->TITLE;} else {echo "Welcome to ulearn";} ?></title>

<!-- Links for stylesheet -->
<link rel="stylesheet" href="assets/style/MainViewStyle.css"
	type="text/css" media="screen">
<link rel="stylesheet" href="assets/style/Slide.css" type="text/css"
	media="screen">
<link rel="stylesheet" href="assets/style/MainView.css" type="text/css"
	media="screen">

<!-- Easing jquery for easy to use animate functions -->
<script src="assets/js/jquery/jquery.easing.1.3.js"
	type="text/javascript"></script>

<!-- Date Picker -->
<link rel="stylesheet" type="text/css" href="assets/style/jqueryui.css">
<script src="assets/js/jquery/jqueryui.js" type="text/javascript"></script>

<!-- Other javascript source  -->
<script src="assets/js/MainViewSlide.js" type="text/javascript"></script>
<script src="assets/js/MainView.js" type="text/javascript"></script>

<style type="text/css">
#errors {
	font-size: 20px;
	font-family: sans-serif;
	color: green;
	background-color: white;
}
</style>


<?php }

/*---------------------------------------------------------------------------*/

if($pageName=="RegistrationView") {

?>
<!-- Registration View Header -->
<title> <?php if(isset($lang->TITLE)){echo $lang->TITLE;} else {echo "Register| Welcome to ulearn";} ?></title>

<!-- Links for stylesheet -->
<link rel="stylesheet" href="assets/style/Registration.css"
	type="text/css" media="screen">
<link rel="stylesheet" type="text/css"
	href="assets/style/Registration/registrationnew.css">
<link rel="stylesheet" type="text/css"
	href="assets/style/Registration/registrationnew2.css">

<!-- Date Picker -->
<link rel="stylesheet" type="text/css" href="assets/style/jqueryui.css">
<script src="assets/js/jquery/jqueryui.js" type="text/javascript"></script>
<!-- jquery source -->


<!-- Custom js -->
<script src="assets/js/MainViewSlide.js" type="text/javascript"></script>
<script src="assets/js/MainView.js" type="text/javascript"></script>
<script src="assets/js/RegistrationView.js" type="text/javascript"></script>
	
		
	<?php //@todo put in proper css file ?>
	<style type="text/css">
#error {
	background-color: white;
}
</style>

<script type="text/javascript">
 $(document).ready(function() {

	$( "#datepicker23").datepicker({
		dateFormat: "yy-mm-dd",
		 changeMonth: true,
		  changeYear: true
	 
		 
	});
	
});
 
 </script>

<?php
	
}

/*---------------------------------------------------------------------------*/

	if($pageName=="TeacherView") {
?>
	<!-- Teacher View Header -->
<title><?php  if(isset($lang->HELLOTEACHER)){echo $lang->HELLOTEACHER;} else {echo "Welcome Teacher";} ?> </title>

<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
	media="screen">

<!-- Add Course View header -->
<link rel="stylesheet" href="assets/style/addcourse.css"
	type="text/css" media="screen" />
	
	<!-- Download View header -->
	<link rel="stylesheet" href="assets/style/download.css"
	type="text/css" media="screen" />
	
	<!-- Register Course View header -->
	<link rel="stylesheet" href="assets/style/registercourse.css"
	type="text/css" media="screen" />
	
	<!-- Write message View header -->
	<link rel="stylesheet" href="assets/style/writemesage.css"
	type="text/css" media="screen" />
	
	<!-- Upload View header -->
	<link rel="stylesheet" href="assets/style/upload.css"
	type="text/css" media="screen" />
	
<!-- Teacher profile View header -->
<link rel="stylesheet" href="assets/style/globalteacher.css" type="text/css">

<!-- Edit Course View Header -->
<link rel="stylesheet" type="text/css"
	href="assets/style/ManageTeacherView.css" media="screen">
<!-- Edit profile View header -->

<link rel="stylesheet" href="assets/style/editprofile.css"
	type="text/css" media="screen">
<script type="text/javascript" src="./assets/js/Validation.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>

<!-- Date Picker -->
<link rel="stylesheet" href="assets/style/jqueryui.css" type="text/css">
<script src="assets/js/jquery/jqueryui.js" type="text/javascript"></script>
<script type="text/javascript">
 $(document).ready(function() {
	
	$( "#datepicker23").datepicker({
		 dateFormat: "yy-mm-dd",
		 changeMonth: true,
		  changeYear: true
		 
		 
	});
	
});
 </script>

<script type="text/javascript">
	
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


<?php }

/*---------------------------------------------------------------------------*/

	if($pageName=="StudentView") {
?>
	<!-- Student View Header -->
<title><?php if(isset($lang->HELLOSTUDENT)){echo $lang->HELLOSTUDENT;} 
	else {echo "Welcome Student";} 	?> </title>
	
	<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
	media="screen">
	


<script type="text/javascript" src="assets/js/Validation.js"></script>

<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>


<!-- Download view header -->
<link rel="stylesheet" href="assets/style/download.css"
	type="text/css" media="screen" />
	
	<!-- Register Course header -->
<link rel="stylesheet" href="assets/style/registercourse.css"
	type="text/css" media="screen" />

<!-- Edit Profile view header -->
<link rel="stylesheet" href="assets/style/editprofile.css"
	type="text/css" media="screen">

<!-- Write Message View Header -->
<link rel="stylesheet" href="assets/style/writemesage.css"
	type="text/css" media="screen" />
	
<!-- Student profile view header -->
<link rel="stylesheet" type="text/css" href="assets/style/globalstudent.css">


<!-- Date Picker -->
<link rel="stylesheet" type="text/css" href="assets/style/jqueryui.css">
<script src="./assets/js/jquery/jqueryui.js" type="text/javascript"></script>
<script type="text/javascript">
 $(document).ready(function() {
	 
	$( "#datepicker23").datepicker({
		dateFormat: "yy-mm-dd",
		 changeMonth: true,
		  changeYear: true
	 
		 
	});
	
});
</script>








<?php }

/*---------------------------------------------------------------------------*/

	if($pageName=="AdminView") {
?>	
	<!-- Admin View header -->
<title><?php if(isset($lang->HELLOADMINISTRATOR)){echo $lang->HELLOADMINISTRATOR;} 
	else {echo "Welcome Administrator";} ?></title>

<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
	media="screen">
<link rel="stylesheet" href="assets/style/AdminViewMenu.css"
	type="text/css" media="screen">

<script type="text/javascript"
	src="assets/js/jquery/jquery.easing.1.3.js"></script>
<script type="text/javascript"
	src="assets/js/jquery/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript"
	src="assets/js/jquery/jquery.flashyNav.1.0.js"></script>
<script type="text/javascript" src="assets/js/Validation.js"></script>
<script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
<!-- <script type="text/javascript" -->
<!-- 	src="assets/js/EditAdminProfileViewValidate.js"></script> -->
<script type="text/javascript">
	<?php //@todo usage  of following code explain with comment here ?>
	
	$(document).ready(function(){
		$("button").click(function(){
		 $.ajax({url:"test.txt",success:function(result){
		   $("#div1").html(result);
		 }});
		});
	});
	</script>
<script type="text/javascript">
	
 $(document).ready(function() {

	$( "#datepicker23").datepicker({
		dateFormat: "yy-mm-dd",
		 changeMonth: true,
		  changeYear: true
	 
		  
	});
	
});
</script>
<!-- Admin profile View header -->

<link rel="stylesheet" type="text/css" href="assets/style/global.css">



<!-- Edit Admin profile View header -->

<link rel="stylesheet" href="assets/style/Registration.css"
	type="text/css" media="screen">
<script src="assets/js/RegistrationView.js" type="text/javascript"></script>
<link rel="stylesheet" href="assets/style/editprofile.css"
	type="text/css" media="screen">
<!-- Date Picker -->
<link rel="stylesheet" type="text/css" href="assets/style/jqueryui.css">
<script src="assets/js/jquery/jqueryui.js" type="text/javascript"></script>

<!-- Manage student View header -->

<link rel="stylesheet" type="text/css"
	href="assets/style/ManageStudentView.css" media="screen">
	<?php //@todo usage  of following code explain with comment here and move to proper js file ?>
	<script type="text/javascript">
	
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

<link rel="stylesheet" type="text/css"
	href="assets/style/ManageTeacherView.css" media="screen">
<!-- Same script functions used as in manage student view -->
<script type="text/javascript">
	
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
	             //@todo error to be thrown if record doesnt get deleted actually
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
	               //@todo error to be thrown if record doesnt get activated from ?>  
	           }
	       }
	   });
	}
	</script>




<!-- Report View header -->

<link rel="stylesheet" href="assets/style/Report.css" type="text/css"
	media="screen">



<?php }

?>
<?php }?>
</head>
