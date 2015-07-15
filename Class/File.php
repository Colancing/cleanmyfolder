<?php

/**
 * Class File
 * Permet de ranger le dossier images de son choix
 * Renomme les fichiers .jpeg en les organisant dans des sous repertoires dédiés à chaque série d'images.
 */


class File

{
    /**
     * @var array stocke tous les fichiers images trouvés dans le dossier
     */
    static private $_files;

    /**
     * Class en statique car il n'y a pas besoin de plusieurs instances
     * @param $folder string Le dossier image qui doit être rangé et qui a été retourné en _Post
     * @return string Retourne un message erreur si ce dossier n'existe pas
     * Sinon poursuit le nettoyage en effectuant la méthode getFiles
     */
    static public function TidyFolder($folder)
    {
        if (!is_dir($folder)) {
            return self::msgError('Le dossier ' . $folder . ' n\'existe pas.');
        } else {
            return self::getFiles($folder);
        }
    }//fin de la méthode TidyFolder

    /**
     * @param $folder string Le dossier image qui doit être rangé et qui a été retourné en _Post
     * @return string Retourne un message erreur si il n'y a pas d'images à ranger
     * Sinon récupère toutes les images dans un tableau $_files
     * et poursuit le nettoyage en effectuant la méthode renamefiles
     */
    static private function getFiles($folder)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $files = [];
        $i = 0;
        $handle = opendir($folder);
        while (false !== ($entry = readdir($handle))) {
//                    Tant que quand on lit le dossier on y trouve des fichiers, on les range dans $entry
            if ($entry != "." && $entry != ".." && $entry != ".DS_Store" && FALSE === is_dir($folder . '/' . $entry)) {
//                        quand les entrées trouvées sont différentes de . et .. et Ds_store (ajouté par Mamp)
                $i++;
                $files0[$i]['filename'] = $entry;
                $files0[$i]['type'] = finfo_file($finfo, $folder . '/' . $entry);
//                        Alors on stocke les entrées dans un tableau $files0
                if ($files0[$i]['type'] == "image/jpeg") {
                    $files[$i]['filename'] = $entry;
                    $files = array_filter($files);
                }
            }
        }
        if ($i == 0) {
            return self::msgError('Le dossier ' . $folder . ' existe mais il est vide...');
        }
        closedir($handle);
        if (empty ($files)) {
            return self::msgError('Il n\'y a aucune image à ranger dans le dossier ' . $folder);
        } else {
            self::$_files = $files;
            return self::renamefiles($folder);
        }
    }
//        fin de la méthode getFiles
//----------------------------------------------------------------------------------------------


    /**
     * @param $folder string Le dossier image qui doit être rangé et qui a été retourné en _Post
     * @return string retourne un message de félicitations
     */
    static private function renamefiles($folder)
    {
        foreach (self::$_files as $array) {
            $oldname = trim($array['filename']);
            $newfolder = substr($oldname, 0, -8);
            $newpath = $folder . '/' . $newfolder;
            $number = substr($oldname, -7, -4);
            $newname = $newfolder . '/' . $number . '.jpg';
            if (!is_dir($newpath)) {
                mkdir($newpath);
            }
            rename("$folder/$oldname", "$folder/$newname");
            echo 'Le fichier ' . $folder . '/' . $oldname . ' a été renommé en : ' . $folder . '/' . $newname . '<br/>';
        }
        return self::msgSuccess('Félicitations. Ton dossier images est magnifique !');
    }//fin de la méthode renamefiles

    /**
     * @param $msg string
     * @return string met en forme le message Success
     */
    static private function msgSuccess($msg)
    {
        return '<div class=\'success\'>' . $msg . '</div>';
    }

    /**
     * @param $msg string
     * @return string met en forme le message d'erreur
     */
    static private function msgError($msg)
    {
        return '<div class=\'error\'>' . $msg . '</div>';
    }

}//fin de la classe File