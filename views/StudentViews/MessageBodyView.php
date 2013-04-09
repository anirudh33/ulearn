<?php 
/* Creation Log

File Name                   -  MessageBodyView.php
Description                 -  Displays the message body
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  April 2, 2013
* **************************** Update Log ********************************
Sr.NO.        Version        Updated by           Updated on          Description
-------------------------------------------------------------------------
1			 1.1			Anirudh pandita		April 04, 2013		Clean up 
* ************************************************************************
*/
?>
<html>
<head>
<script src="./assets/js/fancybox/jquery.erasing-1.3.4.js"></script>
<script src="./assets/js/fancybox/jquery12.js"></script>
<script src="./assets/js/fancybox/jquery.erasing-1.3.pack.js"></script>
<script src="./assets/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<script src="./assets/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<link rel="stylesheet" href="./assets/style/jquery.fancybox-1.3.4.css" type="text/css"

	media="screen">
<script type="text/javascript">

$(document).ready(function(){
	 
	
$("#abcd").fancybox({
            //   'width'            : screenW/2,
           //   'height'        : screenH-210,
           //     'autoScale'        : false,
           //     'transitionIn'        : 'none',
            //   'transitionOut'        : 'none',
            //   'type'            : 'iframe'
            });



});

</script>
</head>
<body>



<p><a id="abcd" href="#image-uploader">Click to see message 4 u</a></p>

<div class="hidden">
    <div id="image-uploader">
        <h2><?php  print_r($data[0]["body"])."<br/>";?></h2>
    </div>
</div>

</body>
</html>
