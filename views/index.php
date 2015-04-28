<!DOCTYPE html>
<html lang="rus">
    <head>
        <title>SDA</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Creative CSS3 Animation Menus" />
        <meta name="keywords" content="menu, navigation, animation, transition, transform, rotate, css3, web design, component, icon, slide" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="views/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="views/css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <div class="container">
            <div class="header">
                войти\ выйти \ отойти... <br><br><br>
            </div>

            <div class="left-side">
                <ul class="ca-menu">
                    <li>
                        <a href="#">
                            <span class="ca-icon"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">SDA</h2>
                                <h3 class="ca-sub">ГЛАВНАЯ СТРАНИЦА</h3>
                            </div>
                        </a>
                    </li>
                </ul>

                <div id="in">

                </div>
            </div>
            <div class="right-side">
                <br>
            </div>



            <ul class="ca-menu">
                    <li>
                        <a href="index.php?ctrl=Users&act=All">
                            <span class="ca-icon"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Мастера</h2>
                                <h3 class="ca-sub">Сделают любую работу</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="ca-icon"> </span>
                            <div class="ca-content">
                                <h2 class="ca-main">Строительные организации</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="ca-icon"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Магазины</h2>
                                <h3 class="ca-sub">Строительных материалов, инструмента...</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="ca-icon"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Аренда</h2>
                                <h3 class="ca-sub">Техники и оборудования</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="ca-icon"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Технологии строительства</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>


        <div>
           <?php echo $content; ?>
        </div>

        <script type="text/javascript" src="views/jquery1.6.4.min.js"></script>
    </body>
</html>