<?php 
/* Creation Log

File Name                   -  StudentView.php
Description                 -  Landing page of Student contains all functions student may perform
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
$pageName="StudentView";
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
					
					if ($viewName == "registerCourse") {
						require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/RegisterCourseView.php';
					}
														
					if (isset ( $data )) {
						if ($viewName == "editProfile" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/EditProfileView.php';
						}
						
						if ($viewName == "writeMessage" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/WriteMessageView.php';
						}
						
						
						
						if ($viewName == "showProfile" && (! empty ( $data ))) 

						{
							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/StudentProfileView.php';
						}
						
						
						if ($viewName == "showContent"&& (! empty ( $data ))) {

							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/ContentView.php';
						}
						
						if (isset ( $data1 )) {
						if ($viewName == "viewMessage" && (! empty ( $data ))&& (! empty ( $data1 )))

{
	require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/ShowMessagesView.php';
}

						if ($viewName == "download"&& (! empty ( $data ))&& (! empty ( $data1 ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/DownloadView.php';
						}
						if ($viewName == "MessageBody" && (! empty ( $data ))&& (! empty ( $data1 )))
						
						{
							require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/MessageBodyView.php';
						}
						}
						
					}
				}
				
				?>
				
			</div>
			<div id="functionpanel">

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<h2 id="menuheading"> </h2>
				<div class="arrowgreen">
					<ul>
						<!-- <button>hello</button> -->
						 <div class="li1">
						<li><a href="index.php?method=downloadClick&controller=Student"
							id="link1">Download Study Material</a></li></div>
						 <div class="li1">
						<li><a href="index.php?method=messageClick&controller=Student"
							id="link1">Write Message</a></li></div>
						 <div class="li1">
						<li><a href="index.php?method=editProfileClick&controller=Student"
							id="link1">Edit Profile</a></li></div>
						 <div class="li1">
						<li><a
							href="index.php?method=registerCourseClick&controller=Student">Register
								Course</a></li></div>
						 <div class="li1">
						<li><a href="index.php?method=viewMessageClick&controller=Student">View
								Messages</a></li></div>

					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once ($_SESSION['SITE_PATH'] . '/views/Footer.php');?>
</html>
