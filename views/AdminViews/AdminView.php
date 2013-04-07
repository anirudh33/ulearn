<?php 
/* Creation Log

File Name                   -  AdminView.php
Description                 -  Landing page of Admin contains all functions Admin may perform
Version                     -  1.0
Created by                  -  Ujjwal Rawlley
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  Anirudh Pandita	April 04, 2013		Clean up and 
														header separation
* ************************************************************************
*/





$pageName="AdminView";
require_once ($_SESSION['SITE_PATH'] . '/views/Header.php');
?>




<body>

	<div id="div1"></div>




	<div id="cc">

		<div id="header">

			<img alt="" src="assets/images/Views/ulearn.gif"
				style="float: left; padding: 50px; width: 280px;">
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			 <a	id="logout33" href="index.php?method=logout&controller=Admin">LOG OUT</a>

		</div>




		<div id="image">

			<div id="admincontent" align="center">

				
				
				
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
    
    elseif (! empty($adminprofiledata)) {

	  require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminProfileView.php';
	  }
	 


if(isset($reportdata))
{

	 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/ReportView.php';	

} 
elseif(!empty($studentreportcount))
{
//	echo "here also";
	 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/ReportView.php';	

} 

elseif(!empty($teacherreportcount))
{
//	echo "here also";
	 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/ReportView.php';	

}
if(isset($studentqualificationcount) and isset($teacherqualificationcount))
{
	
	 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/ReportView.php';	

}

if(isset($studentreportdata)and isset($teacherreportdata))
{
		

		 require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/ReportView.php';	
}

    ?>
			
			</div>



			<div id="functionpanel">


				<div class="arrowgreen">
					 <ul class="nav nav2">
					 <div class="li1">
      <li><a href="index.php?method=showProfile&controller=Admin"><?php echo $lang-> VIEWPROFILE;?></a></li>
						</div>
						<div class="li1">
						<li><a
							href="index.php?method=manageTeachersClick&controller=Admin" class="link"
							id="link1"><?php echo $lang-> MANAGETEACHER;?></a></li></div>
						<div class="li1">
						<li><a
							href="index.php?method=manageStudentsClick&controller=Admin"
							id="link2"><?php echo $lang->MANAGESTUDENT;?></a></li></div>
							<div class="li1">
						<li><a href="index.php?method=editProfileClick&controller=Admin"><?php echo $lang->EDITPROFILE;?></a></li>
								</div>
						<div class="li1">		
						<li><a href="index.php?method=generateReport&controller=Admin" title="Forums"><?php echo $lang->REPORTGENERATION;?></a></li>
   </div> </ul>
				</div>
				</div>
</div>
	</div>
</body>
</html>
