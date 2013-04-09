<?php
/* Creation Log

File Name                   -  TeacherView.php
Description                 -  Landing page of Teacher contains all functions teacher may perform
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  Anirudh Pandita	April 04, 2013		Clean up and 
														header separation
* ************************************************************************
*/
$pageName="TeacherView";
require_once ($_SESSION['SITE_PATH'] . '/views/Header.php');
?>
<body>

	<div id="cc">

		<div id="header">

			<img alt="" src="assets/images/Views/ulearn.gif"
				style="float: left; padding: 50px; width: 280px;"> 
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			 <div id="logout" style="float:right;">
			 <a id="logout33" href="index.php?method=logout&controller=Admin">LOG OUT</a>
			</div>
		</div>




		<div id="image">

			<div id="admincontent">

				
				<?php
				
				
	if (isset ( $viewName )) {

if ($viewName == "addCourse")
					{
						require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/AddCourseView.php';
					}

										
	if (isset ( $data )) {
	if ($viewName == "editProfile" && (! empty ( $data )))
						
						{
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/EditProfileView.php';
						}
	if ($viewName == "writeMessage" && (! empty ( $data ))) 

						{
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/WriteMessageView.php';
						}
	if ($viewName == "upload" && (! empty ( $data ))) 

						{
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/UploadView.php';
						}
	if ($viewName == "registerCourse" && (! empty ( $data ))) 

						{
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/RegisterCourseView.php';
						}
						
						if ($viewName == "MessageBody" && (! empty ( $data )))
						
						{
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/MessageBodyView.php';
						}
						
						if ($viewName == "showContent"&& (! empty ( $data ))) {
						
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/ContentView.php';
						}
						
						if ($viewName == "download"&& (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/DownloadView.php';
						}
							
   if ($viewName == "showProfile" && (! empty ( $data ))) 

						{
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/TeacherProfileView.php';
						}
if (isset ( $result2 )) {
if ($viewName == "editCourse" && (! empty ( $data )) && (! empty ( $result2 ))) 
					{
						require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/EditCourseView.php';
					}
if ($viewName == "viewMessage" && (! empty ( $data ))&& (! empty ( $result2 ))) 

						{

							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/ShowMessagesView.php';
						}

	}
}
     }
				
				?>
				
			</div>



			<div id="functionpanel">

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<h2 id="menuheading"> Choose from following : </h2><br><br>
				<div class="arrowgreen">
					 <ul class="nav nav2">
					 <div class="li1">

						<li><a href="index.php?method=uploadClick&controller=Teacher"
							id="link1">Upload Study Material</a></li></div>
					<div class="li1">
						<li><a href="index.php?method=messageClick&controller=Teacher"
							id="link1">Write Message</a></li></div>
					<div class="li1">
						<li><a href="index.php?method=editProfileClick&controller=Teacher"
							id="link1">Edit Profile</a></li></div>
					<div class="li1">
						<li><a href="index.php?method=addCourseClick&controller=Teacher">Add
								Course</a></li></div>
					<div class="li1">
						<li><a href="index.php?method=editCourseClick&controller=Teacher">Edit
								Course</a></li></div>
					<div class="li1">
						<li><a
							href="index.php?method=registerCourseClick&controller=Teacher">Register
								Course</a></li></div>
					<div class="li1">
						<li><a href="index.php?method=viewMessageClick&controller=Teacher">View
								Messages</a></li></div>
					<div class="li1">
								<li><a href="index.php?method=downloadClick&controller=Teacher"
							id="link1">View Study Material</a></li></div>

					</ul>
				</div>


			</div>



		</div>




	</div>










</body>






<?php require_once ($_SESSION['SITE_PATH'] . '/views/Footer.php');?>

</html>
