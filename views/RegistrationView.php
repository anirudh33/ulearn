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
			<a href="index.php"> <img alt="" src="assets/images/Views/upper4.png"
				style="float: left; padding: 50px; width: 600px;height:130px;">
			</a>
		</div>
		<div id="header2">
			<h3><a href="index.php"><?php echo $lang->GOTOHOME?></a></h3>
		</div>
		<div id="error">

	</div>
		<div id="image">

			<form action="index.php?method=registerUser&controller=Main" method="post" id="register-form" 
			novalidate="novalidate" enctype="multipart/form-data">

    <h2><strong><?php echo $lang->USERREGISRATION;?></strong></h2>

    <div id="form-content">
        <fieldset>

            <div class="fieldgroup">
                <label for="firstname"><?php echo $lang->FIRSTNAME;?></label>
                <input type="text" name="firstname">
           </div>
           <div class="fieldgroup" >
                <label for="lastname"><?php echo $lang->LASTNAME;?></label>
                <input type="text" name="lastname">
            </div>

            <div class="fieldgroup">
                <label for="email"><?php echo $lang->EMAIL;?></label>
                <input type="text" id="email" name="email">
            </div>
			<div class="fieldgroup">
                <label for="repeatemail"><?php echo $lang->REPEATEMAIL;?></label>
                <input type="text"  name="repeatemail">
            </div> 
            
            <div class="fieldgroup">
                <label for="password"><?php echo $lang->PASSWORD;?></label>
                <input type="password" id="password" name="password">
            </div>
            <div class="fieldgroup">
                <label for="repeatpassword"><?php echo $lang->REPEATPASSWORD;?></label>
                <input type="password"  name="repeatpassword">
            </div>
            
            
            
		<div class="fieldgroup">
                <label for="address"><?php echo $lang->ADDRESS;?></label>
                <input type="text" name="address">
            </div>
            <div class="fieldgroup">
                <label for="phone"><?php echo $lang->PHONE;?></label>
                <input type="text" name="phone">
            </div>
            <div class="fieldgroup">
                <label for="qualification"><?php echo $lang->QUALIFICATION;?></label>
                <select name="qualification">
								<option>graduate</option>
								<option>postgraduate</option>
								<option>doctorate</option>
								<option>others</option>
							</select>
            </div>
			<div class="fieldgroup">
                <label for="profilepic"><?php echo $lang->PROFILEPIC;?></label>
                <input type="file" size="20"
								name="profilepicture">
            </div>   
            
            <div class="fieldgroup">
                <label for="gender"><?php echo $lang->GENDER;?></label>
                 <p>
                <label>Male</label><input type="radio" name="gender" value="m" checked /> 
                </p>
                <p>
                <label class="gender">Female</label><input type="radio" name="gender" value="f" />
             </p>
             </div> 
            
           
            
            <div class="fieldgroup">
                <label for="usertype"><?php echo $lang->USERTYPE;?></label>
                 <p>
                <label>Student</label><input type="radio" name="usertype" value="student" checked /> 
                </p>
                <p>
                <label class="gender">Teacher</label><input type="radio" name="usertype" value="teacher" />
             </p>
             </div> 
             
             <div class="fieldgroup">
                <label for="date"><?php echo $lang->BIRTHDATE;?></label>
               <input type="text" id="datepicker23" name="date" readonly="readonly">
            </div>
             
             
            <div class="fieldgroup" >
       
							<img id="captcha" src="libraries/securimage/securimage_show.php"
								alt="CAPTCHA Image" width="300px"/> <br> <input type="text"
								name="captcha_code" id="captcha_code" size="10" maxlength="6"
								/> <a
								href="#"
								onclick="document.getElementById('captcha').src = 
									'libraries/securimage/securimage_show.php?' + Math.random(); 
								return false">[<?php echo $lang->DIFFIMG;?>]</a>
						
						</div>
				
            <div class="fieldgroup">
                <input type="submit" value="<?php echo $lang->REGISTER;?>" class="submit">
            </div>

        </fieldset>
    </div>

        <div class="fieldgroup">
            <p><?php echo $lang->ALREADYREGISTERED;?> <a href="index.php"><?php echo $lang->SIGNIN;?></a>.</p>
        </div>
</form>
	</div>
	</div>
	<div id="footer1"></div>
	</body>
	
</html>
