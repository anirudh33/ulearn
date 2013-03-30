<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title><?php echo $lang->HELLOTEACHER?> </title>

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
				href="index.php?method=logout&controller=Teacher">LOG OUT</a>

		</div>




		<div id="image">

			<div id="admincontent">

				<center>
				<?php
				
				if (! empty ( $data )) {
					
					require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/EditProfileView.php';
				}
				elseif ($viewName == "addCourse") {
					require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/AddCourseView.php';
				}
				elseif ($viewName == "writeMessage" && (! empty ( $messages ))) {
					require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/MessageView.php';
				}
				elseif ($viewName == "upload" && (! empty ( $messages ))) {
					echo "hello";
					require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/UploadView.php';
				}
				elseif ($viewName == "registerCourse"&& (! empty ( $messages ))) {
					require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/RegisterCourseView.php';
				}
				elseif ($viewName == "viewMessage" && (! empty ( $messages ))) 

				{
					require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/ShowMessageView.php';
				}
	

				elseif ($viewName == "showProfile" && (! empty ( $messages )))
				
			 	{
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/TeacherProfileView.php';
				}
				
				?>
				</center>
			</div>



			<div id="functionpanel">


				<div class="arrowgreen">
					<ul>
						<!-- <button>hello</button> -->
						<li><a href="index.php?method=uploadClick&controller=Teacher"
							id="link1">Upload Study Material</a></li>
						<li><a href="index.php?method=messageClick&controller=Teacher"
							id="link1">Write Message</a></li>
						<li><a href="index.php?method=editProfileClick&controller=Teacher"
							id="link1">Edit Profile</a></li>
						<li><a href="index.php?method=addCourseClick&controller=Teacher">Add
								Course</a></li>
						<li><a
							href="index.php?method=registerCourseClick&controller=Teacher">Register
								Course</a></li>
						<li><a href="index.php?method=viewMessageClick&controller=Teacher">View
								Messages</a></li>

					</ul>
				</div>


			</div>



		</div>




	</div>










</body>








</html>