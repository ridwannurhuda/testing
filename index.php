<?php
$imageFile = "landscape.jpeg";
$size = "1000";
list($originalWidth, $originalHeight) = getimagesize($imageFile);
$ratio = $originalWidth / $originalHeight;

$targetWidth = $targetHeight = min($size, max($originalWidth, $originalHeight));
if ($ratio < 1) {
    $targetWidth = $targetHeight * $ratio;
} else {
    $targetHeight = $targetWidth / $ratio;
}
$srcWidth = $originalWidth;
$srcHeight = $originalHeight;
$srcX = $srcY = 0;

$targetWidth = $targetHeight = min($originalWidth, $originalHeight, $size);
if ($ratio < 1) {
    $srcX = 0;
    $srcY = ($originalHeight / 2) - ($originalWidth / 2);
    $srcWidth = $srcHeight = $originalWidth;
} else {
    $srcY = 0;
    $srcX = ($originalWidth / 2) - ($originalHeight / 2);
    $srcWidth = $srcHeight = $originalHeight;
}

$targetImage = imagecreatetruecolor($targetWidth, $targetHeight);
imagecopyresampled($targetImage, $imageFile, 0, 0, $srcX, $srcY, $targetWidth, $targetHeight, $srcWidth, $srcHeight);

echo $ratio;

?>

Perhitungan rasio image
antara 2 images