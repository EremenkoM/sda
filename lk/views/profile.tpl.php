<form name="upload" action="profile" method="POST" ENCTYPE="multipart/form-data">
    <div><img class="avatar" src="views/img/<?=$master->avatar;?>.png"></div>
    Выберите картинку для загрузки: <input type="file" name="userfile"><br><br>
    <input type="submit" name="upload" value="upload">
</form>

<form method="post" action="yes" class="pure-form">
	<p>
		E-mail:<br>
		<input type="email" name="email" size="35" value="<?=$master->email;?>">
	</p>
	<p>
		Пароль: <br>
		<input type="password" name="password" size="35" value=""><br>
		<em>Оставьте поле пустым, если не хотите менять пароль! </em>
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
		<input type="text" name="prof" size="35" value="<?=$master->profession;?>">
    </p>
    <p>
        Резюме:<br>
        <input type="text" name="comment" size="35" value="<?=$master->comment;?>">
    </p>
    <p>
        Город:<br>
        <input type="text" name="city" size="35" value="<?=$master->city;?>">
    </p>
    <input type="hidden" name="id" value="<?=$master->id;?>">
 <button type="submit" class="pure-button pure-button-primary" name="profile">Сменить профиль</button>
</form>
