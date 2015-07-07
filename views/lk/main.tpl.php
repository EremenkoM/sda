<!doctype html>
<html>
<head>
    <title>
        Личный кабинет SDA
    </title>

    <link rel="stylesheet" href="views/lk/css/pure-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/base-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/buttons-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/forms-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/menus-min.css" type="text/css">
    <link rel="stylesheet" href="views/lk/css/style.css" type="text/css">
    <!--JS Scripts-->
</head>
<body>

<div align="center">
    <br>
    <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
            <li><a href="<?=HTTP_PATH;?>">Главная</a></li>
        </ul>
    </div>
    <br><br>

    <div><?php echo $content ?></div>
</div>

</body>
</html>