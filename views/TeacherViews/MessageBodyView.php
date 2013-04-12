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
* * **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  kawaljeet Singh	April 04, 2013		Message status updated
* *************************************************************************/
?>

<div id="messageBodyContent">
<div id="messageBodySubject">
Subject:

<?php  print_r($data[0]["subject"])."<br/>";?>


</div>
<div id="messageBodySent">
Sent From: <?php  print_r($result2[0]["email"])."<br/>";?>
</div>


  <div id="mess">
  MESSAGE: 
        <h2><br><?php  print_r($data[0]["body"])."<br/>";?></h2>
       
    </div>
</div>
</body>
</html>