<div class="general_cont">

    <div>
        <h1>Изменить данные</h1>
        <?// if($error) :?>
            <!--<b style="color: red;">Заполните все поля!</b>-->
        <?// endif?>
        <?php foreach ($users as $item): ?>
        <form method="post" action="index.php?ctrl=Admin&act=Update&id=<?php echo $item->id_masters; ?>">
            Имя:
            <br/>
            <input type="text" name="name_masters" value="<?php echo $item->name_masters; ?>" />
            <br/>
            Фамилия:
            <br/>
            <input type="text" name="surname_masters" value="<? echo $item->surname_masters; ?>" />
            <br/>
            Логин:
            <br/>
            <input type="text" name="login" value="<? echo $item->login; ?>" />
            <br/>
            Пароль:
            <br/>
            <input type="text" name="password" value="<? echo $item->password; ?>" />
            <br/>
            Специальность:
            <br/>
            <input type="text" name="profession" value="<? echo $item->profession; ?>" />
            <br/>
            Резюме:
            <br/>
            <textarea name="comment"><? echo $item->comment; ?></textarea>
            <br/>
            <input type="submit" value="Добавить" />
        </form>
        <?php endforeach; ?>
    </div>


</div>