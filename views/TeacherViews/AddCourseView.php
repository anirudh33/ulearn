<?php //@todo text area click should put cursor to first position ?>
<link rel="stylesheet" href="assets/style/addcourse.css"
	type="text/css" media="screen" />
<script type="text/javascript" src="./assets/js/Validation.js"></script>
<div id="registerdiv">

			<form id="addform"
				action="index.php?method=addCourseButtonClick&controller=Teacher"
				method="POST" class="register" novalidate="novalidate">

				<h1>Add Course</h1>

				<fieldset class="row2">
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

				</fieldset>




			</form>
		</div>
