<?php
require ('config.php');
require ('Class/Image.php');

$image = new Image();
$images=$image ->getImages(IMAGE_DIR_PATH);

?>
<!doctype html>
//
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><h1>CleanMyFolder</h1></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h1>Ranger mon dossier images</h1>
    <p>Veuillez placer vos images dans ce dossier: <?php echo IMAGE_DIR_PATH ?></p>
    <form action="processclean.php" method="post"></form>
    <p>Je suis prêt à ranger mon dossier images :</p>
    <input type="submit" name="yes" value="C'est parti !! "/>
</div>
</body>
</html>
