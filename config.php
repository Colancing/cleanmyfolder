<?php
define ('WEB_DIR_NAME', 'cleanmyfolder');
define('IMAGE_DIR_NAME', 'images');
define('IMAGE_DIR_PATH', $_SERVER['DOCUMENT_ROOT'] .'/'. WEB_DIR_NAME .'/'. 'IMAGE_DIR_NAME');
define('IMAGE_DIR_URL', 'https://' . $_SERVER['HTTP_HOST'] .'/' .WEB_DIR_NAME .'/' . 'IMAGE_DIR_NAME');