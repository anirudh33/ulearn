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
$pageName = "TeacherView";
require_once (SITE_PATH . '/views/Header.php');
?>

<html>
<body>
	<div id="cc">
		<div id="header">
			<img alt=""
				src="<?php echo SITE_URL;?>/assets/images/Views/ulearn.gif"
				style="float: left; padding: 50px; width: 280px;"> <br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div id="logout" style="float: right;">
				<a id="logout33" href="index.php?method=logout&controller=Admin">LOG
					OUT</a>
			</div>
		</div>
		<div id="image">
			<div id="admincontent">				
				<?php
				if (isset ( $viewName )) {
					if ($viewName == "addCourse") {
						require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/AddCourseView.php';
					}
					if (isset ( $data )) {
						if ($viewName == "editProfile" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/EditProfileView.php';
						}
						if ($viewName == "writeMessage" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/WriteMessageView.php';
						}
						if ($viewName == "upload" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/UploadView.php';
						}
						if ($viewName == "registerCourse" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/RegisterCourseView.php';
						}
						if ($viewName == "showContent" && (! empty ( $data ))) {
							
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/ContentView.php';
						}
						if ($viewName == "download" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/DownloadView.php';
						}
						
						if ($viewName == "showProfile" && (! empty ( $data ))) {
							require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/TeacherProfileView.php';
						}
						if (isset ( $result2 )) {
							if ($viewName == "editCourse" && (! empty ( $data )) && (! empty ( $result2 ))) {
								require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/EditCourseView.php';
							}
							if ($viewName == "viewMessage" && (! empty ( $data )) && (! empty ( $result2 ))) {
								require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/ShowMessagesView.php';
							}
							if ($viewName == "MessageBody" && (! empty ( $data )) && (! empty ( $result2 ))) {
								require_once $_SESSION ["SITE_PATH"] . '/views/TeacherViews/MessageBodyView.php';
							}
						}
					}
				}
				?>				
			</div>
			<div id="functionpanel">
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<h2 id="menuheading"><?php echo $lang->CHOOSEFROM; ?> </h2>
				<br>
				<br>
				<div class="arrowgreen">
					<ul class="nav nav2">
						<div class="li1">
							<li><a href="index.php?method=uploadClick&controller=Teacher"
								id="link1"><?php echo $lang->UPLOAD;?></a></li>
						</div>
						<div class="li1">
							<li><a href="index.php?method=messageClick&controller=Teacher"
								id="link1"><?php echo $lang->WRITE;?></a></li>
						</div>
						<div class="li1">
							<li><a
								href="index.php?method=editProfileClick&controller=Teacher"
								id="link1"><?php echo $lang->EDITPROFILE;?></a></li>
						</div>
						<div class="li1">
							<li><a href="index.php?method=addCourseClick&controller=Teacher"><?php echo $lang->ADDCOURSE;?></a></li>
						</div>
						<div class="li1">
							<li><a href="index.php?method=editCourseClick&controller=Teacher"><?php echo $lang->EDITCOURSE;?></a></li>
						</div>
						<div class="li1">
							<li><a
								href="index.php?method=registerCourseClick&controller=Teacher"><?php echo $lang->REGISTERCOURSE;?></a></li>
						</div>
						<div class="li1">
							<li><a
								href="index.php?method=viewMessageClick&controller=Teacher"><?php echo $lang->VIEWMESSAGES;?></a></li>
						</div>
						<div class="li1">
							<li><a href="index.php?method=downloadClick&controller=Teacher"
								id="link1"><?php echo $lang->VIEWSTUDY;?></a></li>
						</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once (SITE_PATH . '/views/Footer.php');?>
</html>