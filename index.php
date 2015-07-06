<?php
require('config.php');
require('class/Image.php');

if (isset ($_POST['directory'])) {
    if (!is_dir ($_POST['directory'])) {
        echo "Veuillez vérifier le nom du répertoire";
    }
    else {
//        Le fichier envoyer en $_POST est bien un répertoire
//        On peut lister les fichiers qu'il contient et vérifier que ce sont bien des images

        $image = new Image();
        $images = $image->listfiles(IMAGE_DIR_PATH);

        echo '<pre>';
        print_r($images);
        echo '</pre>';
        echo "processing";
    }}

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

    <form action="index.php?result=verif" method="post">
        <p><label for="directory">Répertoire à scanner : </label>
            <input type="text" name="directory" maxlength="255" size="50" value="<?php echo IMAGE_DIR_PATH ?>"/>
        </p></br>
        <p>Je suis prêt à ranger mon dossier images :</p>
        <input type="submit" name="yes" value="C'est parti !! "/>
    </form>
</div>
</body>
</html>
