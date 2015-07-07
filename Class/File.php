<?php


class File
{
    public function __construct()
    {
//    Le constructeur est vide pour ce projet
    }

//**************************************************************************

    public function Listfiles($image_dir)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $i = 0;
        $handle = opendir($image_dir);
        while (false !== ($entry = readdir($handle))) {
//                    Tant que quand on lit le dossier on y trouve des fichiers, on les range dans $entry
            if ($entry != "." && $entry != ".." && $entry != ".DS_store") {
//                        quand les entrées trouvées sont différentes de . et .. et Ds_store
                $i++;
                $files0[$i]['filename'] = $entry;
                $files0[$i]['type'] = finfo_file($finfo, $image_dir . '/' . $entry);
//                        Alors on stocke les entrées dans un tableau $files0
                if ($files0[$i]['type'] == "image/jpeg") {
                    $files[$i]['filename'] = $entry;
                    $files = array_filter($files);
                    return $files;
                }
            }
        }
        closedir($handle);

    }
    //    fin de la méthode getImages
//**********************************************************************************
    public function organize($images)
    {

    }
//**********************************************************************************
}
//fin de class Image