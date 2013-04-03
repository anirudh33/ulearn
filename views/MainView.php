<?php
/* Creation Log

File Name                   -  MainView.php
Description                 -  HomePage
Version                     -  1.0
Created by                  -  Kawaljeet Singh
Created on                  -  March 01, 2013
* **************************** Update Log ********************************
Sr.NO.        Version        Updated by           Updated on          Description
-------------------------------------------------------------------------
1            1.0            Anirudh Pandita     March 08, 2013      test language changes
2            1.0            Ujjwal Rawlley     March 09, 2013      	included constants from language file
* ************************************************************************
*/

$lang = Language::getinstance();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title> <?php if(isset($lang->TITLE)){echo $lang->TITLE;} else {echo "Welcome to ulearn";} ?></title>

<!-- Links for stylesheet -->

<link rel="stylesheet" href="assets/style/MainViewStyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="assets/style/Slide.css" 		 type="text/css" media="screen" />
<link rel="stylesheet" href="assets/style/MainView.css" 	 type="text/css" media="screen" />
<!-- <link rel="stylesheet" href="assets/style/curtains.css" 	 type="text/css" media="screen" /> -->
	
<!-- jquery source -->
<!-- <script	src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>	 -->
<!-- <script src="assets/js/jquery/jquery.js" type="text/javascript"></script> -->
<!-- <script src="assets/js/jquery/jquery.easing.1.3.js"	type="text/javascript"></script> -->

<!-- Other javascript source  -->
<script src="assets/js/MainViewSlide.js" type="text/javascript"></script>
<script src="assets/js/MainView.js" type="text/javascript"></script>


<style>
#header3 {
	font-size: 20px;
	color: green;
	background-color: white;
}
</style>

</head>

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
						<label class="grey" for="fieldEmail"><?php echo $lang->USERNAME;?></label>
						<input class="field" type="text" name="fieldEmail" id="log"
							value="" size="23" /> <label class="grey" for="pwd"><?php echo $lang-> PASSWORD;?></label>
						<input class="field" type="password" name="fieldPassword" id="pwd"
							size="23" /> <label><input name="rememberme" id="rememberme"
							type="checkbox" checked="checked" value="forever" /> &nbsp;<?php echo $lang->REMEMBERME?></label>
						<div class="clear"></div>
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
						<li><a href="#tab1"><?php echo $lang->HOME;?></a></li>
						<li><a href="#tab2"><?php echo $lang->ABOUTUS;?></a></li>
						<li><a href="#tab3"><?php echo $lang->RESOURCES;?></a></li>
						<li><a href="#tab4"><?php echo $lang-> CONTACT;?></a></li>
						<li><a href="#tab4"><?php echo $lang-> COURSES;?></a></li>
					</ul>
					
					<div class="tab_container">
						<div id="tab1" class="tab_content">
							<img alt="" src="assets/images/img/tab1_image.jpg">
							<h2>
								<p>
									Thank you for your interest in <b>Ulearn</b> and elearning!
								</p>

								In March 2013, we acquired Ulearn, bringing together elearning
								leaders to offer customers one of the world's most comprehensive
								content collections. Skillsoft can now offer even more targeted
								learning assets covering key business issues such as leadership
								development, IT certification and performance support,
								compliance, performance management, and more. In addition, the
								combined company offers unparalleled service—our customers
								benefit from our decades of experience in the learning space.
								We're proud of our ability to help clients use learning to solve
								their critical business problems and deliver a measurable impact
								on business results. E-learning refers to the use of various
								kinds of electronic media and information and communication
								technologies (ICT) in education. E-learning is an inclusive
								terminology for all forms of educational technology that
								electronically or technologically support learning and teaching,
								and may, depending on an emphasis on a particular aspect or
								component or delivery method, sometimes be termed
								technology-enhanced learning (TEL), computer-based training
								(CBT), internet-based training (IBT), web-based training (WBT),
								virtual education, or digital educational collaboration.

								E-learning includes numerous types of media that deliver text,
								audio, images, animation, and streaming video and includes
								technology applications and processes such as audio or video
								tape, satellite TV, CD-ROM, and computer-based learning, as well
								as local intranet/extranet and web-based learning. Information
								and communication systems, whether free-standing or based on
								either local networks or the Internet in networked learning,
								underly many e-learning processes. [1]
						
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
						<div id="tab3" class="tab_content">
							<img alt="" src="assets/images/Views/tab1_image.jpg"> Lorem ipsum
							dolor sit amet, consectetur adipiscing elit. Nam bibendum nibh
							enim. Aenean pharetra fermentum dui nec interdum. Nam volutpat,
							odio a faucibus mattis, nunc ligula varius erat, non imperdiet
							diam eros sit amet orci. Donec eu consequat velit. Maecenas urna
							enim, molestie eu egestas convallis, gravida malesuada orci.
							Aliquam at elit massa, sit amet interdum tortor. Morbi nibh
							lectus, rhoncus nec ullamcorper sit amet, dictum et neque. Nulla
							accumsan elementum erat id ornare. Aenean dictum, odio at
							porttitor eleifend, arcu urna faucibus neque, at commodo tortor
							felis vel leo. Suspendisse potenti. Ut euismod blandit vulputate.
							Aliquam nec dolor nisl. Aliquam porttitor libero sed enim
							consectetur venenatis. Lorem ipsum dolor sit amet, consectetur
							adipiscing elit. Curabitur nulla ligula, interdum ac molestie
							vitae, imperdiet in orci. Donec id ullamcorper lacus.

						</div>
						<div id="tab4" class="tab_content">
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
