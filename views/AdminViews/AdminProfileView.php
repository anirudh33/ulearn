<?php 
/* Creation Log

File Name                   -  AdminProfileView.php
Description                 -  Displays the profile of admin
Version                     -  1.0
Created by                  -  Ujjwal Rawlley
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  Ujjwal Rawlley	April 04, 2013		Profile View updated
* ************************************************************************
*/

/*Creating profile picture image resource*/
$image=imagecreatefromstring($adminprofiledata[0]['profilepicture']);
/* Storing picture to file with custom quality range 1 - 100 */
imagejpeg($image,"assets/images/Views/profilepics/adminprofile".$_SESSION['userID'].".jpeg",20); 

$pageName="AdminProfileView";
//@todo move the following header to admin view so that log out shows on each page if sounds fine

?>
	<header id="header1">
	
		<div class="wrapper">
			
			<span id="leftusernav"><?php echo $lang-> WELCOME;?>&nbsp<?php echo $adminprofiledata[0]['firstname'];?></span>
			
		</div>
	</header>
				<span id="usernav"> <a href="index.php?method=showProfile&controller=Admin"><?php echo $lang-> MYPROFILE;?></a> 
	

	
	<div id="content" class="clearfix">
		<section id="left">
			<div id="userStats" class="clearfix">
				<div class="pic">
					<a href="#"><img src="assets/images/Views/profilepics/adminprofile<?php echo $_SESSION['userID'];?>.jpeg" width="150" height="250" /></a>
				</div>
				<?php if(!empty($adminprofiledata))
				{?>
					
				<div class="data">
					<h1><?php echo $adminprofiledata[0]['firstname'];?> &nbsp <?php echo $adminprofiledata[0]['lastname'];
					?></h1>
					<h3><?php echo $adminprofiledata[0]['qualification'];
					?></h3>
					
					<h4><a href="http://ulearn.com/">http://ulearn.com/</a></h4>
					
					<div class="sep"></div>
					
				</div>
				<?php }
				else {?>
						<div class="data">
					<h1>Welcome</h1>
					<h3>Administrator</h3>
					
					<h4><a href="http://ulearn.com/">http://ulearn.com/</a></h4>
					
					<div class="sep"></div>
					
				</div>	
						<?php 	}?>
				
			</div>
			<h1>About Me:</h1>

<div id="userdetails">
	<div id="data">
		<h3>Name :</h3> <h4> <?php echo $adminprofiledata[0]['firstname'];?>&nbsp<?php echo $adminprofiledata[0]['lastname'];?></h4>
		<div class="sep"></div>		
<h3>Qualification:  </h3> <h4><?php echo $adminprofiledata[0]['qualification'];?></h4>
<h3>Date of Birth:  </h3> <h4><?php echo $adminprofiledata[0]['dob'];?></h4>

<h3>Contact Number:  </h3> <h4><?php echo $adminprofiledata[0]['phone'];?></h4>
<h3>Address:  </h3> <h4><?php echo $adminprofiledata[0]['address'];?></h4>

	</div>
		</div>
		
</section>
		

			





		
	</div>

</html>
