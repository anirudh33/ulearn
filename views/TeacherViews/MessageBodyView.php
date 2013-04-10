<?php 
/* Creation Log

File Name                   -  MessageBodyView.php
Description                 -  Displays message body
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


    <div id="registerdiv">
	<h1>Message</h1>
	<fieldset class="row2">
		<legend>Message Details </legend>
 <h2 id="msgid" >Subject:<?php echo $_REQUEST["sub"];?><br>
  Message: <br><?php  print_r($data[0]["body"])."<br/>";?></h2>
 </fieldset>
 
  </div>
        
