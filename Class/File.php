<?php

class File
//Permet de récupérer les fichiers images0 dans un dossier
// puis de les réorganiser en fonction de leurs noms
{
    static private $_files;
    static public $success = FALSE;

    static private function msgSuccess($msg)
    {
        return '<div class=\'success\'>' . $msg . '</div>';
    }

    static private function msgError($msg)
    {
        return '<div class=\'error\'>' . $msg . '</div>';
    }

    static public function TidyFolder($folder)
    {
        if (!is_dir($folder)) {
            return self::msgError('Le dossier ' . $folder . ' n\'existe pas.');
        } else {
            return self::getFiles($folder);
        }
    }//fin de la méthode TidyFolder

    static private function getFiles($folder)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $files = [];
        $i = 0;
        $handle = opendir($folder);
        while (false !== ($entry = readdir($handle))) {
//                    Tant que quand on lit le dossier on y trouve des fichiers, on les range dans $entry
            if ($entry != "." && $entry != ".." && $entry != ".DS_Store" && FALSE === is_dir($folder . '/' . $entry)) {
//                        quand les entrées trouvées sont différentes de . et .. et Ds_store qui est ajouté par Mamp
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
            echo 'Le fichier ' . $folder . '/' . $oldname . ' a été renommé en : ' . $folder . '/' . $newname. '<br/>';
        }
        return self::msgSuccess('Félicitations. Ton dossier images est magnifique !');
    }//fin de function renamefiles
}//fin de la classe File