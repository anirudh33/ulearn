<?php
$obj_paging = new paging();

if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 1;
$obj_paging->set_page($page);

// $limit = $obj_paging->get_limit();
$obj_paging->set_page_length(10);
$page_length = $obj_paging->page_length;
// $start_limit = $obj_paging->get_limit_start();
// $limit = $start_limit . "," . $page_length;

// $objRecordSetUSR = $objUsers->fncFetchUsers($limit);
// $total_records = $objUsers->fncFetchUsersCount();
// $obj_paging->set_records($total_records);
// $pages = $obj_paging->get_pages();

$obj_paging->set_records($studentRecordsCount);
$pages = $obj_paging->get_pages();

?>
<html>
<head>
<link rel="stylesheet" type="text/css"
	href="assets/style/ManageStudentView.css" media="screen" />

</head>
<body>
	<div class="row-whiteBox">
		<div id="divfr"></div>
		<p class="headingsBig">
		
		
		<h3 class="head2">Registered Student Details</h3>
		</p>

		<span id="middle"></span>

		<div class="tabular-cnt">
			<table width="100%" cellspacing="10" cellpadding="5">
				<tr class="tbl-hd">
					<td>ID</td>
					<td>FIRSTNAME</td>
					<td>LASTNAME</td>
					<td>STATUS</td>
					<td>OPTIONS</td>
				</tr>
                <?php
                if ($studentdata) {
                    $i = 0;
                    foreach ($studentdata as $row) {
                        $class = "";
                        if ($i % 2 == 0) {
                            $class = "atnate";
                        }
                        ?>
                        <tr id=row class="<?PHP echo $class; ?>">
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['firstname']?></td>
					<td><?php echo $row['lastname']?></td>
					<td id=rr><?php
                        
                        if ($row['status'] == 1) {
                            ?>
                  					 <img src="../big-tick-green.jpg" />  
                            			<?php
                            
                            echo "Active";
                        }
                        ?></td>
					<td><a
						href="index.php?method=deleteTeacherClick&controller=Admin?id=<?php  $row['id'];?> ">
							DELETE </a></td>
				</tr>
                        <?
                        
                        $i ++;
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
</body>
</htm>