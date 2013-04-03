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





</head>

<body>

	<div id="cc" width="5px" height="150px" align="center">

		  
		 

			<div id="registerdiv" >
			
				<form method="post" action="index.php?method=downloadFile&controller=Student" enctype="multipart/form-data" name="frm1" /> 
				
					<h1>VIEW CONTENT</h1>
					
					<fieldset class="row2">
						<legend>Message Details </legend>


<p>
							<label>Teacher  </label> 
							<select name="teachernamelist">
                            <?php
                           
                            foreach ($data1 as $key=>$value)
							{
							
                            ?>
                           
                           
                            <option value="<?php echo $value["firstname"];?>"> 
                            <?php echo $value["firstname"];?> </option>

                            <?php
                            }
                            ?>
                           </select> 
						

							
							
						</p>
						<p>
						
						<label>Course  </label> 
							<select name="coursenamelist">
							 <?php
							 
                            foreach ($data as $key1=>$value1)
							{
								
                            ?>
                            
                            <option value="<?php echo $value1["coursename"];?>"> 
                            <?php echo $value1["coursename"];?> </option>

                            <?php
                            }
                            ?>
                           </select> </br>
</p>
						
						<button class="button">View &raquo;</button>
					
					</fieldset>
									

		

				</form>
			</div>





	

	</div>

	


</body>
</html>


 