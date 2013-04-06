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

    <h2><strong>User Registration</strong></h2>

    <div id="form-content">
        <fieldset>

            <div class="fieldgroup">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname">
           </div>
           <div class="fieldgroup" >
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname">
            </div>

            <div class="fieldgroup">
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            </div>
			<div class="fieldgroup">
                <label for="repeatemail"> Repeat Email</label>
                <input type="text"  name="repeatemail">
            </div> 
            
            <div class="fieldgroup">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="fieldgroup">
                <label for="repeatpassword">Repeat Password</label>
                <input type="password"  name="repeatpassword">
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
                <label for="qualification">Qualification</label>
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
                <label for="usertype">Usertype</label>
                 <p>
                <label>Student</label><input type="radio" name="usertype" value="student" checked /> 
                </p>
                <p>
                <label class="gender">Teacher</label><input type="radio" name="usertype" value="teacher" />
             </p>
             </div> 
             
             <div class="fieldgroup">
                <label for="date">Date Of Birth</label>
               <input type="text" id="datepicker23" name="date"/>
            </div>
             
             
            <div class="fieldgroup" >
       
							<img id="captcha" src="libraries/securimage/securimage_show.php"
								alt="CAPTCHA Image" width="300px"/> <br> <input type="text"
								name="captcha_code" id="captcha_code" size="10" maxlength="6"
								/> <a
								href="#"
								onclick="document.getElementById('captcha').src = 
									'libraries/securimage/securimage_show.php?' + Math.random(); 
								return false">[Different Image ]</a>
						
						</div>
				
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
