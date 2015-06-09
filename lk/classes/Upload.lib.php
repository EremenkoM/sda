<?php


class Upload {
    public static function uploadImage()
    {
        $id = $_SESSION['user']['id'];
        $path = ($_FILES['userfile']['tmp_name']);

        $img = new acResizeImage($path);
        $img->resize(150,150);
        $img->save(TMP.'/img/',$id,'png',true);

        $d = new Data();
        if ($d->specProfile($id) == 1){
            $org = new Org();
            $org->changeAvatar($id);
        }else{
            $mas = new Masters();
            $mas->changeAvatar($id);
        }

    }
}