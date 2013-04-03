<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> <?php echo $lang->TITLE;  ?></title>
<!-- Links for stylesheet -->
<link rel="stylesheet" href="assets/style/Views.css"
	type="text/css" media="screen" />
<script src="assets/js/RegistrationView.js" type="text/javascript"></script> 	
<script type="text/javascript">
function show() {
 $("#more").append('<label>Choose file:</label><input type="file" name="upload[]"/><br/>');
$("#more").append('<label>Lesson No:</label><input type="text" name="lesson_no" class="long" onfocus="if(this.value === 'Lesson no required') this.value = '';"> ></br>');
$("#more").append('<label>Lesson Name:</label><input type="text" name="lesson_name" class="long" onfocus="if(this.value === 'Lesson name required') this.value = '';"> ></br>');
}
</script>

</head>

<body>
<div id="cc" width="5px" height="150px" align="center">

		<div id="registerdiv">

<form id="form" method="post" action="index.php?method=uploadFile&controller=Teacher" class="register"> 
<h1>Upload Content</h1>
<p>
<label>Lesson No:*</label>
<input type="text" id="lesson_no" name="lesson_no" class="long" 
onfocus="if(this.value === 'Lesson no required') this.value = '';">
<br>
</p>
<p>
<label>Lesson Name:*</label> 
<input type="text" id="lesson_name" name="lesson_name" class="long" 
onfocus="if(this.value === 'Lesson name required') this.value = '';"><br></p>
<p>
<label>Select course: </label>

<select name="coursenamelist" class="long">
                            <?php
                            
                            foreach ($data as $key=>$value)
							{
									
                            ?>
                            
                            <option value="<?php echo $value["coursename"];?>"> 
                            <?php echo $value["coursename"];?> </option>

                            <?php
                            }
                            ?>
                           </select> <br/></p>

<p>
<label>Choose file:* </label><input type="file" name="upload[]" class="long"/><br/></p>
 <p><input type="submit" id="button" value="OK" class="button"/> </p>
 <!-- <input type="button" value="add more" onclick="show()"/> -->
 </form>
</div>
</div>
<div id="more"></div>

</body>
</html>
