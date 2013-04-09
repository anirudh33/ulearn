<?php /* Creation Log

File Name                   -  AdminView.php
Description                 -  Landing page of Teacher contains all functions Admin may perform
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
imagejpeg($image,"assets/images/Views/profilepics/teacherprofile".$_SESSION['userID'].".jpeg",20);
}
?>
	<header>

		<div class="wrapper">

			<span id="leftusernav">Welcome <?php echo $data[0]['firstname'];?></span>
			<span id="usernav"><a
				href="index.php?method=showProfile&controller=Teacher">My Profile</a>
		
		</div>
	</header>



	<div id="content" class="clearfix">
		<section id="left">
			<div id="userStats" class="clearfix">
				<div class="pic">
					<a href="#"><img alt="no image" src="assets/images/Views/profilepics/teacherprofile<?php echo $_SESSION['userID']; ?>.jpeg" width="150"
						height="195" /></a>
				</div>
				<?php
				
if (! empty ( $data )) {
					?>
					
				<div class="data">
					<h1><?php echo $data[0]['firstname'];?> &nbsp <?php
					
echo $data [0] ['lastname'];
					?></h1>
<center>
					<h3><?php
					
echo $data [0] ['qualification'];
					?></h3>

					<h4>
						<a href="http://ulearn.com/">http://ulearn.com/</a>
					</h4>
</center>
					<div class="sep"></div>

				</div>
				<?php
				
} else {
					?>
						<div class="data">
					<h1>Welcome</h1>
					<h3>Teacher</h3>

					<h4>
						<a href="http://ulearn.com/">http://ulearn.com/</a>
					</h4>

					<div class="sep"></div>

				</div>	
						<?php 	}?>
				
			</div>
<center>
			<h1>About Me:</h1>
			<div id="userdetails">
	<div id="data">
		<h3>Name :</h3> <h4  style="color:red;"> <?php echo $data[0]['firstname'];?>&nbsp<?php echo $data[0]['lastname'];?></h4>
		<div class="sep"></div>		
<h3>Qualification:  </h3> <h4 style="color:red;"><?php echo $data[0]['qualification'];?></h4>
<h3>Date of Birth:  </h3> <h4 style="color:red;"><?php echo $data[0]['dob'];?></h4>
<h3>Qualification:  </h3> <h4 style="color:red;"><?php echo $data[0]['qualification'];?></h4>
<h3>Contact Number:  </h3> <h4 style="color:red;"><?php echo $data[0]['phone'];?></h4>
<h3>Address:  </h3> <h4 style="color:red;"><?php echo $data[0]['address'];?></h4>

	</div>
		</div></center>
		</section>


	</div>
</html>
