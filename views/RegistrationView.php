<?php
/* Creation Log

File Name                   -  RegistrationView.php
Description                 -  new user registration page
Version                     -  1.0
Created by                  -  Kawaljeet Singh
Created on                  -  March 19, 2013
* **************************** Update Log ********************************
Sr.NO.        Version        Updated by           Updated on          Description
-------------------------------------------------------------------------

* ************************************************************************
*/
$pageName="RegistrationView";
require_once ($_SESSION['SITE_PATH'] . '/views/Header.php');
?>
<html>
<head>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="./assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="./assets/js/RegistrationView2.js"></script>



<link rel="stylesheet" type="text/css" href="./assets/style/registrationnew.css">
<link rel="stylesheet" type="text/css" href="./assets/style/registrationnew2.css">
 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
</head>
<body>


	<div id="cc">

		<div id="header">
			<a href="index.php"> <img alt="" src="assets/images/Views/ulearn.gif"
				style="float: left; padding: 50px; width: 280px;">
			</a>
		</div>
		<div id="header2">
			<a href="index.php"><h3>GO TO HOME</h3></a>
		</div>
		<div id="error">
		<?php
		if (isset ( $_REQUEST ["msg"] )) {
			echo $_REQUEST ["msg"];
		}
		
		?>
		
		
		</div>
		<div id="image">

			<form action="index.php?method=registerUser&controller=Main" method="post" id="register-form" 
			novalidate="novalidate" enctype="multipart/form-data">

    <h2>User Registration</h2>

    <div id="form-content">
        <fieldset>

            <div class="fieldgroup">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname">
           
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname">
            </div>

            <div class="fieldgroup">
                <label for="email">Email</label>
                <input type="text" name="email">
            </div>

            <div class="fieldgroup">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
		<div class="fieldgroup">
                <label for="address">Address</label>
                <input type="text" name="address">
            </div>
            <div class="fieldgroup">
                <label for="phone">Phone</label>
                <input type="text" name="phone">
            </div>
            <div class="fieldgroup">
                <label for="phone">Qualification</label>
                <select name="qualification">
								<option>graduate</option>
								<option>postgraduate</option>
								<option>doctorate</option>
								<option>others</option>
							</select>
            </div>
			<div class="fieldgroup">
                <label for="profilepic">Profile Picture</label>
                <input type="file" size="20"
								name="profilepicture">
            </div>   
            
            <div class="fieldgroup">
                <label for="gender">Gender</label>
                 <p>
                <label>Male</label><input type="radio" name="gender" value="m" checked /> 
                </p>
                <p>
                <label class="gender">Female</label><input type="radio" name="gender" value="f" />
             </p>
             </div> 
            
           <div class="fieldgroup">
                <label for="dob">Date of birth</label>
               <input type="text" name="date" id="datepicker" />
            </div> 
            
            <div class="fieldgroup">
                <label for="usertype">Usertype</label>
                 <p>
                <label>Student</label><input type="radio" name="usertype" value="student" checked /> 
                </p>
                <p>
                <label class="gender">Teacher</label><input type="radio" name="usertype" value="teacher" />
             </p>
             </div> 
            
            <p>
							<img id="captcha" src="libraries/securimage/securimage_show.php"
								alt="CAPTCHA Image" /> <br> <input type="text"
								name="captcha_code" id="captcha_code" size="10" maxlength="6"
								/> <a
								href="#"
								onclick="document.getElementById('captcha').src = 
									'libraries/securimage/securimage_show.php?' + Math.random(); 
								return false">[Different Image ]</a>
						</p>
						
						
				<p>
							<input type="checkbox" value="" name="checkmail" /> <label>Please
								send the confirmation mail </label>
						</p>
            
            
             
            <div class="fieldgroup">
                <input type="submit" value="Register" class="submit">
            </div>

        </fieldset>
    </div>

        <div class="fieldgroup">
            <p>Already registered? <a href="index.php">Sign in</a>.</p>
        </div>
</form>





		</div>

	</div>

	<div id="footer1"></div>


</body>
</html>
