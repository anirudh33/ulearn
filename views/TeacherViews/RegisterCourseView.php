<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> <?php echo $lang->TITLE;  ?></title>
<!-- Links for stylesheet -->
<link rel="stylesheet" href="assets/style/Views.css"
	type="text/css" media="screen" />

</head>

<body>

	<div id="cc" width="5px" height="150px" align="center">




		<div id="registerdiv">

			<form id="form" 
				action="index.php?method=registerCourseButtonClick&controller=Teacher"
				method="POST" class="register">

				<h1>Register Course</h1>

				<fieldset class="row2">
					<legend>Course Details </legend>
					<p>
						<label>Course Name </label> <select name="coursenamelist">
							 <?php
								
								foreach ( $data as $key => $value ) {
									
									?>
                            
                            <option
								value="<?php echo $value["coursename"];?>"> 
                            <?php echo $value["coursename"];?> </option>

                            <?php
								}
								?>
                           </select> </br>


					</p>



					</br> </br>
					<button class="button">Register &raquo;</button>

				</fieldset>




			</form>
		</div>







	</div>




</body>
</html>


































