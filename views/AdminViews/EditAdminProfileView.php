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





</head>

<body>

	<div id="cc" width="5px" height="150px" align="center">




		<div id="registerdiv">

			<form action="index.php?method=editAdminClick&controller=Admin"
				method="POST" class="register">

				<h1>Edit Profile</h1>

				<fieldset class="row2">
					<legend>Personal Details </legend>
					<p>
						<label>First Name * </label> <input type="text" name="firstname"
							class="long" value=<?php echo $admindata[0]['firstname']?>>
					</p>
					<p>
						<label>Last Name * </label> <input type="text" name="lastname"
							class="long" value=<?php echo $admindata[0]['lastname']?>>
					</p>
					<p>
						<label>Phone * </label> <input type="text" name="phone"
							maxlength="10" value=<?php echo $admindata[0]['phone']?>>
					</p>

					<p>
						<label>Address * </label> <input type="text" name="address"
							class="long" value=<?php echo $admindata[0]['address']?>>
					</p>


					<p>
						<label>Qualification </label> <input type="text"
							name="qualification" class="long"
							value=<?php echo $admindata[0]['qualification']?>>
					</p>

				</fieldset>
				<fieldset class="row3">
					<legend>Further Information </legend>
					<p>
						<label>Gender *</label> <input type="text" name="gender"
							class="long" value=<?php echo $admindata[0]['gender']?>>
					</p>
					<p>
						<label>Birthdate * </label> <input type="text" name="dob"
							class="long" value=<?php echo $admindata[0]['dob']?>>
					</p>



					<div class="infobox">
						<h4>Helpful Information</h4>
						<p>From now your email will be used as Username for further
							process....</p>
					</div>
				</fieldset>
				<fieldset class="row4">
					<legend>Terms and Mailing </legend>
					<p class="agreement">
						<input type="checkbox" value="" /> <label>* I accept the <a
							href="#">Terms and Conditions</a></label>
					</p>
					<p class="agreement">
						<input type="checkbox" value="" /> <label>I want to receive
							personalized offers by your site</label>
					</p>

				</fieldset>

				<div>
					<button class="button">Edit &raquo;</button>
				</div>
			</form>
		</div>







	</div>




</body>
</html>

































