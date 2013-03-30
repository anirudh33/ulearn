<html>
<head>
<style type="text/css"> </style>
<script type="text/javascript" src="ulearn\branches\development\assets\js\jquery\jquery.js"></script>
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
<form method="post" action="index.php?method=uploadFile&controller=Teacher" enctype="multipart/form-data" name="frm1" > 
Lesson No:*<input type="text" id="lesson_no" name="lesson_no" class="long" onfocus="if(this.value === 'Lesson no required') this.value = '';"><br>
Lesson Name:* <input type="text" id="lesson_name" name="lesson_name" class="long" onfocus="if(this.value === 'Lesson name required') this.value = '';">><br>
Select course: 

<select name="coursenamelist">
                            <?php
                           
                            foreach ($messages as $key=>$value)
							{
								
                            ?>
                            
                            <option value="<?php echo $value["coursename"];?>"> 
                            <?php echo $value["coursename"];?> </option>

                            <?php
                            }
                            ?>
                           </select> </br>


Choose file:* <input type="file" name="upload[]"/></br>
 <input type="submit" id="button" value="OK"/> 
<input type="button" value="add more" onclick="show()"/>
<div id="more"></div>
</form>
</body>
</html>