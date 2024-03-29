<?php
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';
$images = [];

// Define the directory path based on category
switch ($selectedCategory) {
    case 'door':
        $categoryDir = 'uploads/dvere/';
        break;
    case 'kitchen':
        $categoryDir = 'uploads/kuchyne/';
        break;
    case 'wall':
        $categoryDir = 'uploads/obývací stěny/';
        break;
    case 'pergo':
        $categoryDir = 'uploads/pergoly_altany/';
        break;
    case 'bed':
        $categoryDir = 'uploads/postele/';
        break;
    case 'stairs':
        $categoryDir = 'uploads/schodiste/';
        break;
    case 'watch':
        $categoryDir = 'uploads/skrine_skrinky/';
        break;
  
}

// Get all image files from the category directory
if ($selectedCategory !== 'all' && is_dir($categoryDir)) {
    $images = glob($categoryDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
} elseif ($selectedCategory === 'all') {
    // Get all image files from all category directories
    $categories = ['dveře', 'kuchyně', 'obývací stěny', 'pergoly, altány', 'postele', 'schodiště', 'skříně/skříňky'];
    foreach ($categories as $category) {
        $categoryDir = 'uploads/' . $category . '/';
        if (is_dir($categoryDir)) {
            $images = array_merge($images, glob($categoryDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE));
        }
    }
}

// Generate gallery items
foreach ($images as $image) {
    echo '<div class="gallery-item">';
    echo '<div class="gallery-item-inner">';
    echo '<img src="' . $image . '" alt="' . basename($image, '.jpg') . '">';
    echo '</div>';
    echo '</div>';
}
?>
