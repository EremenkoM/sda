<div class="profile">

    <form name="upload" method="POST" ENCTYPE="multipart/form-data">
        <div class="avatar">

            <img src="views/lk/img/<?=$shop->avatar;?>.png"><br>
            <div class="file_upload">
                <button type="button">Выбрать</button>
                <div>Файл не выбран</div>
                <input type="file" name="userfile">
            </div>

            <input type="submit" name="upload" value="Загрузить">

        </div>


    </form>
    <form method="post" class="pure-form">

        <div class="profile_cont">
            <br>
            <input type="password" name="password" size="50" placeholder="Пароль можно поменять здесь">
            <br>
            Название:<br>
            <input type="text" name="name" size="50" value="<?=$shop->name_shop;?>">
            <br>
            Город:<br>
            <select size="1" name="city">
                <option value="<?=$shop->id_city;?>"><?=$shop->value_city;?></option>
                <?php foreach ($city as $item):?>
                    <option value="<?=$item->id_city;?>"><?=$item->value_city;?></option>
                <?php endforeach; ?>
            </select> <br>
            Товары:<br>
            <select size="1" name="spc">
                <option value="<?=$shop->id_goods;?>"><?=$shop->value_goods;?></option>
                <?php foreach ($goods as $item):?>
                    <option value="<?=$item->id_goods;?>"><?=$item->value_goods;?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="hidden" name="id" value="<?=$shop->id;?>">
            <br>
            Комментарий
            <Br>
            <textarea name="comment" cols="70" rows="5"><?=$shop->comment;?></textarea>
        </div>
        <button type="submit" class="pure-button pure-button-primary" name="profile_shop">Сменить профиль</button>
    </form>
</div>