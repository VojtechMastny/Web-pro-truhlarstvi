<?php
$images = [];

// Define the directory path
$uploadsDir = 'calc/';

// Get all image files from the uploads directory
if (is_dir($uploadsDir)) {
    $images = glob($uploadsDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
}

// Generate gallery items
foreach ($images as $image) {
    echo '<div class="img">';
   
    echo '<img src="' . $image . '" alt="' . basename($image, '.jpg') . '">';
    echo '</div>';
 
}
?>
