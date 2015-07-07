<?php
require('config.php');
require('class/File.php');
if (!is_dir($_POST['directory'])) {
        $msg_error = "Veuillez vérifier le nom du répertoire";
    } else {
//        Le fichier envoyer en $_POST est bien un répertoire
//        On peut lister les fichiers qu'il contient et vérifier que ce sont bien des images
        $file = new File();
        $files = $file->listfiles($_POST['directory']);
        if (empty($files)) {
            $msg_error = "Ce repertoire ne contient pas d'image valide";
        }
        echo '<pre>';
        print_r($files);
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
    <?php if (isset ($msg_error)) : ?>
        <div class="error"><?php echo $msg_error ?> </div>
    <?php endif ?>
    <p>Voici les fichiers images trouvés dans ce répertoire</p>
    <?php foreach ($files as $file) : ?>
        <ul>
            <li><?php echo $file['filename'] ?></li>
        </ul>
    <?php endforeach ?>

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
