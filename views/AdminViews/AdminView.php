<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
require_once $_SESSION["SITE_PATH"] . '/libraries/Language.php';
$lang = Language::getinstance();
?>



<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title><?php if(isset($lang->HELLOADMINISTRATOR)){echo $lang->HELLOADMINISTRATOR;} else {echo "Welcome Administrator";} ?></title>

<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
	media="screen" />
	<link rel="stylesheet" href="assets/style/AdminViewMenu.css" type="text/css"
	media="screen" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="assets/js/jquery/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="assets/js/jquery/jquery.flashyNav.1.0.js"></script>

<script type="text/javascript">




</script>
<script>
$(document).ready(function(){
	

$("button").click(function(){
	 $.ajax({url:"test.txt",success:function(result){
	   $("#div1").html(result);
	 }});
	});
});
</script>




</head>

<body>

	<div id="div1"></div>




	<div id="cc">

		<div id="header">

			<img alt="" src="../../assets/images/Views/ulearn.gif"
				style="float: right; padding: 50px; width: 280px;"> <a
				href="index.php?method=logout&controller=Admin">LOG OUT</a>

		</div>




		<div id="image">

			<div id="admincontent" align="center">

				
				<center>
				
				<?php
				
				
				
				
    if (! empty($teacherdata)) {
        
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/ManageTeacherView.php';
    }
    elseif (! empty($studentdata)) {
        
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/ManageStudentView.php';
    }
    
    elseif (! empty($admindata)) {
        
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/EditAdminProfileView.php';
    }
    elseif (isset($var)) {
        ?>
    	<h1>The Records have been updated</h1>
    	
    <?php
    }
    elseif (! empty($adminprofiledata)) {

	  require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminProfileView.php';
	  }
	 


if(isset($reportdata))
{

	 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/reportView.php';	

} 
elseif(!empty($studentreportcount))
{
//	echo "here also";
	 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/reportView.php';	

} 

elseif(!empty($teacherreportcount))
{
//	echo "here also";
	 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/reportView.php';	

}
if(isset($studentqualificationcount))
{
	
	 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/reportView.php';	

}
if(isset($teacherqualificationcount))
{
	
	 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/reportView.php';	

}

    ?>
				</center>
			</div>



			<div id="functionpanel">


				<div class="arrowgreen">
					 <ul class="nav nav2">
      <li><a href="index.php?method=showProfile&controller=Admin"><?php echo $lang-> VIEWPROFILE;?></a></li>
						<li><a
							href="index.php?method=manageTeachersClick&controller=Admin"
							id="link1"><?php echo $lang-> MANAGETEACHER;?></a></li>

						<li><a
							href="index.php?method=manageStudentsClick&controller=Admin"
							id="link2"><?php echo $lang->MANAGESTUDENT;?></a></li>

						<li><a href="index.php?method=editProfileClick&controller=Admin"><?php echo $lang->EDITPROFILE;?></a></li>
								
								
						<li><a href="index.php?method=generateReport&controller=Admin" title="Forums"><?php echo $lang->REPORTGENERATION;?></a></li>
    </ul>
    
				</div>


			</div>



		</div>




	</div>










</body>








</html>
