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
<!-- <script type="text/javascript"> -->

// $(document).ready(function() {

//     //Default Action
//     $(".tab_content").(); //Hide all content
    
//     });

// });
</script>




</head>

<body>

	<div id="cc" width="5px" height="150px" align="center">
		<b><?php
		
		echo $data;
		
		?></b>


	</div>












</body>
</html>


