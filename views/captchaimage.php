<?php
session_start();
$rand1 = $_SESSION["rand"];

header("Content-Type: image/png");
$im = @imagecreate(110, 20) or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, $rand1, $text_color);
imagepng($im);
imagedestroy($im);
?>


