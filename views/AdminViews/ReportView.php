<?php
$_SESSION["SITE_PATH"] = '/var/www/ulearn/branches/development';
require_once $_SESSION["SITE_PATH"] . '/libraries/jpgraph/src/jpgraph.php';
require_once $_SESSION["SITE_PATH"] . '/libraries/jpgraph/src/jpgraph_bar.php';
require_once $_SESSION["SITE_PATH"] . '/libraries/jpgraph/src/jpgraph_pie3d.php';



?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> <?php echo $lang->TITLE;  ?></title>
<!-- Links for stylesheet -->
<link rel="stylesheet" href="assets/style/Registration.css"
	type="text/css" media="screen" />
<link rel="stylesheet" href="assets/style/Report.css"
	type="text/css" media="screen" />
<script src="assets/js/RegistrationView.js" type="text/javascript"></script> 



</head>

<body>

<form action="index.php?method=showreport&controller=Admin" method="POST" class="report">

	<h1> Report Generate</h1>
<div id="one">
<fieldset class="row2">
	<legend>Generate Reports Panel </legend>
	<p>
		<h4 color="red">Select User Category </h4>
		 <label>Student </label><input type="radio" name="usertype" value="student"  /> 
		<label>Teacher </label> <input type="radio" name="usertype" value="teacher" />
	</p>
	
	<br>
		<h4 color="red"> Select Report Category </h4>
<p>
	<h2 align=left> As per registered users :</h2>	<label>Number of registrations </label>
		 <input type="radio" name="choice" value="registrations" /> 
		<br><br>
			
	<h2 align=left> As per qualifications of users :</h2>			
		<label>Graduate </label> <input type="radio" name="choice" value="graduate" />
		<label>PostGraduate </label> <input type="radio" name="choice" value="postgraduate" />
	</p>
</fieldset>
</div>

<div id="two">
<fieldset class="row3">
<?php $studentreportcount=10;?>
	<?php

		if(!empty($studentreportcount))	
		{?>	
		<div id="two">	
		<?echo " Number of registered students" ;
		echo $studentreportcount; ?>
		</div>
<?php 
$datay=array();
 $datay[]=$studentreportcount;
// $datay[]=$teacherreportcount;

			$graph = new Graph(310,250,'auto');
$graph->SetScale("textlin");
$graph->img->SetMargin(60,30,20,40);
$graph->yaxis->SetTitleMargin(45);
$graph->yaxis->scale->SetGrace(30);
$graph->SetShadow();

// Turn the tickmarks
$graph->xaxis->SetTickSide(SIDE_DOWN);
$graph->yaxis->SetTickSide(SIDE_LEFT);

// Create a bar pot
$bplot = new BarPlot($studentreportcount);

// Create targets for the image maps. One for each column
 $targ=array("test2.php?id=2","test2.php?id=2","test1.php?id=3","test1.php?id=4","test1.php?id=5","test1.php?id=6");
$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
$bplot->SetCSIMTargets($targ,$alts);
$bplot->SetFillColor("orange");

// Use a shadow on the bar graphs (just use the default settings)
$bplot->SetShadow();
$bplot->value->SetFormat(" $ %2.1f",70);
$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);
$bplot->value->SetColor("blue");
$bplot->value->Show();

$graph->Add($bplot);

$graph->title->Set("Trainees 2013");
$graph->xaxis->title->Set("X-title");
$graph->yaxis->title->Set("Y-title");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Send back the HTML page which will call this script again
// to retrieve the image.
$graph->StrokeCSIM(); 
 
?>

			
<?php

		}
		elseif(!empty($teacherreportcount))	
		{	?>
		<div id="two">
			echo "teacher records ";

			echo $teacherreportcount;
		</div>
		<?php }

if(isset($studentqualificationcount))	
		{	?>
		<div id="two">
			<?php echo "student qualification records ";

			echo $studentqualificationcount;?>
		</div>
		
<?php

		}	


if(isset($teacherqualificationcount))	
		{	?>
		<div id="two">
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
</body>






</html>




