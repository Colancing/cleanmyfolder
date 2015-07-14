<?php
require('class/File.php');
if (isset ($_POST['yes'])) {
    $directory  = trim ($_POST['directory']);
    echo File::TidyFolder($directory);
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
    <h1>Veux-tu ranger ton dossier image?</h1>
    <form action="#" method="post">
        <p><label for="directory">Quel dossier image veux tu ranger ? : </label>
            <input type="text" name="directory" maxlength="255" size="50" value="images"/>
        </p></br>
        <p>Je suis prêt à faire le boulot :</p>
        <input type="submit" name="yes" value="C'est parti !! "/>
    </form>
</div>
</body>
</html>
