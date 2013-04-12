<?php 
/* Creation Log

File Name                   -  DownloadView.php
Description                 -  Choose course and email to access content uploaded 
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.        Version        Updated by           Updated on          Description
-------------------------------------------------------------------------
1			 1.1			Anirudh pandita		April 04, 2013		Clean up 
* ************************************************************************
*/
?>
<div id="registerdiv">
	<h1><?php echo $lang->VIEWFILES;?></h1>
	<form id="downloadform" method="post"
		action="index.php?method=downloadFile&controller=Teacher"
		enctype="multipart/form-data" name="frm1" />
	<fieldset class="row2">
		<legend><?php echo $lang->FILEDETAILS;?> </legend>
		<p>
			<label><?php echo $lang->COURSEDETAILS;?> </label> <select
				name="coursenamelist">
							 <?php
								foreach ( $data as $key => $value ) {
									foreach ( $value as $Key1 => $value1 ) {
										?>								
                                        <option
					value="<?php echo $value1["coursename"];?>"> 
                             <?php echo $value1["coursename"];?> </option>
                             <?php } }?>
            </select>
		</p>
		<br />
		<button class="button"><?php echo $lang->VIEW;?> &raquo;</button>
	</fieldset>
	</form>
</div>