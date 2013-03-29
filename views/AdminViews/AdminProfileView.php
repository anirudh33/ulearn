<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="assets/style/global.css" />
</head>

<body>	
	<header>
	
		<div class="wrapper">
			
			<span id="leftusernav">Welcome <?php echo $adminprofiledata[0]['firstname'];?></span>
			<span id="usernav"><a href="index.php?method=logout&controller=Admin">Logout</a>- <a href="index.php?method=showProfile&controller=Admin">My Profile</a> 
			
		</div>
	</header>
	
	
	
	<div id="content" class="clearfix">
		<section id="left">
			<div id="userStats" class="clearfix">
				<div class="pic">
					<a href="#"><img src="assets/images/img/577029_542275185786791_94754717_n.jpg" width="150" height="250" /></a>
				</div>
				<?php if(!empty($adminprofiledata))
				{?>
					
				<div class="data">
					<h1><?php echo $adminprofiledata[0]['firstname'];?> &nbsp <?php echo $adminprofiledata[0]['lastname'];
					?></h1>
					<h3><?php echo $adminprofiledata[0]['qualification'];
					?></h3>
					
					<h4><a href="http://ulearn.com/">http://ulearn.com/</a></h4>
					
					<div class="sep"></div>
					
				</div>
				<?php }
				else {?>
						<div class="data">
					<h1>Welcome</h1>
					<h3>Administrator</h3>
					
					<h4><a href="http://ulearn.com/">http://ulearn.com/</a></h4>
					
					<div class="sep"></div>
					
				</div>	
						<?php 	}?>
				
			</div>
			
			<h1>About Me:</h1>
			<p>The System Administrator (SA) is responsible for effective provisioning, installation/configuration, operation, and maintenance of systems hardware and software and related infrastructure. This individual participates in technical research and development to enable continuing innovation within the infrastructure. This individual ensures that system hardware, operating systems, software systems, and related procedures adhere to organizational values, enabling staff, volunteers, and Partners.

This individual will assist project teams with technical issues in the Initiation and Planning phases of our standard Project Management Methodology. These activities include the definition of needs, benefits, and technical strategy; research & development within the project life-cycle; technical analysis and design; and support of operations staff in executing, testing and rolling-out the solutions. Participation on projects is focused on smoothing the transition of projects from development staff to production staff by performing operations activities within the project life-cycle.

This individual is accountable for the following systems: Linux and Windows systems that support GIS infrastructure; Linux, Windows and Application systems that support Asset Management; Responsibilities on these systems include SA engineering and provisioning, operations and support, maintenance and research and development to ensure continual innovation.
		</section>
		
		
	</div>
</body>
</html>