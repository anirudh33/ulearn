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
<h1 id="viewfiles">VIEW FILES</h1>
	<form id="downloadform" method="post" action="index.php?method=downloadFile&controller=Student"	
	enctype="multipart/form-data" name="frm1" />
	<fieldset class="row2">
		<legend>cONTENT Details </legend>
		<p>
			<label>Teacher </label> 
			<select name="teachernamelist">
                            <?php
                            foreach ( $data1 as $key => $value ) {?>
                            	     <option value="<?php echo $value["email"];?>"> 
                            <?php echo $value["email"];?> </option>
                            <?php } ?>
            </select>
		</p>
		<p>
			<label>Course </label> 
			<select name="coursenamelist">
							 <?php
							foreach ( $data as $key1 => $value1 ) {?>
                                        <option	value="<?php echo $value1["coursename"];?>"> 
                             <?php echo $value1["coursename"];?> </option>
                             <?php } ?>
            </select> 
		</p>
		<br/>
		<button class="button">View &raquo;</button>
	</fieldset>
	</form>
</div>