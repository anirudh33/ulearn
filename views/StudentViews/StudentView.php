<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title><?php if(isset($lang->HELLOSTUDENT)){echo $lang->HELLOSTUDENT;} else {echo "Welcome Student";} ?> </title>

<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
	media="screen" />


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
				
				if (isset ( $viewName )) {
					
					if ($viewName == "registerCourse") {
						require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/RegisterCourseView.php';
					}
					
					if ($viewName == "download") {
						require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/DownloadView.php';
					}
					
					if (isset ( $data )) {
						if ($viewName == "editProfile" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/EditProfileView.php';
						}
						
						if ($viewName == "writeMessage" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/MessageView.php';
						}
						
						if ($viewName == "viewMessage" && (! empty ( $data ))) 

						{
							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/ShowMessageView.php';
						}
						
						if ($viewName == "showProfile" && (! empty ( $data ))) 

						{
							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/StudentProfileView.php';
						}
					}
				}
				
				?>
				</center>
			</div>



			<div id="functionpanel">


				<div class="arrowgreen">
					<ul>
						<!-- <button>hello</button> -->
						<li><a href="index.php?method=downloadClick&controller=Student"
							id="link1">Download Study Material</a></li>
						<li><a href="index.php?method=messageClick&controller=Student"
							id="link1">Write Message</a></li>
						<li><a href="index.php?method=editProfileClick&controller=Student"
							id="link1">Edit Profile</a></li>
						<li><a
							href="index.php?method=registerCourseClick&controller=Student">Register
								Course</a></li>
						<li><a href="index.php?method=viewMessageClick&controller=Student">View
								Messages</a></li>

					</ul>
				</div>


			</div>



		</div>




	</div>










</body>








</html>