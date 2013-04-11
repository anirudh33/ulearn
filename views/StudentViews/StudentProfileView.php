<?php /* Creation Log

File Name                   -  StudentProfileView.php
Description                 -  displays student profile
Version                     -  1.0
Created by                  -  Tanu Trehan
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  Ujjwal Rawlley	April 04, 2013		Profile View updated
* ************************************************************************
*/
if(isset($data[0]['profilepicture'])) {
/*Creating profile picture image resource*/
$image=imagecreatefromstring($data[0]['profilepicture']);
/* Storing picture to file with custom quality range 1 - 100 */
imagejpeg($image,"<?php echo SITE_URL;?>/assets/images/Views/profilepics/studentprofile".$_SESSION['userID'].".jpeg",20); 
}
?>
	<header>
	
		<div class="wrapper">
			
			<span id="leftusernav"><?php echo $lang-> WELCOME;?>&nbsp<?php echo $data[0]['firstname'];?></span>
			
			
		</div>
	</header>
	
	
	
	<div id="content" class="clearfix">
		<section id="left">
			<div id="userStats" class="clearfix">
				<div class="pic">
					<a href="#"><img src="<?php echo SITE_URL;?>/assets/images/Views/profilepics/studentprofile<?php echo $_SESSION['userID'];?>.jpeg" width="150" height="195" /></a>
				</div>
				<?php if(!empty($data))
				{?>
					
				<div class="data">
					<center><h1><?php echo $data[0]['firstname'];?> &nbsp <?php echo $data[0]['lastname'];
					?></h1></center>
					<center><h3><?php echo $data[0]['qualification'];?></center></h3>
					

					
					
					
				</div>
				<?php }
				else {?>
						<div class="data">
					<h1>Welcome</h1>
					<h3>Student</h3>
					
					
					
					<div class="sep"></div>
					
				</div>	
						<?php 	}?>
				
			</div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<center>
			<h1><?php echo $lang->ABOUTME; ?></h1><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div id="userdetails">
	<div id="data">
		<h3><?php echo $lang->NAME; ?> :</h3> <h4  style="color:red;"> <?php echo $data[0]['firstname'];?>&nbsp<?php echo $data[0]['lastname'];?></h4>
		<div class="line-separator"></div>		
<h3><?php echo $lang->QUALIFICATION; ?>: </h3> <h4 style="color:red;"><?php echo $data[0]['qualification'];?></h4>
<div class="line-separator"></div>		
<h3><?php echo $lang->BIRTHDATE;?>: </h3> <h4 style="color:red;"><?php echo $data[0]['dob'];?></h4>
<div class="line-separator"></div>		

<div class="line-separator"></div>		
<h3><?php echo $lang->CONTACTNO;?>: </h3> <h4 style="color:red;"><?php echo $data[0]['phone'];?></h4>
<div class="line-separator"></div>		
<h3><?php echo $lang->ADDRESS;?>: </h3> <h4 style="color:red;"><?php echo $data[0]['address'];?></h4>

	</div>
		</div></center>

		</section>
		
		
	</div>

