<form name="upload" action="profile" method="POST" ENCTYPE="multipart/form-data">
    <div><img class="avatar" src="views/img/<?=$org->avatar;?>.png"></div>
    Выберите картинку для загрузки: <input type="file" name="userfile"><br><br>
    <input type="submit" name="upload" value="upload">
</form>



<form method="post" class="pure-form" action="yes">
    <p>
        E-mail:<br>
        <input type="email" name="email" size="35" value="<?=$org->email;?>">
    </p>
    <p>
        Пароль: <br>
        <input type="password" name="password" size="35" value=""><br>
        <em>Оставьте поле пустым, если не хотите менять пароль! </em>
    </p>
    <p>
        Название организации:<br>
        <input type="text" name="name" size="35" value="<?=$org->name_org;?>">
    </p>
    <p>
        Город:<br>
        <input type="text" name="city" size="35" value="<?=$org->city_org;?>">
    </p>
    <p>
        Профиль деятельности:<br>
        <input type="text" name="spc" size="35" value="<?=$org->specification;?>">
        <input type="hidden" name="id" value="<?=$org->id;?>"><br>
    </p>
    <button type="submit" class="pure-button pure-button-primary" name="profile_org">Сменить профиль</button>
</form>
