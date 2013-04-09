<?php 
/* Creation Log

File Name                   - RegisterCourseView.php
Description                 -  Register for a course to study 
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

			<form id="registerform" 
				action="index.php?method=registerCourseButtonClick&controller=Teacher"
				method="POST" class="register">

				<h1 id="registercourseheading">Register Course</h1>
<p>
				
					<legend>Course Details </legend>
					</p>
					<p>
						<label>Course Name </label> <select name="coursenamelist">
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



					</br> </br>
					<button class="button">Register &raquo;</button>

				




			</form>
		</div>

