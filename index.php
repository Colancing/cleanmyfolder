<?php
require ('config.php');
require('class/Image.php');
$constants=get_defined_constants(true);
echo '<pre>';
print_r($constants['user']);
echo '</pre>';
if (isset ($_POST['yes'])) {
    $image = new Image();
    $images = $image->getImages(IMAGE_DIR_PATH);
    echo '<pre>';
    print_r($images);
    echo '</pre>';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}

?>
<!doctype html>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>CleanMyFolder</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h1>Ranger mon dossier images</h1>

    <p>Les images contenues dans ce dossier peuvent être réorganisées: <?php echo IMAGE_DIR_PATH ?></p>

    <form action="#" method="post">
    <p>Je suis prêt à ranger mon dossier images :</p>
    <input type="submit" name="yes" value="C'est parti !! "/>
    </form>
</div>
</body>
</html>
