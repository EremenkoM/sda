<div class="avatar">
    <form name="upload" method="POST" ENCTYPE="multipart/form-data">
            <img src="views/lk/img/<?=$shop->avatar;?>.png"><br>
            <div class="file_upload">
                <button type="button">Выбрать</button>
                <div>Файл не выбран</div>
                <input type="file" name="userfile">
            </div>
            <input type="submit" name="upload" value="Загрузить">
    </form>
</div>


<div class="profile">
<!--
    <div class="b-container">
        Если вы сдаёте в аренду оборудование нажмите сюда ->
        <a href="javascript:PopUpShow()"> <button  class="pure-button" >Аренда</button></a>
    </div>
    <div class="b-popup" id="popup1">
        <div class="b-popup-content">
            <a href="javascript:PopUpHide()"><button  class="pure-button" >Закрыть</button></a>
        </div>
    </div>
-->
    <form method="post" class="pure-form">
        <div class="profile_cont">


            <br>
            <input type="password" name="password" size="50" placeholder="Пароль можно поменять здесь">
            <br>
            Название:<br>
            <input type="text" name="name" size="50" value="<?=$shop->name_shop;?>">
            <br>
            Город:<br>
            <select id="tokenize" multiple="multiple" class="tokenize-sample" name="city[]">
                <?php foreach ($city as $item):?>
                    <option <?=$item->select;?> value= "<?=$item->id_city;?>"><?=$item->value_city;?></option>
                <?php endforeach; ?>
            </select><br><br>
            Товары:<br>
            <br>
            <select id="tokenize" multiple="multiple" class="tokenize-sample" name="spc[]">
                <?php foreach ($spc as $item):?>
                    <option <?=$item->select;?> value="<?=$item->id_goods;?>"><?=$item->value_goods;?></option>
                <?php endforeach; ?>
            </select><br><br>
            Комментарий
            <Br>
            <textarea name="comment" cols="70" rows="5"><?=$shop->comment;?></textarea>
        </div>

        <button type="submit" class="pure-button pure-button-primary" name="profile_shop">Сменить профиль</button>
    </form>
</div>