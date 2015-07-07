<div class="profile">
    <form name="upload"  method="POST" ENCTYPE="multipart/form-data">
        <div class="avatar">

            <img src="views/lk/img/<?=$master->avatar;?>.png"><br>
            <div class="file_upload">
                <button type="button">Выбрать</button>
                <div>Файл не выбран</div>
                <input type="file" name="userfile">

            </div>
            <input type="submit" name="upload" value="Загрузить">

        </div>
    </form>
<?php //var_dump($master); ?>
<form method="post" class="pure-form">
	<p>
		Пароль: <br>
        <input type="password" name="password" size="35" placeholder="Пароль можно поменять здесь">
	</p>
	<p>
		Имя:<br>
		<input type="text" name="name" size="35" value="<?=$master->name_masters;?>">
	</p>
	<p>
		Фамилия:<br>
		<input type="text" name="surname" size="35" value="<?=$master->surname_masters;?>">
	</p>
	<p>
		Род деятельности:<br>
        <select size="1" name="prof">
            <option><?=$master->value_prof;?></option>
            <?php foreach ($prof as $item):?>
                <option value="<?=$item->id_prof;?>"><?=$item->value_prof;?></option>
            <?php endforeach; ?>
        </select><br>
    </p>
    <p>
        Резюме:<br>
        <input type="text" name="comment" size="35" value="<?=$master->comment;?>">
    </p>
    <p>
        Город:<br>
        <select size="1" name="city">
            <option><?=$master->value_city;?></option>
            <?php foreach ($city as $item):?>
                <option value="<?=$item->id_city;?>"><?=$item->value_city;?></option>
            <?php endforeach; ?>
        </select> <br>
    </p>
    <input type="hidden" name="id" value="<?=$master->id;?>">
 <button type="submit" class="pure-button pure-button-primary" name="profile">Сменить профиль</button>
</form>
</div>