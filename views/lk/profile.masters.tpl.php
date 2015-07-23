<div class="avatar">
    <form name="upload"  method="POST" ENCTYPE="multipart/form-data">
            <img src="views/lk/img/<?=$masters->avatar;?>.png"><br>
            <div class="file_upload">
                <button type="button">Выбрать</button>
                <div>Файл не выбран</div>
                <input type="file" name="userfile">
            </div>
            <input type="submit" name="upload" value="Загрузить">
    </form>
</div>

<?php //var_dump($master); ?>

<div class="profile">
    <form method="post" class="pure-form">
        <p>
            Пароль: <br>
            <input type="password" name="password" size="35" placeholder="Пароль можно поменять здесь">
        </p>
        <p>
            Имя:<br>
            <input type="text" name="name" size="35" value="<?=$masters->name_masters;?>">
        </p>
        <p>
            Фамилия:<br>
            <input type="text" name="surname" size="35" value="<?=$masters->surname_masters;?>">
        </p>
        <p>
            Род деятельности:<br>
            <select id="tokenize" multiple="multiple" class="tokenize-sample" name="spc[]">
                <?php foreach ($spc as $item):?>
                    <option <?=$item->select;?> value="<?=$item->id_prof;?>"><?=$item->value_prof;?></option>
                <?php endforeach; ?>
            </select><br><br>
        </p>
        <p>
            Резюме:<br>
            <input type="text" name="comment" size="35" value="<?=$masters->comment;?>">
        </p>
        <p>
            Город:<br>
            <select id="tokenize" multiple="multiple" class="tokenize-sample" name="city[]">
                <?php foreach ($city as $item):?>
                    <option <?=$item->select;?> value= "<?=$item->id_city;?>"><?=$item->value_city;?></option>
                <?php endforeach; ?>
            </select><br><br>
        </p>
            <input type="hidden" name="id" value="<?=$masters->id;?>">
            <button type="submit" class="pure-button pure-button-primary" name="profile">Сменить профиль</button>
    </form>
</div>