<?php 

/* Creation Log

File Name                   -  AddCouseView.php
Description                 -  Displays all courses added by teacher
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  April 2, 2013
* **************************** Update Log ********************************
*/
//@todo text area click should put cursor to first position ?>


<div id="registerdiv">

			<form id="addform"
				action="index.php?method=addCourseButtonClick&controller=Teacher"
				method="POST" class="register" novalidate="novalidate">

				<h1>Add Course</h1>

				
					<legend>Course Details </legend>


					<p>
						<label>Course Name * </label> <input type="text" id="coursename"
							name="coursename" class="long"
							onfocus="if(this.value === 'Course name required') this.value = '';">
					</p>
					<p>
						<label>Description </label>
						<textarea name="description" rows="6" cols="20" class="long">
						</textarea>
					</p>
					<br> <br>
					<button class="button" id="addCourse">Add &raquo;</button>

				




			</form>
		</div>
