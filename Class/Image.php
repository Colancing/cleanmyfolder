<?php


class Image
{
    public function __construct()
    {
//    Le constructeur est vide pour ce projet
    }

//**************************************************************************

    public function getImages($image_dir)
    {
        if (is_dir($image_dir)) {
//            Si le dossier passer en variable post existe et est un dossier
            if ($handle = opendir($image_dir)) {
                while (false !== ($entry = readdir($handle))) {
//                    Tant que quand on lit le dossier on y trouve des fichiers, on les range dans $entry
                    if ($entry != "." && $entry != ".." && $entry != "DS_store") {
//                        quand les entrées trouvées sont différentes de . et .. et Ds_store
                        $images[] = $entry;
//                        Alors on stocke les entrées dans un tableau $images
                    }
                }
            }
        }
        else {
            $msg="false";
            return $msg;
        }
    }
    //    fin de la méthode getImages
//**********************************************************************************
}
//fin de class Image