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



<!-- jquery source -->
<script src="assets/js/jquery/jquery.js" type="text/javascript"></script>
<script src="assets/js/MainViewSlide.js" type="text/javascript"></script>
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="assets/js/MainView.js" type="text/javascript"></script>
<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script type="text/javascript">

$(document).ready(function() {
	 
    $('#submit').click(function() { 

        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var passwordval = $("#password").val();
        var emailaddressVal = $("#email").val();
		var firstnameval=$("#firstname").val();
		var lastnameval=$("#lastname").val();
		var phoneval=$("#phone").val();
		var addressval=$("#address").val();
		var qualificationval=$("#qualification").val();
		
        if(emailaddressVal == '' && passwordval=='') {
            $("#email").val('Email required.');
            $("#password").val(' Password required.');
            
            hasError = true;
        }



        else if(emailaddressVal == '') {
            $("#email").val('Email required.');
            hasError = true;
        }
        else if(passwordval == '') 
        {		        
    	
            $("#password").after('Please enter your password.');
            hasError = true;
        }
        else if(!emailReg.test(emailaddressVal)) {
            $("#email").val('Not valid.');
            hasError = true;
        }

        if(firstnameval == '') 
        {		        
    	
            $("#firstname").val('Please enter your password.');
            hasError = true;
        }
        if(lastnameval == '') 
        {		        
    	
            $("#lastname").val('Please enter your password.');
            hasError = true;
        }
        
        if(hasError == true) { return false; }

        if(phoneval == '') 
        {		        
    	
            $("#phone").val('Please enter your password.');
            hasError = true;
        }
        
        if(hasError == true) { return false; }


        if(addressval == '') 
        {		        
    	
            $("#address").val('Please enter your password.');
            hasError = true;
        }
        
        if(hasError == true) { return false; }
		
    });
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
		<div id="image">

			<div id="registerdiv">
				<form action="index.php?method=registerUser&controller=Main"
					method="POST" class="register" enctype="multipart/form-data">
					<h1>Registration</h1>
					<fieldset class="row1">
						<legend>Account Details </legend>
						<p>
							<label>Email * </label> <input type="text" name="email"
								id="email" /> <label>Repeat email * </label> <input type="text" />
						</p>
						<p>
							<label>Password* </label> <input type="password" name="password"
								id="password" /> <label>Repeat Password* </label> <input
								type="password" /> <label class="obinfo">* obligatory fields </label>
						</p>
					</fieldset>
					<fieldset class="row2">
						<legend>Personal Details </legend>
						<p>
							<label>First Name * </label> <input type="text" class="long"
								name="firstname" id="firstname" />
						</p>
						<p>
							<label>Last Name * </label> <input type="text" class="long"
								name="lastname" id="lastname" />
						</p>
						<p>
							<label>Phone * </label> <input type="text" maxlength="10"
								name="phone" id="phone" />
						</p>

						<p>
							<label>Address * </label> <input type="text" class="long"
								name="address" id="address" />
						</p>


						<p>
							<label>Qualification </label> <input type="text" class="long"
								name="qualification" id="qualification" />
						</p>
						<p>
							<label>Profile Picture</label><input type="file" size="10"
								name="profilepicture">
						</p>
					</fieldset>
					<fieldset class="row3">
						<legend>Further Information </legend>
						<p>
							<label>Gender *</label> <input type="radio" name="gender"
								value="male" /> <label class="gender">Male</label> <input
								type="radio" name="gender" value="female" /> <label
								class="gender">Female</label>
						</p>
						<p>
							<label>Date Of Birth:</label> <input type="text" name="date"
								id="datepicker" />
						</p>

						<p>
							<label>User Type * </label> <label>Student </label><input
								type="radio" name="usertype" value="student" /> <label>Teacher </label>
							<input type="radio" name="usertype" value="teacher" />
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
						<p>
							<img id="captcha" src="libraries/securimage/securimage_show.php"
								alt="CAPTCHA Image" /> <br> <input type="text"
								name="captcha_code" size="10" maxlength="6" /> <a href="#"
								onclick="document.getElementById('captcha').src = 
									'libraries/securimage/securimage_show.php?' + Math.random(); 
								return false">[Different Image ]</a>
						</p>
					</fieldset>


					<div>
						<button class="button" >Register &raquo;</button>
					</div>
				</form>
			</div>





		</div>

	</div>

	<div id="footer1"></div>


</body>
</html>



































