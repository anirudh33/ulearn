<?php
/*
 ************************** Creation Log *****************************
File Name                   -  EditCourseView.php
Project Name                -  ulearn
Description                 -  Shows all courses in system and allows to delete them
Version                     -  1.0
Created by                  -  Tanu Trehan
Created on                  -  April 4, 2013
* **************************** Update Log ********************************
*/
$lang = Language::getinstance();
$obj_paging = new paging();

if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 1;
$obj_paging->set_page($page);
$obj_paging->set_page_length(10);
$page_length = $obj_paging->page_length;
$obj_paging->set_records($result2);
$pages = $obj_paging->get_pages();

?>

	<div class="row-whiteBox">
		<div id="divfr"></div>
		<p class="headingsBig">
		<div id="errors">

	
		<?php 
	
if (isset($_REQUEST["msg"])) {
    $message = $_REQUEST["msg"];
    echo $message;
    
    
}
?>
		</div>
		
		<center><h3 class="head2"><?php echo $lang-> COURSES;?></h3></center>
		</p>

		<span id="middle"></span>

		<div class="tabular-cnt">
			<table width="100%" cellspacing="10" cellpadding="5">
				<tr class="tbl-hd">
					
					<td><?php echo $lang->COURSENAME;?></td>
					
					<td><?php echo $lang-> STATUS;?></td>
					<td><?php echo $lang-> OPTIONS;?></td>
				</tr>
                <?php
                if ($data) {
                    $i = 0;
                    foreach ($data as $row) {
                        $class = "";
                        if ($i % 2 == 0) {
                            $class = "atnate";
                        }
                        ?>
                        <tr id=row class="<?PHP echo $class; ?>">
                        	

                            <td><?php echo $row['coursename']?></td>
                            
                            
                            <td>	<?php if($row['status']=='1')
                            		{
                  					   
		                     			 echo "<font color=green>Active</font>" ;?>
		                     			 <td><a onclick=fncDelete("<?php echo $row['coursename'];?>","deleteCourseClick") href= "javascript:void(0)"  >DELETE </a></td>
                            			<?php  }
                            			 elseif ($row['status']=='2')
                            			 {
                            			 	echo "<font color=red>Inactive</font>";?></td>
                            			 	<td><a onclick=fncActivate("<?php echo $row['coursename'];?>","activateCourseClick") href= "javascript:void(0)"  >ACTIVATE </a></td>
                            			 	<?php }?>
                           
                        </tr>
                        <? $i++; 
                    }
                    if ($i % 2 == 0) {
                        $class = "atnate";
                    }
                    ?>
                    <tr class="<?PHP echo $class;?>">

					<td colspan="6"><p align="left" style="margin: 10px;">
               
                        <?php echo $obj_paging -> get_link(10);?>
                        </p></td>
				</tr>    
                    <?php
                } else {
                    ?>
                    <tr class="<?PHP echo $class;?>">
					<td colspan="6"><p align="left"
							style="text-align: center; color: red;">NORECORDSFOUND></p></td>
				</tr>
                <?php }?>
            </table>
		</div>
</div>



