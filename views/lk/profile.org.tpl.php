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
                    <input type="text" name="name" size="50" value="<?=$org->name_org;?>">
                    <br>
                    <input type="text" name="city" size="50" value="<?=$org->city_org;?>">
                    <br>
                    <br>
                    <input type="text" name="spc" size="50" value="<?=$org->specification;?>">
                    <br>
                    <input type="hidden" name="id" value="<?=$org->id;?>">
                    <br>
                   Комментарий
                    <Br>
                   <textarea name="comment" cols="70" rows="5"><?=$org->comment;?></textarea>
               </div>
                <button type="submit" class="pure-button pure-button-primary" name="profile_org">Сменить профиль</button>
        </form>
</div>