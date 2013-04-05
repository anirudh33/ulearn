<?php 
/* Creation Log

File Name                   -  WriteMessageView.php
Description                 -  Write message to student
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
<link rel="stylesheet" href="assets/style/writemessage.css"
	type="text/css" media="screen" />
<script type="text/javascript" src="./assets/js/Validation.js"></script>
<div id="registerdiv">

	<form id="writeform"
		action="index.php?method=writeMessage&controller=Teacher"
		method="POST" class="register" novalidate="novalidate">

		<h1>Write Message</h1>


		<legend>Message Details </legend>


		<p>
			<label>To * </label> <select name="sentto">
                            <?php
																												foreach ( $data as $key => $value ) {
																													
																													?>
                            
                            <option
					value="<?php echo $value["email"];?>"> 
                            <?php echo $value["email"];?> </option>

                            <?php
																												}
																												?>
                           </select>




		</p>

		<p>
			<label>Subject * </label> <input type="text" name="subject"
				class="long">
		</p>
		<p>
			<label>Message * </label>
			<textarea name="body" rows="20" cols="50" class="long"></textarea>
		</p>


		<button class="button">Send &raquo;</button>

	</form>
</div>
