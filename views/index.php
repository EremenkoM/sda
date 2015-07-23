<!DOCTYPE html>
    <head>
        <title>SDA</title>
        <meta charset="UTF-8" />
        <!-- stylesheets -->
        <link rel="stylesheet" href="views/css/style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="views/css/slide.css" type="text/css" media="screen" />
        <!-- PNG FIX for IE6 -->
        <!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
        <!--[if lte IE 6]>
        <script type="text/javascript" src="views/js/pngfix/supersleight-min.js"></script>
        <![endif]-->

        <!-- jQuery - the core -->
        <script src="views/js/jquery-1.3.2.min.js" type="text/javascript"></script>
        <!-- Sliding effect -->
        <script src="views/js/slide.js" type="text/javascript"></script>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="views/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="views/css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
    </head>
    <body>

        <div class="container">
            <div class="header">
            <!-- Panel -->
            <div id="toppanel">
                <div id="panel">
                    <div class="content clearfix">
                        <div class="left">
                            <!-- Login Form -->
                            <form class="clearfix" method="post" action="index.php?ctrl=User&act=ShowProfile" ><!---->
                                <h2>Войти</h2>
                                <label class="grey" for="log">Email:</label>
                                <input type="email" name="email" id="log" value="" size="23" />
                                <label class="grey" for="pwd">Пароль:</label>
                                <input class="field" type="password" name="password" id="pwd" size="23" />
                                <label><input name="remember" id="rememberme" type="checkbox" checked="checked" value="forever" />&nbspЗапомнить меня </label>
                                <div class="clear"></div>
                                <input type="submit" name="login" value="войти" class="bt_login" />
                                <a class="lost-pwd" href="index.php?ctrl=User&act=Recover">Забыл пароль</a>
                            </form>
                        </div>
                    </div>
                </div> <!-- /login -->
                <!-- The tab on top -->
                <div class="tab">
                    <ul class="login">
                        <li id="toggle">
                            <?=$user?>
                        </li>
                    </ul>
                </div> <!-- / top -->
            </div> <!--panel -->
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
                <!--
                <a href="index.php?ctrl=User&act=ShowProfile">LOGIN</a>
                -->
            </div>



            <ul class="ca-menu">
                    <li>
                        <a href="index.php?ctrl=Masters">
                            <span class="ca-icon"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Мастера</h2>
                                <h3 class="ca-sub">Сделают любую работу</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?ctrl=Org">
                            <span class="ca-icon"> </span>
                            <div class="ca-content">
                                <h2 class="ca-main">Строительные организации</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?ctrl=Shop">
                            <span class="ca-icon"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Магазины</h2>
                                <h3 class="ca-sub">Строительных материалов, инструмента...</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?ctrl=Rent">
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



           <?php echo $content;?>

        <script type="text/javascript" src="views/jquery1.6.4.min.js"></script>
    </body>
</html>