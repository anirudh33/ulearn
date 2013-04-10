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
							value="<?php echo  $lang->LOGIN; ?>" class="bt_login" /> 
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
				<li id="toggle"><a id="open" class="open" href="#"><blink><?php echo $lang-> LOGINREGISTER;?></blink></a>
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
			 <img alt="" src="assets/images/Views/upper4.png"
				style="float: left; padding: 50px; width: 600px;height:150px;">
		</div>
		<div id="header2">
		
		

</div>
 	<div id="errors">
	
		<?php 
	/*	
if (isset($_REQUEST["msg"])) {
    $message = $_REQUEST["msg"];
    echo $message;
    
    
}*/
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
							  <img alt="" src="assets/images/Views/images67.jpeg" height=500px width=500px>
							  <h1 id="homeheading">Ulearn </h1>
							<div class="meta">The <span>Educational World</span> you can <span>explore</span></div>
							
							<h2 id="homecontent">
							<p>eLearning is a new tool which has the potential to enhance and support the<br> 								   traditional learning system and already it is becoming an integral part of the 								   learning tools used by every educational organization.</p>	
							<p>The learning process needs techniques and tools to present the knowledge (from 								   different resources), interact with it and share it with others. In this context, 								   eLearning is becoming an important tool to support the learning system to achieve 								   its goals. eLearning became hot topic in the 1990's after the spread of the   								   Internet. Although it has a relative short history, it is becoming an important 								   part of the learning. The majority of the universities adopted some kinds of 							  eLearning within its learning system.</p>

							</h2>
					
								
						</div>
						  <div id="tab2" class="tab_content">
							  <img alt="" src="assets/images/Views/we.jpeg" height=500px width=500px>
							  <h1 id="homeheading">What we Offer..</h1>
							<div class="meta">The <span>Services</span> we offer <span> to you </span></div>
							
							<h2 id="homecontent">
							<p>We provide a platform where the teachers and the students can share their exposure 								   of knowledge without any communication gap.. </p>	
							<p>The Ulearn is an e-learning system where teachers can upload their study material 								   and share their views on a particular topic and students sitting any part of the 								   world can download the same and increase their knowledge on a specific genre.The 								  Ulearn enables the users to explore their potential and capablities to enhance their 								  skills and expertise on a particular topic crossing the bars of the class room 								  teaching</p>

							</h2>
						</div>
						<div id="tab4" class="tab_content">
							<img alt="" src="assets/images/img/birdy.jpg" align="right" width=400px>
							
								
							
								
							<form id="mailform" method="POST" name="contactform" 			
								action="index.php?method=sendmail&controller=Main"> 
<fieldset>
<legend><img alt="" src="assets/images/img/contact_me.png"></legend>
							<label  style="color:black;font-weight:bold" for='name'><?php echo  $lang->YOURNAME; ?></label> </br></br>
							<input type="text" name="name" id="name">
							</br>
							<p>
							<label style="color:black;font-weight:bold" for='email'><?php echo  $lang->EMAILADDRESS; ?></label> </br></br>
							<input type="text" id="email" name="email"> </br></br>
							</p>
							<p>
							<label style="color:black;font-weight:bold" for='message'><?php echo $lang->MESSAGE; ?></label> </br></br>
							<textarea id="message" name="message"></textarea></br></br>
							</p>
							<input type="submit" value="Submit"></br></br>
							
</fieldset>
							</form>
							</center>

																
							
							


						</div>

							<div id="tab5" class="tab_content">
							<img alt="" src="assets/images/Views/tab1_image.jpg">
							 <h1 id="homeheading">The Courses ..</h1>
							<div class="meta">The <span>Courses</span> Ulearn offer <span> to you </span></div>
							
							<h2 id="homecontent">
							<p>The teachers sitting in any part of the world can upload theri study material 									related to any subject or topic and students can download them.. </p>	
							<p>This platform is open for any courses a particular teacher wana teach and provide 								  study material for the same.They only need to register the respective course and add 								  study lessons underneath that particular course and students can choose that course 								  depending on their choice and download the study material for that course</p>

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
