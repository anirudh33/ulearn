<?php 
/* Creation Log

File Name                   -  ContentView.php
Description                 -  Displays all files uploaded by teacher to teacher
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  April 2, 2013
* **************************** Update Log ********************************
Sr.NO.        Version        Updated by           Updated on          Description
-------------------------------------------------------------------------
1			 1.1			Anirudh pandita		April 04, 2013		Clean up 
* ************************************************************************
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
		
		
		<center><h3 class="head2"><?php echo $lang->FILES;?></h3></center>
		</p>

		<span id="middle"></span>

		<div class="tabular-cnt">
			<table width="100%" cellspacing="10" cellpadding="5">
				<tr class="tbl-hd">
					
					<td><?php echo $lang->FILENAME;?></td>
					
					
					<td><?php echo $lang->OPTIONS;?></td>
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
                        	

                            <td> <a target='_blank' href='<?php echo "$row"?>'> <?php echo $row?> </a></td>
                            
                            
                            <td> <a ' href='index.php?method=ondeleteFileClick&controller=Teacher&location=<?php echo $row?>'>Delete </a></td>
                            		
                           
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




	











