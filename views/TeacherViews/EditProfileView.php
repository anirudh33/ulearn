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
			<?php print_r($data); ?>
				<form action="" class="register">
					<h1>Edit Profile</h1>
					
					<fieldset class="row2">
						<legend>Personal Details </legend>
						<p>
							<label>First Name * </label> <input type="text" class="long" 
							value=<?php echo $data[0]['firstname']?>>
						</p>
						<p>
							<label>Last Name * </label> <input type="text" class="long" 
							value=<?php echo $data[0]['lastname']?>>
						</p>
						<p>
							<label>Phone * </label> <input type="text" maxlength="10" 
							value=<?php echo $data[0]['phone']?>>
						</p>

						<p>
							<label>Address * </label> <input type="text" class="long" 
							value=<?php echo $data[0]['address']?>>
						</p>

				
						<p>
							<label>Qualification </label> <input type="text" class="long" 
							value=<?php echo $data[0]['qualification']?>>
						</p>

					</fieldset>
					<fieldset class="row3">
						<legend>Further Information </legend>
						<p>
							<label>Gender *</label> <input type="radio" value="radio" /> <label
								class="gender">Male</label> <input type="radio" value="radio" />
							<label class="gender">Female</label>
						</p>
						<p>
							<label>Birthdate * </label> <select class="date">
								<option value="1">01</option>
								<option value="2">02</option>
								<option value="3">03</option>
								<option value="4">04</option>
								<option value="5">05</option>
								<option value="6">06</option>
								<option value="7">07</option>
								<option value="8">08</option>
								<option value="9">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select> <select>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select> <input class="year" type="text" size="4" maxlength="4" />e.g
							1976
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

	</div>

	<div id="footer1"></div>


</body>
</html>



































