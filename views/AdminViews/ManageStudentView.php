<?php 

require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/paging_class.php';
require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/constants.inc.php';
require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/lang.en.php';

$obj_paging = new paging();

if (isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 1;
$obj_paging->set_page($page);

$limit = $obj_paging->get_limit();
$obj_paging->set_page_length(10);
$page_length = $obj_paging->page_length;
$start_limit = $obj_paging->get_limit_start();
$limit = $start_limit . "," . $page_length;

$records=0;
foreach ($studentdata as $rec)
{
	$records++;
}
echo $records;	

$obj_paging->set_records($records);
$pages = $obj_paging->get_pages();




?>
<htm>
    <head>
     <link rel="stylesheet" type="text/css" href="assets/style/layout.css" media="screen" />
        
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" media="screen" />
    </head>
    <body>
        <div class="row-whiteBox">
            <p class="headingsBig">
                <h3 class="head2">VIEWUSER</h3>
            </p>

        <span id="middle"></span>
        <div id="myDivId" class="popdiv" style="display: none">

            <div id="dvListGraph"></div>
            </br> <input id="btnSubmit" type="submit" value="Close" style="" />
        </div>

        <div class="tabular-cnt">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tbl-hd">
                    <td>FIRSTNAME</td>
                    <td>LASTNAME</td>
                  
                </tr>
                <?php 
                if($studentdata){
                    $i=0;
                    foreach ($studentdata as $row) {
                        $class = "";
                        if($i%2 == 0){
                            $class= "atnate";
                        }
                        ?>
                        <tr class="<?PHP echo $class; ?>">
                            <td><?php echo $row['firstname']?></td>
                            <td><?php echo $row['lastname']?></td>
                           
                        </tr>
                        <? $i++; 
                    }
                    if($i%2 == 0){
                        $class= "atnate";
                    } 
                    ?>
                    <tr class="<?PHP echo $class;?>">
                        <td colspan="6"><p align="left" style="margin: 10px;"><?php echo $obj_paging -> get_link();?></p></td>
                    </tr>    
                    <?php
                } else {?>
                    <tr class="<?PHP echo $class;?>">
                        <td colspan="6"><p align="left" style="text-align: center;color: red;"> NORECORDSFOUND></p></td>
                    </tr>
                <?php }?>
            </table>
        </div>
        </div>
    </body>
</htm>








