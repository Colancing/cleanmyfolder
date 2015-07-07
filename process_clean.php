<?php
require('class/File.php');

if (isset ($_POST['yes'])) {
    $image = new Image();
    $images = $image->getImages(IMAGE_DIR_PATH);
    echo '<pre>';
    print_r($images);
    echo '</pre>';
}