<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>HELLOADMINISTRATOR </title>

<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
	media="screen" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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

			<div id="admincontent">

				<h4>WELCOMEADMINISTRATOR</h4>
				<center>
				<?php
    
if (! empty($teacherdata)) {
        
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/ManageTeacherView.php';
    }
    if (! empty($studentdata)) {
    
    	require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/ManageStudentView.php';
    }
    
    ?>
				</center>
			</div>



			<div id="functionpanel">


				<div class="arrowgreen">
					<ul>
						<button>hello</button>
						<li><a
							href="index.php?method=manageTeachersClick&controller=Admin"
							id="link1">Manage Teacher Account</a></li>
							
						<li><a href="index.php?method=manageStudentsClick&controller=Admin" id="link2">Manage Student Account</a></li>
						
						<li><a href="http://www.ddwhois.com" title="Whois">Edit Profile</a></li>
						<li><a href="http://www.dynamicdrive.com/forums/" title="Forums">Report
								Generation</a></li>

					</ul>
				</div>


			</div>



		</div>




	</div>










</body>








</html>