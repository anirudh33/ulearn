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

Choose file: <input type="file" name="upload[]"/>
 <input type="submit" value="OK"/> 
<input type="button" value="add more" onclick="show()"/>
<div id="more"></div>
</form>
</body>
</html>