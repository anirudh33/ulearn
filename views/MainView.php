<?php
/* Creation Log

File Name                   -  MainView.php
Description                 -  HomePage
Version                     -  1.0
Created by                  -  Kawaljeet Singh
Created on                  -  March 01, 2013
* **************************** Update Log ********************************
Sr.NO.  Version   Updated by        Updated on          Description
-------------------------------------------------------------------------
1       1.0       Anirudh Pandita   March 08, 2013      Test language changes
2       1.0       Ujjwal Rawlley    March 09, 2013      Included constants from language file
3	1.1	  Anirudh Pandita   April 04, 2013	Clean up and header separation
4	1.2	  Ujjwal Rawlley    April 04, 2013	Main View Tabs modification with some functionality added
* ************************************************************************
*/
$pageName="MainView";
require_once ($_SESSION['SITE_PATH'] . '/views/Header.php');
?>


<body>

	<!-- Panel -->	
	
	<div id="toppanel"> 
	
		<div id="panel">
		
			<div class="content clearfix">

				<div class="left">
					<h1><?php echo $lang->TITLE; ?></h1>


				</div>

				<div class="left">
					<!-- Login Form -->
					<form class="clearfix"
						action="index.php?method=initiateLogin&controller=Main"
						method="post" id="register-form">
						<h1><?php echo $lang->MEMBERLOGIN?></h1>
						<label class="grey" for="fieldEmail">
						<?php echo $lang->USERNAME;?>
						</label>
						<input class="field" type="text" name="fieldEmail" id="log"
							value="" size="23" /> 
						<label class="grey" for="pwd">
						<?php echo $lang-> PASSWORD;?>
						</label>
						<input class="field" type="password" name="fieldPassword" id="pwd"
							size="23" /> 
						<label>
						<input name="rememberme" id="rememberme"
							type="checkbox" checked="checked" value="forever" /> 
							&nbsp;<?php echo $lang->REMEMBERME?>
						</label>
						<div class="clear">
						
						</div>
						<input type="submit" id="submit" name="submit"
							value="<?php echo  $lang->LOGIN; ?>" class="bt_login" /> <a
							class="lost-pwd" href="#"><?php echo $lang->LOSTPASSWORD;?></a>
					</form>
				</div>

				<!-- Login Form -->

				<div class="left right">
					<!-- Register Form -->
					<form action="index.php?method=registerClick&controller=Main"
						method="post">
						<h1><?php echo $lang->NOTAMEMBERYETSIGNUP;?></h1>
						<input type="submit" name="submit"
							value="<?php echo $lang-> REGISTER;?>" class="bt_register" />
					</form>
				</div>
			</div>
		</div>
		<!-- /login -->

		<div class="tab">
			<ul class="login">
				<li class="left">&nbsp;</li>
				<li><?php echo $lang-> HELLOGUEST;?></li>
				<li class="sep">|</li>
				<li id="toggle"><a id="open" class="open" href="#"><?php echo $lang-> LOGINREGISTER;?></a>
					<a id="close" style="display: none;" class="close" href="#"><?php echo $lang-> CLOSEPANEL;?></a>
				</li>
				<li class="right">&nbsp;</li>
			</ul>
		</div>
		<!-- / top -->
	</div>
	<!--panel -->

	<div id="cc">
		<div id="langdiv">
			<!-- to set the language-->
			<div id="lang">

				<h3>
					<a
						href="index.php?method=setLanguageClick&controller=Main&language=EN"><?php echo $lang-> ENGLISH;?></a>
				</h3>
				<h3>
					<a
						href="index.php?method=setLanguageClick&controller=Main&language=HINDI"><?php echo $lang-> HINDI;?></a>
				</h3>
	</div>
		</div>
		
		<div id="header">
			<img alt="" src="assets/images/Views/ulearn.gif"
				style="float: left; padding: 50px; width: 280px;">
		</div>
		<div id="header2">
		
		

</div>
	<div id="header3">
	
		<?php 
if (isset($_REQUEST["msg"])) {
    $message = $_REQUEST["msg"];
    echo $message;
    
    
}
?>
		
		</div>
		<div id="image">
			<div id="content">
				<div class="container">

					<ul class="tabs">
						<li class="green"><a href="#tab1"><?php echo $lang->HOME;?></a></li>
						<li class="yellow"><a href="#tab2"><?php echo $lang->ABOUTUS;?></a></li>
						
						<li class="red"><a href="#tab4"><?php echo $lang-> CONTACT;?></a></li>
						<li class="pink"><a href="#tab5"><?php echo $lang-> COURSES;?></a></li>
					</ul>
					
					<div  class="tab_container">
					

							  <div id="tab1" class="tab_content">
						</div>
						<div id="tab2" class="tab_content">
							<img alt="" src="assets/images/Views/tab1_image.jpg">
							<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
								bibendum nibh enim. Aenean pharetra fermentum dui nec interdum.
								Nam volutpat, odio a faucibus mattis, nunc ligula varius erat,
								non imperdiet diam eros sit amet orci. Donec eu consequat velit.
								Maecenas urna enim, molestie eu egestas convallis, gravida
								malesuada orci. Aliquam at elit massa, sit amet interdum tortor.
								Morbi nibh lectus, rhoncus nec ullamcorper sit amet, dictum et
								neque. Nulla accumsan elementum erat id ornare. Aenean dictum,
								odio at porttitor eleifend, arcu urna faucibus neque, at commodo
								tortor felis vel leo. Suspendisse potenti. Ut euismod blandit
								vulputate. Aliquam nec dolor nisl. Aliquam porttitor libero sed
								enim consectetur venenatis. Lorem ipsum dolor sit amet,
								consectetur adipiscing elit. Curabitur nulla ligula, interdum ac
								molestie vitae, imperdiet in orci. Donec id ullamcorper lacus.</h2>
						</div>
						
						<div id="tab4" class="tab_content">
							<img alt="" src="assets/images/img/birdy.jpg" align="right" width=400px>
							
								
							
								
							<form id="mailform" method="POST" name="contactform" 			
								action="index.php?method=sendmail&controller=Main"> 
<fieldset>
<legend><img alt="" src="assets/images/img/contact_me.png"></legend>
							<label  style="color:black;font-weight:bold" for='name'>Your Name:</label> </br></br>
							<input type="text" name="name" id="name">
							</br>
							<p>
							<label style="color:black;font-weight:bold" for='email'>Email Address:</label> </br></br>
							<input type="text" id="email" name="email"> </br></br>
							</p>
							<p>
							<label style="color:black;font-weight:bold" for='message'>Message:</label> </br></br>
							<textarea id="message" name="message"></textarea></br></br>
							</p>
							<input type="submit" value="Submit"></br></br>
							
</fieldset>
							</form>
							</center>

																
							
							


						</div>

							<div id="tab5" class="tab_content">
							<img alt="" src="assets/images/Views/tab1_image.jpg">
							<h2>
								<ul>
									<li>Anirudh</li>
									<li>Kawaljeet</li>
									<li>Ujjwal</li>
									<li>Tanu</li>
								</ul>
							</h2>
						</div>
					</div>
	
				</div>
			</div>

		</div>

	</div>



	<div id="footer1"></div>


</body>
</html>
