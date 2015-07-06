<?php


class Image
{
    public function __construct()
    {
//    Le constructeur est vide pour ce projet
    }

//**************************************************************************

    public function Listfiles($image_dir)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $i=0;
        $handle = opendir($image_dir);

        if (is_dir($image_dir)) {
//            Si le dossier passer en variable post existe et est un dossier
                while (false !== ($entry = readdir($handle))) {
//                    Tant que quand on lit le dossier on y trouve des fichiers, on les range dans $entry
                    if ($entry != "." && $entry != ".." && $entry != ".DS_store") {
//                        quand les entrées trouvées sont différentes de . et .. et Ds_store
                        $i++;
                        $images[$i]['filename'] = $entry;
                        $images[$i]['type']=finfo_file($finfo, $image_dir. '/' .$entry);
//                        Alors on stocke les entrées dans un tableau $images
                    }
                }
            }
        closedir($handle);
        return $images;
    }
    //    fin de la méthode getImages
//**********************************************************************************
}
//fin de class Image