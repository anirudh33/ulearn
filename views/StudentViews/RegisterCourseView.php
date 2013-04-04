<?php 
/* Creation Log

File Name                   -  TeacherView.php
Description                 -  Landing page of Teacher contains all functions teacher may perform
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

	<form id="form"
		action="index.php?method=registerCourseButtonClick&controller=Student"
		method="POST" class="register">

		<h1>Register Course</h1>

		<fieldset class="row2">
			<legend>Course Details </legend>
			<p>
				<label>Course Name * </label> <select name="coursenamelist">
							 <?php
								foreach ( $data as $key => $value ) {
									
									?>
                            
                            <option
						value="<?php echo $value["coursename"];?>"> 
                            <?php echo $value["coursename"];?> </option>

                            <?php
								}
								?>
                           </select> </br>
			</p>


			</br>
			</br>
			<button class="button">Add &raquo;</button>

		</fieldset>




	</form>
</div>