<?php
/*
 ************************** Creation Log *****************************

File Name                   -  EditAdminProfileView.php
Description                 -  Edit Profile page of Admin
Version                     -  1.0
Created by                  -  Ujjwal Rawlley
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.	Version     Updated by          Updated on      Description
-------------------------------------------------------------------------
1		1.1			Anirudh pandita		April 04, 2013		Clean up
2		1.1			Anirudh pandita		April 06, 2013		Fixed date picker
* ************************************************************************
*/ 
//@todo edit profile changes doesnt get reflected back to the view 
$pageName=="EditAdminProfileView";
//@todo change div ids to proper names
?>

	<link rel="stylesheet" href="assets/style/editprofile.css"
	type="text/css" media="screen" />
	

	
	
<div id="registerdiv">

	<form id="form"	action="index.php?method=editAdminClick&controller=Admin" 
	method="POST" class="register">

		<h1><?php echo $lang->EDITPROFILE;?></h1>

		<fieldset class="row2">
			<legend><?php echo $lang->PERSONALDETAILS;?> </legend>
			<p>
				<label>First Name * </label> <input type="text" id="firstname"
					name="firstname" class="long"
					value=<?php echo $admindata[0]['firstname'];?>>
			</p>
			<p>
				<label>Last Name * </label> 
				<input type="text" id="lastname" name="lastname" class="long" 
				value=<?php echo $admindata[0]['lastname'];?>>
			</p>
			<p>
				<label>Phone </label> 
				<input type="text" id="phone" name="phone" maxlength="10" 
				value='<?php echo $admindata[0]['phone']; ?>' >

			</p>

			<p>
				<label>Address </label>
				 <input type="text" id="address" name="address" class="long" 
				 value='<?php echo $admindata[0]['address'];?>' >

			</p>


			<p>
			<?php 
			
			$strQualification = $admindata [0] ['qualification'];
			?>
			
			<div class="fieldgroup">
				<label for="qualification">Qualification</label> 
				<select
					name="qualification">
					<option
						<?php if ($strQualification == "graduate") { echo "selected";}?>  
						value="graduate">graduate</option>
					<option
						<?php if ($strQualification == "postgraduate") { echo "selected";}?>
						value="postgraduate">postgraduate</option>
					<option
						<?php if ($strQualification == "doctorate") { echo "selected";}?>
						value="doctorate">doctorate</option>
					<option <?php if ($strQualification == "others") { echo "selected";}?>
						value="others">others</option>
				</select>
			</div>

			</p>



		</fieldset>
		<fieldset class="row3">
			<legend><?php echo $lang->FURTHERINFO;?></legend>
			<p>

<?php $strGender=$admindata[0]['gender'];?>
				
			<div class="fieldgroup">
                <label for="gender">Gender</label>
                 <p>
                <label class="gender">Male</label>
                <input type="radio" name="gender" <?php if ($strGender == "m") { echo "checked";}?>  
						value="m"/>
				
                </p>
                <p>
                <label class="gender">Female</label>
                <input type="radio"
						name="gender" <?php if ($strGender == "f") { echo "checked";}?>  
						value="f"/>
             </p>
             </div> 

					</p>
					<?php $strDob= $admindata[0]['dob'];?>
					
					
					<p>
						
					<div class="fieldgroup">
                <label for="date">Date Of Birth</label>
               <input type="text" id="datepicker23" name="dob" value=<?php echo $strDob;?>>
            </div>
					 
               	</p>



					<div class="infobox">
						<h4><?php echo $lang->HELPFULINFO;?></h4>
						<p><?php echo $lang->INSTRUCTION;?></p>
					</div>
				</fieldset>
				

				<div>
					<button class="button" id="edit">Edit &raquo;</button>
				</div>
			</form>
		</div>
