<?php


class Upload {
    public static function uploadImage()
    {
        $id = $_SESSION['user']['id'];
        $path = ($_FILES['userfile']['tmp_name']);

        $img = new acResizeImage($path);
        $img->resize(150,150);
        $img->save(TMP.'/lk/img/',$id,'png',true);

        $d = new User();
        $spec = $d->specProfile($id);
        if ($spec == 1){
            $org = new Org();
            $org->changeAvatar($id);
        }elseif ($spec == 2){
            $mas = new Masters();
            $mas->changeAvatar($id);
        }else{
            $shop = new Shop();
            $shop->changeAvatar($id);
        }

    }
}