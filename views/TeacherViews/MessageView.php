<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
// session_start();
require_once $_SESSION ["SITE_PATH"] . '/libraries/Language.php';
$lang = Language::getinstance ();

?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> <?php echo $lang->TITLE;  ?></title>
<!-- Links for stylesheet -->
<link rel="stylesheet" href="assets/style/Registration.css"
	type="text/css" media="screen" />





</head>

<body>

	<div id="cc" width="5px" height="150px" align="center">




		<div id="registerdiv">

			<form action="index.php?method=writeMessage&controller=Teacher"
				method="POST" class="register">

				<h1>Write Message</h1>

				<fieldset class="row2">
					<legend>Message Details </legend>


					<p>
						<label>To * </label> <select name="sentto">
                            <?php
																												
																												foreach ( $messages as $key => $value ) {
																													
																													?>
                            
                            <option
								value="<?php echo $value["email"];?>"> 
                            <?php echo $value["email"];?> </option>

                            <?php
																												}
																												?>
                           </select>




					</p>

					<p>
						<label>Subject * </label> <input type="text" name="subject"
							class="long">
					</p>
					<p>
						<label>Message * </label>
						<textarea name="body" rows="6" cols="20" class="long"></textarea>
					</p>



					<button class="button">Send &raquo;</button>

				</fieldset>
			</form>
		</div>
	</div>

</body>
</html>

































