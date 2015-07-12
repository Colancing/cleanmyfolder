<?php
require('class/File.php');

//if (isset ($_POST['yes']) && isset ($_POST['directory'])) {
//$directory  = $_POST['directory'];
$directory = '/Applications/MAMP/htdocs/Cleanmyfolder/images';
$file = new File();
echo $file -> validFolder($directory);
$file->showfiles();
$file->renamefiles();

var_dump($file);
die();

//}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>CleanMyFolder</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
</body>
</html>