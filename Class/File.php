<?php

class File
//Permet de récupérer les fichiers images0 dans un dossier
// puis de les réorganiser en fonction de leurs noms
{
    private $_files;


    private function msgError($msg)
    {
        return '<div class=\'error\'>' . $msg . '</div>';
    }

    public function ValidFolder($folder)
    {
        if (!is_dir($folder)) {
            return $this->msgerror($folder . ' n\'est pas un dossier valide.');
        } elseif (empty($folder)) {
            return $this->msgerror($folder . 'est vide.');
        } else {
            $this->getFiles($folder);
        }

    }//fin de la méthode ValidFolder

    private function getFiles($folder)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $files = [];
        $i = 0;
        $handle = opendir($folder);
        while (false !== ($entry = readdir($handle))) {
//                    Tant que quand on lit le dossier on y trouve des fichiers, on les range dans $entry
            if ($entry != "." && $entry != ".." && $entry != ".DS_store" && FALSE === is_dir($folder . '/' . $entry)) {
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
        closedir($handle);
        if (empty ($files)) {
            return $this->msgerror('Il n\'y a rien à ranger dans' . $folder);
        } else {
            $this->_files = $files;
            $this->renamefiles($folder);
        }
    }
//        fin de la méthode getFiles
//----------------------------------------------------------------------------------------------


    public function renamefiles($folder)
    {
        foreach ($this->_files as $array) {
            $oldname = $array['filename'];
            $newfolder = substr($oldname, 0, -8);
            $newpath = $folder . '/' . $newfolder;
            $number = substr($oldname, -7, -4);
            $newname = $newfolder . '/' . $number . '.jpg';
            if (!is_dir($newpath)) {
                mkdir($newpath);
            }
            rename("images0/$oldname", "images0/$newname");
            return "<div class=msg_success>Félicitations, votre dossier a été rangé.<br/>'
                le fichier ' . $oldname . ' a été renommé en :' . $newname</div>";
        }
    }//fin de function renamefiles
}//fin de la classe File