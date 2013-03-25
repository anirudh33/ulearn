<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
// session_start();
require_once $_SESSION["SITE_PATH"] . '/libraries/Language.php';
$lang = Language::getinstance();
?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> <?php echo $lang->TITLE;  ?></title>
<!-- Links for stylesheet -->
<link rel="stylesheet" href="assets/style/Registration.css"
	type="text/css" media="screen" />





</head>

<body>

	<div id="cc" width="5px" height="150px" align="center">

		  
		 

			<div id="registerdiv" >
			
				<form action="index.php?method=registerCourse&controller=Student"
					method="POST" class="register">
				
					<h1>Register Course</h1>
					
					<fieldset class="row2">
						<legend>Course Details </legend>
<p>
							<label>Course Id * </label> <input type="text" name="course_id" class="long" >
						</p>
						
						<p>
							<label>Student Id * </label> <input type="text" name="student_id" class="long" >
						</p>
						
						</br></br>
						<button class="button">Add &raquo;</button>
					
					</fieldset>
									

		
					
				</form>
			</div>





	

	</div>

	


</body>
</html>


































