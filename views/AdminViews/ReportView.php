
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

$pageName=="ReportView";
?>
<form action="index.php?method=showReport&controller=Admin"
	method="POST" class="report">

	<h1><?php echo $lang->REPORT;?></h1>
	<div id="one">
		<fieldset class="row2">
			<legend><?php echo $lang->GENERATEREPORTPANEL;?> </legend>
			<h4><?php echo $lang->SELECTREPORT;?> </h4>
			<br>
			<br>

			<h2 align=left>To see the total number of of registered users in
				Ulearn :</h2>
			<br>
			<br>
			<p>
				<label>Total Registrations </label><input type="radio"
					name="usertype" value="totalregistrations" />
			</p>



			<p>
			
			
			<h2 align=left>As per qualifications of users :</h2>
			<br>
			<br> <label>Graduate </label> <input type="radio" name="choice"
				value="graduate" /> &nbsp &nbsp <label>PostGraduate </label> <input
				type="radio" name="choice" value="postgraduate" />
			</p>

		</fieldset>
	</div>

	<div id="two">
		<fieldset class="row3">
	<?php
	
	if (! empty ( $studentQualificationCount ) and ! empty ( $teacherQualificationCount )) {
		
		?>


				<div id="container">

					<canvas id="chart" width="600" height="500"></canvas>

					<table id="chartData">

						<tr>
							<th>Category</th>
							<th>Number</th>
						</tr>

						<tr style="color: #0DA068">
							<td>Students</td>
							<td><?php echo $studentQualificationCount;?></td>
						</tr>
						<tr style="color: #194E9C">
							<td>Teachers</td>
							<td><?php echo $teacherQualificationCount;?></td>
						</tr>



					</table>



				</div>

			


<?php
	}
	
	?>
	<?php
	
	if (! empty ( $studentReportData ) and ! empty ( $teacherReportData )) {
		
		?>


				<div id="container">

					<canvas id="chart" width="520" height="470"></canvas>

					<table id="chartData">

						<tr>
							<th>Category</th>
							<th>Number</th>
						</tr>

						<tr style="color: #0DA068">
							<td>Students</td>
							<td><?php echo $studentReportData;?></td>
						</tr>
						<tr style="color: #194E9C">
							<td>Teachers</td>
							<td><?php echo $teacherReportData;?></td>
						</tr>



					</table>



				</div>

			


<?php


	}


?>



</fieldset>
	</div>
	<div>
		<button class="button" id="edit">Generate &raquo;</button>
	</div>



</form>




