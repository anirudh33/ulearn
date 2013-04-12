<?php 
/* Creation Log

File Name                   -  UploadView.php
Description                 -  Displays all files uploaded by teacher in chosen course
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  April 2, 2013
* **************************** Update Log ********************************
*/
?>
<div id="registerdiv">
	<form id="uploadform" method="post"
		action="index.php?method=uploadFile&controller=Teacher"
		class="register" enctype="multipart/form-data" novalidate="novalidate">
		<h1 id="uploadcontentheading"><?php echo $lang->UPLOADCONTENT;?></h1>
		<p>
			<label><?php echo $lang->LESSONNO;?>:*</label> <input type="text"
				id="lesson_no" name="lesson_no" class="long"
				onfocus="if(this.value === 'Lesson no required') this.value = '';">
			<br>
		</p>
		<p>
			<label><?php echo $lang->LESSONNAME;?>:*</label> <input type="text"
				id="lesson_name" name="lesson_name" class="long"
				onfocus="if(this.value === 'Lesson name required') this.value = '';"><br>
		</p>
		<p>
			<label><?php echo $lang->SELECTCOURSE;?> </label> <select
				name="coursenamelist" class="long">
                            <?php																											foreach ( $data as $key => $value ) {
																												?>                            
                            <option
					value="<?php echo $value["coursename"];?>"> 
                            <?php echo $value["coursename"];?> </option>
                            <?php																											}
																												?>
                           </select> <br />
		</p>
		<p>
			<label><?php echo $lang->CHOOSEFILE;?>* </label><input type="file"
				name="upload[]" class="long" /><br />
		</p>
		<p>
			<input type="submit" id="button" value="OK" class="button" />
		</p>
		<!-- <input type="button" value="add more" onclick="show()"/> -->
	</form>
</div>