<html>
<head>
<style type="text/css"> </style>
<script type="text/javascript" src="ulearn\branches\development\assets\js\jquery\jquery.js"></script>
<script type="text/javascript">
function show() {
 $("#more").append('<input type="file" name="upload[]"/><br/>');
}
</script>
</head>
<body>
<form method="post" action="index.php?method=uploadFile&controller=Teacher" enctype="multipart/form-data" name="frm1" /> 
Lesson No: <input type="text" name="lesson_no" class="long" ></br>
Lesson Name: <input type="text" name="lesson_name" class="long" ></br>
Select course: <input type="text" name="course_id" class="long" ></br>
Choose file: <input type="file" name="upload[]"/></br>
 <input type="submit" value="OK"/> 
<input type="button" value="add more" onclick="show()"/>
<div id="more"></div>
</form>
</body>
</html>