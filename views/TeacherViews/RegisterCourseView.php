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
<div id="errors">

	
		<?php 
	
if (isset($_REQUEST["msg"])) {
    $message = $_REQUEST["msg"];
    echo $message;
    
    
}
?>
		</div>
				<h1 id="registercourseheading"><?php echo $lang->REGISTERCOURSE;?></h1>
<p>
				
					<legend><?php echo $lang->COURSEDETAILS;?> </legend>
					</p>
					<p>
						<label><?php echo $lang->COURSENAME;?> </label> <select name="coursenamelist">
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
		<button class="button"><?php echo $lang->REGISTER;?> &raquo;</button>
	</form>
</div>