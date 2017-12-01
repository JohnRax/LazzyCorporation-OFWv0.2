<?php 

	
  				$percent=0.5;
                // Get new sizes
                list($width, $height) = getimagesize("assets/img/profilepicture/6179593-profile-pics.jpg");
        		$newwidth = $width * $percent;
                $newheight = $height * $percent;
                // Load
                $thumb = imagecreatetruecolor($newwidth,$newheight);
                $source = imagecreatefromjpeg("assets/img/profilepicture/girl-profile-picture-for-facebook-13.jpg");

                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

 ?>

 <?php
// The file
$filename = 'assets/img/profilepicture/girl-profile-picture-for-facebook-13.jpg';

// Set a maximum height and width
$width = 200;
$height = 200;

// Content type
header('Content-Type: image/jpeg');

// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}

// Resample
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// Output
imagejpeg($image_p, null, 100);
?>