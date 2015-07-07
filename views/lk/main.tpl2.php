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
    <link rel="stylesheet" href="views/lk/css/MenuStyle.css" type="text/css">

    <title>Личный кабинет SDA</title>

    <script type="text/javascript" src="views/lk/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#main-nav li a.main-link").hover(function(){
                $("#main-nav li a.close").fadeIn();
                $("#main-nav li a.main-link").removeClass("active");
                $(this).addClass("active");
                $("#sub-link-bar").animate({
                    height: "40px"
                });
                $(".sub-links").hide();
                $(this).siblings(".sub-links").fadeIn();
            });
            $("#main-nav li a.close").click(function(){
                $("#main-nav li a.main-link").removeClass("active");
                $(".sub-links").fadeOut();
                $("#sub-link-bar").animate({
                    height: "10px"
                });
                $("#main-nav li a.close").fadeOut();
            });


        });

    </script>
</head>
<body>
<div align="center">
    <br>
    <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
            <li><a href="<?=HTTP_PATH;?>" title="Перейти на главную">Главная</a></li>
            <li><a href="index.php?ctrl=User&act=ShowProfile" title="Редактирование профиля">Профиль</a></li>
            <li><a href="index.php?ctrl=User&act=ShowProfile" title="Просмотреть заявки на выполнение работ">Стол заказов</a></li>
            <li><a href="logout" title="Выход из личного кабинета">Выход</a></li>
        </ul>
    </div>
    <br><br>


</div><?//var_dump($content);?>
<div><?=$content;?></div>
<!-- End wrap -->
</body>
</html>
