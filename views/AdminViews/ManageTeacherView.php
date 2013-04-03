<?php
/*
 ************************** Creation Log *****************************
File Name                   -  ManageTeacherView.php
Project Name                -  ulearn
Description                 -  Shows all teachers in system and allows to delete them
Version                     -  1.0
Created by                  -  Ujjwal Rawlley
Created on                  -  March 18, 2013
*/

$obj_paging = new paging();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$obj_paging->set_page($page);
$obj_paging->set_page_length(10);
$page_length = $obj_paging->page_length;
$obj_paging->set_records($teacherRecordsCount);
$pages = $obj_paging->get_pages();
?>
<html>
<head>
<link rel="stylesheet" type="text/css"
	href="assets/style/ManageTeacherView.css" media="screen" />
	
	 <script type="text/javascript" src="jquery-1.3.2.js"></script>
</head>
<body>
	<div class="row-whiteBox">
		<div id="divfr"></div>
		<p class="headingsBig">
		<h3 class="head2"><?php echo $lang-> REGISTEREDTEACHERDETAILS;?></h3>
		</p>
		<span id="middle"></span>
		<div class="tabular-cnt">
			<table width="100%" cellspacing="10" cellpadding="5">
				<tr class="tbl-hd">
					<td><?php echo $lang->ID;?></td>
					<td><?php echo $lang->FIRSTNAME;?></td>
					<td><?php echo $lang->LASTNAME;?></td>
					<td><?php echo $lang-> STATUS;?></td>
					<td><?php echo $lang-> OPTIONS;?></td>
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
		                     			 <td><a onclick=fncDelete("<?php echo $row['id'];?>") href= "javascript:void(0)"  >DELETE </a></td>
                            			<?php  }
                            			 elseif ($row['status']=='2')
                            			 {
                            			 	echo "<font color=red>Inactive</font>";?></td>
                            			 	<td><a onclick=fncActivate("<?php echo $row['id'];?>") href= "javascript:void(0)"  >ACTIVATE </a></td>
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

<script>

function fncDelete(argId) {
	   
	$.ajax({ 
     type: "POST",
     url: 'index.php?method=deleteTeacherClick&controller=Admin',          
     data: "id="+argId,                        
       success: function(dataReceived){
    	   dataReceived=dataReceived.charAt(dataReceived.length-1);
           if($.trim(dataReceived)=="1") {
        	   window.location.reload();
           } else {
               alert("Problem in deleting record!");
             <?php //@todo error to be thrown if record doesnt get deleted actually ?>  
           }
       },
   });
}

function fncActivate(argId) {

	$.ajax({ 
     type: "POST",
     url: 'index.php?method=activateTeacherClick&controller=Admin',          
     data: "id="+argId,                        
       success: function(dataReceived){
    	   dataReceived=dataReceived.charAt(dataReceived.length-1);
           if($.trim(dataReceived)=="1") {
        	   window.location.reload();
           } else {
               alert("Problem in deleting record!");
               <?php //@todo error to be thrown if record doesnt get activated from ?>  
           }
       },
   });
}
</script>