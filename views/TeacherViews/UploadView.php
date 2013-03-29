<html>
<head>
<style type="text/css"> </style>
<script type="text/javascript" src="ulearn\branches\development\assets\js\jquery\jquery.js"></script>
<script type="text/javascript">
function show() {
 $("#more").append('<label>Choose file:</label><input type="file" name="upload[]"/><br/>');
$("#more").append('<label>Lesson No:</label><input type="text" name="lesson_no" class="long" ></br>');
$("#more").append('<label>Lesson Name:</label><input type="text" name="lesson_name" class="long" ></br>');
}
</script>
</head>
<body>
<form method="post" action="index.php?method=uploadFile&controller=Teacher" enctype="multipart/form-data" name="frm1" > 
Lesson No: <input type="text" name="lesson_no" class="long" ><br>
Lesson Name: <input type="text" name="lesson_name" class="long" ><br>
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


Choose file: <input type="file" name="upload[]"/></br>
 <input type="submit" value="OK"/> 
<input type="button" value="add more" onclick="show()"/>
<div id="more"></div>
</form>
</body>
</html>