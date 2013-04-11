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

if(isset($adminprofiledata[0]['profilepicture'])) {
/*Creating profile picture image resource*/
$image=imagecreatefromstring($adminprofiledata[0]['profilepicture']);
/* Storing picture to file with custom quality range 1 - 100 */
imagejpeg($image,"<?php echo SITE_URL;?>/assets/images/Views/profilepics/adminprofile".$_SESSION['userID'].".jpeg",20); 
}
$pageName="AdminProfileView";


?>
	<header id="header1">
	
		<div class="wrapper">
			
			<span id="leftusernav"><?php echo $lang-> WELCOME;?>&nbsp<?php echo $adminprofiledata[0]['firstname'];?></span>
			
		</div>
	</header>
				<span id="usernav">  
	

	
	<div id="content" class="clearfix">
		<section id="left">
			<div id="userStats" class="clearfix">
				<div class="pic">
					<a href="#"><img src="<?php echo SITE_URL;?>/assets/images/Views/profilepics/adminprofile<?php echo $_SESSION['userID'];?>.jpeg" width="150" height="150" /></a>
				</div>
				<?php if(!empty($adminprofiledata))
				{?>
					
				<div class="data">
					<h1><?php echo $adminprofiledata[0]['firstname'];?> &nbsp <?php echo $adminprofiledata[0]['lastname'];
					?></h1>
					<h3><?php echo $adminprofiledata[0]['qualification'];
					?></h3>
					
					
					
					
					
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
				
			</div><br><br>
			<h1><?php echo $lang->ABOUTME; ?></h1>
<br>
<div id="userdetails">
	<div id="data">
		<h3><?php echo $lang->NAME; ?>:</h3> <h4> <?php echo $adminprofiledata[0]['firstname'];?>&nbsp<?php echo $adminprofiledata[0]['lastname'];?></h4>
		<div class="line-separator"></div>	
<h3><?php echo $lang->QUALIFICATION; ?>:  </h3> <h4><?php echo $adminprofiledata[0]['qualification'];?></h4>
<div class="line-separator"></div>
<h3><?php echo $lang->BIRTHDATE;?>:  </h3> <h4><?php echo $adminprofiledata[0]['dob'];?></h4>
<div class="line-separator"></div>

<h3><?php echo $lang->CONTACTNO;?>:  </h3> <h4><?php echo $adminprofiledata[0]['phone'];?></h4>
<div class="line-separator"></div>
<h3><?php echo $lang->ADDRESS;?>:  </h3> <h4><?php echo $adminprofiledata[0]['address'];?></h4>

	</div>
		</div>
		
</section>
		

			





		
	</div>

</html>
