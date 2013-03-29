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

$obj_paging->set_records($teacherRecordsCount);
$pages = $obj_paging->get_pages();

?>
<html>
<head>
<link rel="stylesheet" type="text/css"
	href="assets/style/ManageTeacherView.css" media="screen" />
	
	 <script type="text/javascript" src="jquery-1.3.2.js"></script>
	 
<script language="JavaScript" type="text/javascript">
 function func() 
  {
     opener.location.reload(true);
     self.close();
  }
</script>
	
	 
       
</head>
<body>





	<div class="row-whiteBox">
	
		<div id="divfr"></div>
		<p class="headingsBig">
		
		
		<h3 class="head2">Registered Teacher Details</h3>
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
                if ($teacherdata) {
                    $i = 0;
                    foreach ($teacherdata as $row) {
                        $class = "";
                        if ($i % 2 == 0) {
                            $class = "atnate";
                        }
                        ?>
                        <tr id=row class="<?PHP echo $class; ?>">
                        	<td><?php echo $row['id']?></td>
                            <td><?php echo $row['firstname']?></td>
                            <td><?php echo $row['lastname']?></td>
                            
                            <td>	<?php if($row['status']=='1')
                            		{
                  					   
		                     			 echo "<font color=green>Active</font>" ;?>
		                     			 <td><a href= "index.php?method=deleteTeacherClick&controller=Admin&id=<?php echo $row['id'];?>"onclick="return confirm('Are you sure you want to delete <?php echo $row['firstname'];?> &nbsp <?php echo $row['lastname'];?> ?'); "   >DELETE </a></td>
                            			<?php  }
                            			 elseif ($row['status']=='2')
                            			 {
                            			 	echo "<font color=red>Inactive</font>";?></td>
                            			 	<td><a href= "index.php?method=activateTeacherClick&controller=Admin&id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to activate <?php echo $row['firstname'];?> &nbsp <?php echo $row['lastname'];?> ?');">ACTIVATE  </a></td>
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
</body>
</htm>	