<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title><?php echo $lang->HELLOSTUDENT?> </title>

<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
	media="screen" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

</script>
</head>

<body>

	




	<div id="cc">

		<div id="header">

			<img alt="" src="../../assets/images/Views/ulearn.gif"
				style="float: right; padding: 50px; width: 280px;"> <a
				href="index.php?method=logout&controller=Student">LOG OUT</a>

		</div>




		<div id="image">

			<div id="admincontent">

				<center>
				<?php
    
if (! empty($data)) {
        
        require_once $_SESSION["SITE_PATH"] . '/views/StudentViews/EditProfileView.php';
    }
    if($viewName=="registerCourse")
    {
    	require_once $_SESSION["SITE_PATH"] . '/views/StudentViews/RegisterCourseView.php';
    }
    if($viewName=="message")
    {
    	require_once $_SESSION["SITE_PATH"] . '/views/StudentViews/MessageView.php';
    }
    if($viewName=="download")
    {
    	require_once $_SESSION["SITE_PATH"] . '/views/StudentViews/DownloadView.php';
    }
    
    ?>
				</center>
			</div>



			<div id="functionpanel">


				<div class="arrowgreen">
					<ul>
						<!-- <button>hello</button> -->
						<li><a href="index.php?method=downloadClick&controller=Student" id="link1">Download Study Material</a></li>
						<li><a href="index.php?method=messageClick&controller=Student" id="link1">Message</a></li>
						<li><a href="index.php?method=editProfileClick&controller=Student" id="link1">Edit Profile</a></li>
						<li><a href="index.php?method=registerCourseClick&controller=Student">Register Course</a></li>

					</ul>
				</div>


			</div>



		</div>




	</div>










</body>








</html>