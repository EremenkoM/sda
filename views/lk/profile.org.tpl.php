<div class="avatar">
    <form name="upload" method="POST" ENCTYPE="multipart/form-data">
        <img src="views/lk/img/<?=$org->avatar;?>.png"><br>
        <div class="file_upload">
            <button type="button">Выбрать</button>
            <div>Файл не выбран</div>
            <input type="file" name="userfile">
        </div>
        <input type="submit" name="upload" value="Загрузить">
    </form>
</div>

<div class="profile">

        <form method="post" class="pure-form">
                <div class="profile_cont">
                    <br>
                    <input type="password" name="password" size="50" placeholder="Пароль можно поменять здесь">
                    <br>
                    Название:<br>
                    <input type="text" name="name" size="50" value="<?=$org->name_org;?>">
                    <br>
                    Город:<br>
                    <?php //var_dump($city);?>
                    <select id="tokenize" multiple="multiple" class="tokenize-sample" name="city[]">
                        <?php
                        foreach ($city as $item):?>
                            <option <?=$item->select;?> value= "<?=$item->id_city;?>"><?=$item->value_city;?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                    Деятельность:
                    <br>
                    <select id="tokenize" multiple="multiple" class="tokenize-sample" name="spc[]">
                        <?php foreach ($spc as $item):?>
                            <option <?=$item->select;?> value="<?=$item->id_spec;?>"><?=$item->value_spec;?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                   Комментарий
                    <Br>
                   <textarea name="comment" cols="70" rows="5"><?=$org->comment;?></textarea>
               </div>
                <button type="submit" class="pure-button pure-button-primary" name="profile_org">Сменить профиль</button>
        </form>
</div>