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

<div id="registerdiv">
	<h1>Write Message</h1>
	<form id="form"
		action="index.php?method=writeMessage&controller=Student"
		method="POST" class="register">

		<legend>Message Details </legend>


		<p>
			<label>To </label> <select name="sentto" id="sentto">
                            <?php
                            foreach ( $data as $key => $value ) {?>                           
                            <option	value="<?php echo $value["email"];?>"> 
                            <?php echo $value["email"];?> </option>
                            <?php }	?>
                           </select>

		</p>

		<p>
			<label>Subject </label> <input type="text" name="subject"
				class="long">
		</p>
		<p>
			<label>Message </label>
			<textarea name="body" rows="20" cols="50" class="long"></textarea>
		</p>


		<button class="button">Send &raquo;</button>

	</form>
</div>