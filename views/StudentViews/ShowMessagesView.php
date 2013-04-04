<?php 
/* Creation Log

File Name                   -  ShowMessagesView.php
Description                 -  Show messages sent to student from teacher
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
	<h1>Show Message</h1>
	<fieldset class="row2">
		<legend>Message Details </legend>
		<table id="tt" cellspacing="20px" cellpadding ="5px">
			<tr>
				<th>Body</th>
				<th>Subject</th>
				<th>Sent From</th>
			</tr>
						<?php
						foreach ( $data as $key => $value ) {
							?><tr><?php
							foreach ( $value as $key1 => $value1 ) {
								?>
					   	<td><?php echo $value1?></td>
					   	<?php
							}
							?></tr><?php
						}
						?>
						
						</table>

	</fieldset>

</div>
