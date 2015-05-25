<div class="general_cont">

    <div>
        <h1>Добавить мастера</h1>
        <?// if($error) :?>
    <!--<b style="color: red;">Заполните все поля!</b>-->
        <?// endif?>
<form method="post" action="index.php?ctrl=Admin&act=insert&id=">
    Имя:
    <br/>
    <input type="text" name="name_masters" value="<? ?>" />
    <br/>
    Фамилия:
    <br/>
    <input type="text" name="surname_masters" value="<? ?>" />
    <br/>
    Логин:
    <br/>
    <input type="text" name="login" value="<? ?>" />
    <br/>
    Пароль:
    <br/>
    <input type="text" name="password" value="<?  ?>" />
    <br/>
    Специальность:
    <br/>
    <input type="text" name="profession" value="<?  ?>" />
    <br/>
    Резюме:
    <br/>
    <textarea name="comment"><?  ?></textarea>
    <br/>
    <input type="submit" value="Добавить" />
</form>
</div>


</div>