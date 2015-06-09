<!doctype html>
<html>
<head>
    <title>
        Личный кабинет SDA
    </title>
    <link rel="stylesheet" href="views/css/pure-min.css" type="text/css">
    <link rel="stylesheet" href="views/css/base-min.css" type="text/css">
    <link rel="stylesheet" href="views/css/buttons-min.css" type="text/css">
    <link rel="stylesheet" href="views/css/forms-min.css" type="text/css">
    <link rel="stylesheet" href="views/css/menus-min.css" type="text/css">
    <link rel="stylesheet" href="views/css/style.css" type="text/css">
    <!--JS Scripts-->
    <script type="text/javascript">
        $(function(){
            $(".email").blur(function(){
                var email = $(".email").val();
                if(email.length < 4 || !email.match(/[\d\w\-\_\.]+@[\d\w\-\_\.]+\.[\w]{2,4}/i)){
                    $(".email").css({'border-color': 'red'});
                    $(".result_email").html('<strong style="color:red">Введите корректный email</strong>');
                }else{
                    $(".email").css({'border-color':'green'});
                    $(".result_email").html('<strong style="color:green">E-mail адрес корректен</strong>');
                }
            });

            $(".password").blur(function(){
                var password = $(".password").val();
                if(password.length < 6){
                    $(".password").css({'border-color': 'red'});
                    $(".result_password").html('<strong style="color:red">Пароль должен содержать, минимум 6 символов</strong>');
                }else{
                    $(".password").css({'border-color':'green'});
                    $(".result_password").html('<strong style="color:green">Пароль корректен</strong>');
                }
            })
        });
    </script>
    <style type='text/css'>
        div.success{
            color:green;
            font-size:1.8em;
            text-align:center;
        }
        div.error{
            color:red;
            font-size:1.8em;
            text-align:center;
        }
        div.copyright{
            margin-top:60px;
            border-top: 1px solid silver;
            padding-top: 10px;
            text-align:center;
        }
    </style>
</head>
<body>

<div align="center">
    <h3>Личный кабинет</h3>
    <br>

        <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
            <li><a href="<?=HTTP_PATH;?>">Главная</a></li>
            <li><a href="login">Вход</a></li>
            <li><a href="signup">Регистрация</a></li>

        </ul>
        </div>
    <br><br>
    <div><?php echo $content ?></div>
</div>
<div class="copyright">
    &copy; <?=date('d.m.Y');?> SDA
</div>
</body>
</html>