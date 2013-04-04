
<?php 
/*  ************************** Creation Log *****************************

File Name                   -  ReportView.php
Description                 - Displays various reports generated 
Version                     -  1.0
Created by                  -  Ujjwal Rawlley
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1	1.1		  Anirudh Pandita	April 04, 2013		Clean up and 
														header separation
* ************************************************************************
*/
//require_once ($_SESSION['SITE_PATH'] . '/views/AdminViews/Graph.php');

//$objgraph=new Graphreport();


?>

<link rel="stylesheet" href="assets/style/Report.css"
	type="text/css" media="screen" />

<form action="index.php?method=showreport&controller=Admin" method="POST" class="report">

	<h1> Report Generate</h1>
<div id="one">
<fieldset class="row2">
	<legend>Generate Reports Panel </legend>
	<p>
		<h4>Select User Category </h4><br><br>
		 <label>Student </label><input type="radio" name="usertype" value="student"  /> &nbsp &nbsp
		<label>Teacher </label> <input type="radio" name="usertype" value="teacher" />
	</p>
	
	<br><br>
		<h4 > Select Report Category </h4><br><br>
<p>
	<h2 align=left> As per registered users :</h2>	<label>Number of registrations </label>
		 <input type="radio" name="choice" value="registrations" /> 
		<br><br><br><br><br>
			
	<h2 align=left> As per qualifications of users :</h2>			<br><br>
		<label>Graduate </label> <input type="radio" name="choice" value="graduate" /> &nbsp &nbsp
		<label>PostGraduate </label> <input type="radio" name="choice" value="postgraduate" />
	</p>
<br><br><br>
</fieldset>
</div>

<div id="two">
<fieldset class="row3">
	<?php

		if(!empty($studentreportcount))	
		{?>	
		<div id="three">	
		<p><?echo " Number of registered students" ;
//		echo $studentreportcount; 
	//		$objgraph->creategraph($studentreportcount)?></p>
		</div>
<?php

?>

			
<?php

		}
		elseif(!empty($teacherreportcount))	
		{	?>
		<div id="three">
		<p><?php	echo "teacher records ";

			echo $teacherreportcount;?></p>
		</div>
		<?php }

if(isset($studentqualificationcount))	
		{	?>
		<div id="three">
			<?php echo "student qualification records ";

			echo $studentqualificationcount;?>
		</div>
		
<?php

		}	


if(isset($teacherqualificationcount))	
		{	?>
		<div id="three">
			<?php echo "teacher qualification records ";

			echo $teacherqualificationcount;?>
		</div>
<?php		}	


?>




</fieldset>
</div>
<div>
					<button class="button" id="edit">Generate &raquo;</button>
				</div>



</form>




