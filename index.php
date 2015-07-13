<?php
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

    <form action="process_clean.php" method="post">
        <p><label for="directory">Répertoire à scanner : </label>
            <input type="text" name="directory" maxlength="255" size="50" value="images"/>
        </p></br>
        <p>Je suis prêt à ranger mon dossier images :</p>
        <input type="submit" name="yes" value="C'est parti !! "/>
    </form>
</div>
</body>
</html>
