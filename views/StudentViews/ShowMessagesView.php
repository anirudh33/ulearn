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
* * **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  kawaljeet Singh	April 04, 2013		Message
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
				<th>Status(READ / UNREAD)</th>
				<th>Sent From</th>
				<th>View Messages </th>
				
				
			</tr>
			<?php

		foreach ( $data as $key => $value ) {
							
						?>
			<tr>
		
				
	<td><?php echo $value["message_id"]?></td>
<td><?php echo $value["subject"] ?></a></td>

<td><?php
if($value["status"]=='0'){
echo "UNREAD";
}else { echo "READ";
}
?></a></td>
							
	<?php foreach ( $data1 as $key2 => $value2 ) {
 	foreach ( $value2 as $key3 => $value3 ) 
			{
			
				?>
			

		<td><?php echo $value3?></td>
						<?php
							}
	}
							?>
							<td>
<a href="index.php?method=subjectClick&controller=Student&msgid=
<?php echo $value["message_id"]?>&stat=<?php echo $value["status"]?>">View</a>
</td>
					   	</tr><?php
						}
						?>
						
						</table>

	</fieldset>

</div>




















