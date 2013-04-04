
	
<?php //@todo move the following header to admin view so that log out shows on each page if sounds fine?>
	<header>
	
		<div class="wrapper">
			
			<span id="leftusernav"><?php echo $lang-> WELCOME;?><?php echo $adminprofiledata[0]['firstname'];?></span>
			<span id="usernav"><a href="index.php?method=logout&controller=Admin"><?php echo $lang-> LOGOUT;?></a>- <a href="index.php?method=showProfile&controller=Admin"><?php echo $lang-> MYPROFILE;?></a> 
			
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
			
			<h1><?php echo $lang-> ABOUTME;?></h1>
			<p>The System Administrator (SA) is responsible for effective provisioning, installation/configuration, operation, and maintenance of systems hardware and software and related infrastructure. This individual participates in technical research and development to enable continuing innovation within the infrastructure. This individual ensures that system hardware, operating systems, software systems, and related procedures adhere to organizational values, enabling staff, volunteers, and Partners.

This individual will assist project teams with technical issues in the Initiation and Planning phases of our standard Project Management Methodology. These activities include the definition of needs, benefits, and technical strategy; research & development within the project life-cycle; technical analysis and design; and support of operations staff in executing, testing and rolling-out the solutions. Participation on projects is focused on smoothing the transition of projects from development staff to production staff by performing operations activities within the project life-cycle.


		</section>
		
		
	</div>
