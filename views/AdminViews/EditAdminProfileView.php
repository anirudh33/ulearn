<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
// session_start();
require_once $_SESSION["SITE_PATH"] . '/libraries/Language.php';
$lang = Language::getinstance();
?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> <?php echo $lang->TITLE;  ?></title>
<!-- Links for stylesheet -->
<link rel="stylesheet" href="assets/style/Registration.css"
	type="text/css" media="screen" />
<script src="assets/js/RegistrationView.js" type="text/javascript"></script> 




</head>

<body>

	<div id="cc" width="5px" height="150px" align="center">




		<div id="registerdiv">

			<form action="index.php?method=editAdminClick&controller=Admin"
				method="POST" class="register">

				<h1><?php echo $lang->EDITPROFILE;?></h1>

				<fieldset class="row2">
					<legend><?php echo $lang->PERSONALDETAILS;?> </legend>
					<p>
						<label>First Name * </label> <input type="text" id="firstname" name="firstname"
							class="long" value=<?php echo $admindata[0]['firstname']?>
							onfocus="if(this.value === 'Firstname required') this.value = '';">
					</p>
					<p>
						<label>Last Name * </label> <input type="text" id="lastname" name="lastname"
							class="long" value=<?php echo $admindata[0]['lastname']?>
							onfocus="if(this.value === 'Lastname required') this.value = '';">
					</p>
					<p>
						<label>Phone  </label> <input type="text" id="phone" name="phone"
							maxlength="10" value=<?php echo $admindata[0]['phone']?>>
							
					</p>

					<p>
						<label>Address </label> <input type="text" id="address" name="address"
							class="long" value=<?php echo $admindata[0]['address']?>>
							
					</p>


					<p>
						<label><?php echo $lang->QUALIFICATION;?> </label> <input type="text"
							name="qualification" id="qualification" class="long"
							value=<?php echo $admindata[0]['qualification']?>
							onfocus="if(this.value === 'Qualification required') this.value = '';">
						
					</p>

				</fieldset>
				<fieldset class="row3">
					<legend><?php echo $lang->FURTHERINFO;?></legend>
					<p>
						<label>Gender </label> <input type="text" id="gender" name="gender"
							class="long" value=<?php echo $admindata[0]['gender']?>>
							o
					</p>
					<p>
						<label>Birthdate * </label> <input type="text" id="dob" name="dob"
							class="long" value=<?php echo $admindata[0]['dob']?>
							onfocus="if(this.value === 'DOB required') this.value = '';">
					</p>



					<div class="infobox">
						<h4><?php echo $lang->HELPFULINFO;?></h4>
						<p><?php echo $lang->INSTRUCTION;?></p>
					</div>
				</fieldset>
				<fieldset class="row4">
					<legend><?php echo $lang->TERMS;?> </legend>
					<p class="agreement">
						<input type="checkbox" value="" /> <label> I accept the <a
							href="#">Terms and Conditions</a></label>
					</p>
					<p class="agreement">
						<input type="checkbox" value="" /> <label><?php echo $lang->RECIEVE;?></label>
					</p>

				</fieldset>

				<div>
					<button class="button" id="button">Edit &raquo;</button>
				</div>
			</form>
		</div>







	</div>




</body>
</html>

































