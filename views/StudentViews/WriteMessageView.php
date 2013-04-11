<?php 
/* Creation Log

File Name                   -  WriteMessageView.php
Description                 -  Write message to teacher
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  Anirudh Pandita	April 04, 2013		Clean up and 
														header separation
* ************************************************************************
*/
?>

<script type="text/javascript" src="./assets/js/Validation.js"></script>
<div id="registerdiv">
	
	<form id="writeform"
		action="index.php?method=writeMessage&controller=Student"
		method="POST" class="register" novalidate="novalidate">
<h1 id="writemessage"><?php echo $lang->WRITE;?></h1>
		<legend><?php echo $lang->MESSAGEDETAILS;?></legend>


		<p>
			<label><?php echo $lang->TO;?> </label> <select name="sentto" id="sentto" style="width: 250px;">
                            <?php
                            foreach ( $data as $key => $value ) {?>                           
                            <option	value="<?php echo $value["email"];?>"> 
                            <?php echo $value["email"];?> </option>
                            <?php }	?>
                           </select>

		</p>

		<p>
			<label><?php echo $lang->SUBJECT;?>* </label> <input type="text" name="subject"
				class="long">
		</p>
		<p>
			<label><?php echo $lang->MESSAGE;?>*  </label>
			<textarea name="body" rows="20" cols="50" class="long"></textarea>
		</p>


		<button class="button">Send &raquo;</button>

	</form>
</div>
