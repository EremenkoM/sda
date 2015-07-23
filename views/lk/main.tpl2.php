<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="views/lk/css/pure-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/base-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/buttons-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/forms-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/menus-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/style.css" type="text/css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="views/lk/js/jquery.tokenize.js"></script>
    <link rel="stylesheet" type="text/css" href="views/lk/css/jquery.tokenize.css" />


    <title>Личный кабинет SDA</title>

</head>
<body>
<div align="center">
    <br>
    <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
            <li><a href="<?=HTTP_PATH;?>" title="Перейти на главную">Главная</a></li>
            <li><a href="index.php?ctrl=User&act=ShowProfile" title="Редактирование профиля">Профиль</a></li>
            <li><a href="index.php?ctrl=Rent&act=ShowRent" title="Сдать в аренду...">Аренда</a></li>
            <li><a href="logout" title="Выход из личного кабинета">Выход</a></li>
        </ul>
    </div>
    <br><br>


</div><?//var_dump($content);?>
<div><?=$content;?></div>
<!-- End wrap -->

<script type="text/javascript">
    $('select#tokenize').tokenize({displayDropdownOnFocus:true});
</script>

</body>
</html>
