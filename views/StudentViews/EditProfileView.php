<?php 
/* Creation Log

File Name                   -  EditProfile.php
Description                 -  Edit teacher's own profile
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.	Version     Updated by          Updated on      Description
-------------------------------------------------------------------------
1		1.1			Anirudh pandita		April 04, 2013		Clean up
2		1.1			Anirudh pandita		April 06, 2013		Fixed date picker
* ************************************************************************
*/
?>

	


<div id="registerdiv">
	
	<form id="form"
		action="index.php?method=editStudentClick&controller=Student"
		method="POST" class="register" novalidate="novalidate">
<h1>Edit Profile</h1>
		<legend>Personal Details </legend>
		<p>
			<label>First Name * </label> <input type="text" id="firstname"
				name="firstname" class="long"
				value=<?php echo $data[0]['firstname']?>>
		</p>
		<p>
			<label>Last Name * </label> <input type="text" id="lastname"
				name="lastname" class="long" value=<?php echo $data[0]['lastname']?>>
		</p>
		<p>
			<label>Phone </label> <input type="text" id="phone" name="phone"
				maxlength="10" value=<?php echo $data[0]['phone']?>>

		</p>

		<p>
			<label>Address </label> <input type="text" id="address"
				name="address" class="long" value=<?php echo $data[0]['address']?>>

		</p>

<p>
			<?php 
			
			$strQualification = $data [0] ['qualification'];
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

		


		

<p>

<?php $strGender=$data[0]['gender'];?>
				
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
					<?php $strDob=$admindata[0]['dob'];  ?>
		<p>
		
			 <div class="fieldgroup">
                <label for="date">Date Of Birth</label>
               <input type="text" id="datepicker23" name="dob" value=<?php echo $strDob;?> readonly="readonly">
            </div>
		</p>

		<button class="button" id="edit">Edit &raquo;</button>

	</form>
</div>