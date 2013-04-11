<?php 
/* Creation Log

File Name                   -  ShowMessagesView.php
Description                 -  Shows messages sent to teacher by student
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  Anirudh Pandita	April 04, 2013		Clean up and 
														header separation
* ************************************************************************

* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		 Kawaljeet Singh	April 10, 2013		Message
header separation
* ************************************************************************
*/
?>

<div id="registerdiv">
	<h1>Show Message</h1>
	<fieldset class="row2">
		<legend>Message Details </legend>'
		<table id="tt" cellspacing="20px" cellpadding ="5px">
			<tr>
				
				<th>MessageID</th>
				<th>Subject</th>
				<th>Status(0 -UNREAD / 1 -READ)</th>
				<th>Sent From</th>
				<th>View</th>
				
			</tr>
			<?php

		foreach ( $data as $key => $value ) {
							
						?>
			<tr>
		
				
	<td><?php echo $value["message_id"]?></td>
<td><?php echo $value["subject"] ?></a></td>
<td><?php echo $value["status"] ?></a></td>							
	<?php foreach ( $result2 as $key2 => $value2 ) {
 	foreach ( $value2 as $key3 => $value3 ) {?>

		<td><?php echo $value3?></td>
						<?php
							}}
							?>
<td><a href="index.php?method=subjectClick&controller=Teacher&msgid=
<?php echo $value["message_id"] ?>&sub=<?php echo $value["subject"]?>&stat=<?php echo $value["status"]?>">
VIEW</a></td>
					   	</tr><?php
						}
						?>
						
						</table>

	</fieldset>

</div>