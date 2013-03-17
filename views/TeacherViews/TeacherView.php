<?php
// session_start();
require_once $_SESSION ["SITE_PATH"] . '/libraries/Language.php';
$lang = Language::getinstance ();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $lang->HELLOTEACHER?> </title>


<link rel="stylesheet" href="assets/style/AdminView.css" type="text/css"
	media="screen" />

<style>
</style>
</head>

<body>

	<div id="cc">

		<div id="header">

			<img alt="" src="../../assets/images/Views/ulearn.gif"
				style="float: right; padding: 50px; width: 280px;">

		</div>




		<div id="image">

			<div id="admincontent">
				<h1><?php echo $lang->WELCOMETEACHER?></h1>
			</div>


			<div id="functionpanel">

				<div class="arrowgreen">
					<ul>
						<li><a href="http://www.dynamicdrive.com" title="Home">Home</a></li>
						<li><a href="http://www.dynamicdrive.com/style/" class="selected"
							title="CSS">Write Message</a></li>
						<li><a href="http://www.ddwhois.com" title="Whois">View Message</a></li>
						<li><a href="http://www.dynamicdrive.com/forums/" title="Forums">Content
								Upload</a></li>
						<li><a href="http://tools.dynamicdrive.com/" title="Tools">Edit
								Profile</a></li>
						<li><a href="http://www.javascriptkit.com" title="JavaScript">Add
								Course</a></li>
					</ul>
				</div>

			</div>


		</div>




	</div>










</body>




$("button").click(function(){
$.ajax({url:"demo_test.txt",success:function(result){
$("#div1").html(result); }}); });



</html>
