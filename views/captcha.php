<?php 
session_start(); 
$rand = rand(1000, 99999); 
unset($_SESSION["rand"]); 
$_SESSION["rand"] = $rand; 
echo("Enter the number you see below: ".round($rand*1.38)); ?><br/> 
<img src="captchaimage.php" width="150" height="50">