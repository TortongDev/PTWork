<?php
// Load an wbmp image from local folder
// Image can be converted into wbmp using
// online convertors or imagewbmp()
$im = imagecreatefromwbmp('geeksforgeeks.wbmp');

// Download the image
header('Content-Type: image/vnd.wap.wbmp');
imagegd2($im);
imagedestroy($im);
?>
