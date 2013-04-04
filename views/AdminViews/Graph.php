<?php
require_once ($_SESSION['SITE_PATH'] . '/libraries/jpgraph/src/jpgraph_bar.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/jpgraph/src/jpgraph.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/jpgraph/src/jpgraph_plotband.php');
class Graphreport

{

private $datay=array();

public function creategraph($count)
{	
	$datay[]=$count;
$datay[]=45;
//$datay[]=$teacherreportcount;
$datax[]=90;
print_r($datay);
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
$bplot = new BarPlot($datay,$datax);
//print_r($bplot);
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
}
}


 

?>
