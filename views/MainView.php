 <!-- Creation Log
 
  File Name                   -  MainView.php
  Description                 -  HomePage 
  Version                     -  1.0
  Created by                  -  Kawaljeet Singh
  Created on                  -  March 01, 2013
 
  -->
 


<html>
    <head>
        <title>	Home Page </title>
							 <!-- Links for stylesheet -->
        <link rel="stylesheet" href="assets/style/MainViewStyle.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="assets/style/Slide.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="assets/style/MainView.css" type="text/css" media="screen" />
							 <!-- jquery source -->
        <script src="assets/js/jquery/jquery.js" type="text/javascript"></script>
        <script src="assets/js/MainViewSlide.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="assets/js/MainView.js" type="text/javascript"></script>
	
        	
              
    </head>	

    <body>
        <!-- Panel -->
        <div id="toppanel">
            <div id="panel">
                <div class="content clearfix">

                    <div class="left">
                        <h1>Welcome to ULearn</h1>
                    </div>

                    <div class="left">
                        <!-- Login Form -->
                        <form class="clearfix" action="controllers/MainController.php?method=initiateLogin" method="post" id="register-form">
                            <h1>Member Login</h1>
                            <label class="grey" for="fieldEmail">Username:</label>
                            <input class="field" type="text" name="fieldEmail" id="log" value="" size="23" />
                            <label class="grey" for="pwd">Password:</label>
                            <input class="field" type="password" name="fieldPassword" id="pwd" size="23" />
                            <label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
                            <div class="clear"></div>
                            <input type="submit" id="submit" name="submit" value="Login" class="bt_login" />
                            <a class="lost-pwd" href="#">Lost your password?</a>
                        </form>
                    </div>

                    <!-- Login Form -->

                    <div class="left right">			
                        <!-- Register Form -->
                        <form action="#" method="post">
                            <h1>Not a member yet? Sign Up!</h1>				
                            <input type="submit" name="submit" value="Register" class="bt_register" />
                        </form>
                    </div>
                </div>
            </div> 
            <!-- /login -->	

            <div class="tab">
                <ul class="login">
                    <li class="left">&nbsp;</li>
                    <li>Hello Guest!</li>
                    <li class="sep">|</li>
                    <li id="toggle">
                        <a id="open" class="open" href="#">Log In | Register</a>
                        <a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
                    </li>
                    <li class="right">&nbsp;</li>
                </ul> 
            </div> <!-- / top -->
        </div> <!--panel -->


        <div id="cc">
            <div id="header">
                <img alt="" src="assets/images/Views/ulearn.gif" style="float:right;padding:50px;width:280px;">						
            </div>

            <div id="image">

            </div>
            <div id="content">
                <div class="container">

                    <ul class="tabs">
                        <li><a href="#tab1">Home</a></li>
                        <li><a href="#tab2">About Us</a></li>
                        <li><a href="#tab3">Resources</a></li>
                        <li><a href="#tab4">Contact</a></li>

                    </ul>
                    <div class="tab_container">
                        <div id="tab1" class="tab_content">
                            <img alt="" src="assets/images/Views/tab1_image.jpg">
                            <h2>E-learning refers to the use of various kinds of electronic media and information and communication technologies (ICT) in education. E-learning is an inclusive terminology for all forms of educational technology that electronically or technologically support learning and teaching, and may, depending on an emphasis on a particular aspect or component or delivery method, sometimes be termed technology-enhanced learning (TEL), computer-based training (CBT), internet-based training (IBT), web-based training (WBT), virtual education, or digital educational collaboration.

                                E-learning includes numerous types of media that deliver text, audio, images, animation, and streaming video and includes technology applications and processes such as audio or video tape, satellite TV, CD-ROM, and computer-based learning, as well as local intranet/extranet and web-based learning. Information and communication systems, whether free-standing or based on either local networks or the Internet in networked learning, underly many e-learning processes. [1]



                        </div>
                        <div id="tab2" class="tab_content">
                            <img alt="" src="assets/images/Views/tab1_image.jpg">
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum nibh enim. Aenean pharetra fermentum dui nec interdum. Nam volutpat, odio a faucibus mattis, nunc ligula varius erat, non imperdiet diam eros sit amet orci. Donec eu consequat velit. Maecenas urna enim, molestie eu egestas convallis, gravida malesuada orci. Aliquam at elit massa, sit amet interdum tortor. Morbi nibh lectus, rhoncus nec ullamcorper sit amet, dictum et neque. Nulla accumsan elementum erat id ornare. Aenean dictum, odio at porttitor eleifend, arcu urna faucibus neque, at commodo tortor felis vel leo. Suspendisse potenti. Ut euismod blandit vulputate. Aliquam nec dolor nisl. Aliquam porttitor libero sed enim consectetur venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nulla ligula, interdum ac molestie vitae, imperdiet in orci. Donec id ullamcorper lacus.</h2>
                        </div>
                        <div id="tab3" class="tab_content">
                            <img alt="" src="assets/images/Views/tab1_image.jpg">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum nibh enim. Aenean pharetra fermentum dui nec interdum. Nam volutpat, odio a faucibus mattis, nunc ligula varius erat, non imperdiet diam eros sit amet orci. Donec eu consequat velit. Maecenas urna enim, molestie eu egestas convallis, gravida malesuada orci. Aliquam at elit massa, sit amet interdum tortor. Morbi nibh lectus, rhoncus nec ullamcorper sit amet, dictum et neque. Nulla accumsan elementum erat id ornare. Aenean dictum, odio at porttitor eleifend, arcu urna faucibus neque, at commodo tortor felis vel leo. Suspendisse potenti. Ut euismod blandit vulputate. Aliquam nec dolor nisl. Aliquam porttitor libero sed enim consectetur venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nulla ligula, interdum ac molestie vitae, imperdiet in orci. Donec id ullamcorper lacus.

                        </div>
                        <div id="tab4" class="tab_content">
                            <img alt="" src="assets/images/Views/tab1_image.jpg">
                            <h2><ul><li>Anirudh</li>
                                    <li>Kawaljeet</li>
                                    <li>Ujjwal</li>
                                    <li>Tanu</li>
                                </ul></h2>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
        <div id="footer">

        </div>
    </body>
</html>
