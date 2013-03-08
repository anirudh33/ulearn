<?php
// session_start();
require_once $_SESSION ["SITE_PATH"] . '/libraries/Language.php';
$lang = Language::getinstance ();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $lang->HELLOADMINISTRATOR?> </title>


<link rel="stylesheet" href="assets/style/MainViewStyle.css"
	type="text/css" media="screen" />
<link rel="stylesheet" href="assets/style/Slide.css" type="text/css"
	media="screen" />
<link rel="stylesheet" href="assets/style/MainView.css" type="text/css"
	media="screen" />
<script src="assets/js/jquery/jquery.js" type="text/javascript"></script>
<script src="assets/js/AdminViewSlide.js" type="text/javascript"></script>


<style>
</style>
</head>

<body>
	<!-- Panel -->
	<div id="toppanel">
		<div id="panel">
			<div class="content clearfix">
				<div class="left">
					<h1><?php echo $lang->HELLOADMINISTRATOR?></h1>

					<h2>
						<p class="grey"><?php echo $lang->CHOOSEWORK?></p>
					</h2>

				</div>

				<div class="left">
					<!-- Login Form -->

					<h1><?php echo $lang->CATEGORIES?></h1>
					<a href=""><?php echo $lang->MANAGETEACHER?></a></br>
					</br> <a href=""><?php echo $lang->MANAGESTUDENT?></a></br>
					</br> <a href=""><?php echo $lang->VIEWEDITPROFILE?></a></br>
					</br> <a href=""><?php echo $lang->REPORT?></a></br>


					<div class="clear"></div>




				</div>

				<div class="left right">
					<!-- Register Form -->

					<h1><?php echo $lang->TITLE ?></h1>
					</br>

					<h3>"<?php echo $lang->QUOTE?>"</h3>
					<a href="index.php?method=logout" class="bt_login" > <?php echo $lang->LOGOUT;?></a>	

					</form>

				</div>

			</div>

		</div>



		<!-- The tab on top -->
		<div class="tab">
			<ul class="login">
				<li class="left">&nbsp;</li>
				<li><?php echo $lang-> HELLOADMINISTRATOR?></li>
				<li class="sep">|</li>
				<li id="toggle"><a id="open" class="open" href="#"><blink><?php echo $lang->OPENPANEL?></blink></a>
					<a id="close" style="display: none;" class="close" href="#"><blink><?php echo $lang->CLOSEPANEL?></blink></a>
				</li>
				<li class="right">&nbsp;</li>
			</ul>
		</div>
		<!-- / top -->

	</div>
	<!--panel -->






	<div id="cc">

		<div id="header">

			<img alt="" src="../../assets/images/Views/ulearn.gif"
				style="float: right; padding: 50px; width: 280px;">

		</div>




		<div id="image"></div>
		<div id="admincontent">
			<h1><?php echo $lang->WELCOMEADMINISTRATOR?></h1>
		</div>




	</div>










</body>








</html>
