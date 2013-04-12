<?php 
/* Creation Log

File Name                   -  AddCouseView.php
Description                 -  Displays all courses added by teacher
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  April 2, 2013
* **************************** Update Log ********************************

 Description                 -  Error Displays
 Version                     -  1.0
 Created by                  -  Kawaljeet Singh
 Created on                  -  April 06, 2013
*
*/
?>
<div id="registerdiv">
			<form id="addform"
				action="index.php?method=addCourseButtonClick&controller=Teacher"
				method="POST" class="register" novalidate="novalidate">
<div id="errors">

	
		<?php 
	
if (isset($_REQUEST["msg"])) {
    $message = $_REQUEST["msg"];
    echo $message;
    
    
}
?>
		</div>
				<center><h1 id="addcourseheading"><?php echo $lang->ADDCOURSE;?></h1></center>

				
					<legend><?php echo $lang->COURSEDETAILS;?> </legend><br><br><br><br><br><br><br><br><br><br><br><br><br>


					<p>
						<label><?php echo $lang->COURSENAME;?> * </label> <input type="text" id="coursename"
							name="coursename" class="long"
							onfocus="if(this.value === 'Course name required') this.value = '';">
					</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<p>
						<label><?php echo $lang->DESCRIPTION;?>	</label>
						<textarea name="description" rows="6" cols="20" class="long">
						</textarea>
		</p>
		<br> <br>
		<button class="button" id="addCourse">Add &raquo;</button>
	</form>
</div>