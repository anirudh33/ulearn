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

/*Creating profile picture image resource*/
$image=imagecreatefromstring($data[0]['profilepicture']);
/* Storing picture to file with custom quality range 1 - 100 */
imagejpeg($image,"assets/images/Views/profilepics/studentprofile".$_SESSION['userID'].".jpeg",20); 

?>
	<header>
	
		<div class="wrapper">
			
			<span id="leftusernav">Welcome <?php echo $data[0]['firstname'];?></span>
			
			
		</div>
	</header>
	
	
	
	<div id="content" class="clearfix">
		<section id="left">
			<div id="userStats" class="clearfix">
				<div class="pic">
					<a href="#"><img alt="no image" src="assets/images/Views/profilepics/studentprofile<?php echo $_SESSION['userID'];?>.jpeg" width="150" height="195" /></a>
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
					
					<h4><a href="http://ulearn.com/">http://ulearn.com/</a></h4>
					
					<div class="sep"></div>
					
				</div>	
						<?php 	}?>
				
			</div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<center>
			<h1>About Me:</h1><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div id="userdetails">
	<div id="data">
		<h3>Name :</h3> <h4  style="color:red;"> <?php echo $data[0]['firstname'];?>&nbsp<?php echo $data[0]['lastname'];?></h4>
		<div class="line-separator"></div>		
<h3>Qualification:  </h3> <h4 style="color:red;"><?php echo $data[0]['qualification'];?></h4>
<div class="line-separator"></div>		
<h3>Date of Birth:  </h3> <h4 style="color:red;"><?php echo $data[0]['dob'];?></h4>
<div class="line-separator"></div>		
<h3>Qualification:  </h3> <h4 style="color:red;"><?php echo $data[0]['qualification'];?></h4>
<div class="line-separator"></div>		
<h3>Contact Number:  </h3> <h4 style="color:red;"><?php echo $data[0]['phone'];?></h4>
<div class="line-separator"></div>		
<h3>Address:  </h3> <h4 style="color:red;"><?php echo $data[0]['address'];?></h4>

	</div>
		</div></center>

		</section>
		
		
	</div>

