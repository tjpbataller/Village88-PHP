<?php

$image = imagecreate(400, 200);
$background_color = imagecolorallocate($image, 255, 65, 55);
imagefill($image, 0, 0, $background_color);

$color = imagecolorallocate($image, 0, 0, 0);
$text_color = imagecolorallocate($image, 255, 255, 255);
$bus_body = imagefilledrectangle($image, 20, 30, 90, 170, $color);
$wheels = imagefilledellipse($image, 90, 65, 30, 30, $color);
$wheels = imagefilledellipse($image, 90, 135, 30, 30, $color);
imageline($image, 115, 165, 115, 35, $bus_body);
imagestringup($image, 5, 45, 150, "Super Lines", $text_color);
imagestring($image, 5, 130, 70, "From: ", $bus_body);
imagestring($image, 5, 130, 90, "To: ", $bus_body);
imagestring($image, 5, 130, 50, "Ticket Number: ", $bus_body);
imagestring($image, 5, 130, 110, "Amount: ", $bus_body);
imagestring($image, 4, 270, 70, "Rizal", $bus_body);
imagestring($image, 4, 270, 90, "Manila", $bus_body);
imagestring($image, 4, 270, 50, "10857", $bus_body);
imagestring($image, 4, 270, 110, "PHP 90.00", $bus_body);

header("content-type: image/png");
imagepng($image);

imagecolordeallocate($color);
imagecolordeallocate($text_color);
imagecolordeallocate($background_color);
imagedestroy($image);