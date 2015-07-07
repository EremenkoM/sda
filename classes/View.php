<?php


class View
{
    protected $data = [];

    public  function  __set($k, $v)
    {
        $this->data[$k] = $v;
    }


    public  function  __get($v)
    {
        return $this->data = $v;
    }


    public  function render ($template)
    {
        foreach ($this->data as $key => $val){
            $$key = $val;
        }
        ob_start();
        $goods = Search::findAllGoods();
        //$user = $this->userLoginStatus();
        $prof = Search::findAllProf();
        $city = Search::findAllCity();

        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;

    }

    public function view_include($fileName, $vars = [])
    {
        // Устанавливаем переменные
        foreach($vars as $key => $value)
            $$key = $value;

        // Генерация HTML в строку.
        ob_start();
        $user = $this->userLoginStatus();
       // $prof = Search::findAllProf();
        //$city = Search::findAllCity();

        include $fileName;
        return ob_get_clean();
    }

    public function display($template)
    {
        $v = $this->render($template);
        $path = __DIR__ . '/../views/index.php';
        echo $this->view_include($path, ['content' => $v]);
    }
    public function displayLk($template)
    {
        $v = $this->render($template);
        $path = TMP . '/lk/main.tpl2.php';
        echo $this->view_include($path, ['content' => $v]);
    }
    public function displayLogin($template)
    {
        $v = $this->render($template);
        $path = TMP . '/lk/main.tpl.php';
        echo $this->view_include($path, ['content' => $v]);
    }


    public function userLoginStatus(){
        if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']) || isset($_COOKIE['user_id'])){
            $id = $_SESSION['user']['id'];
            $user = new User();
            $val = $user->oneUserData($id);
            return $html =
                "
                <a id=\"email\" href=\"index.php?ctrl=User&act=ShowProfile\">" . $val->email ."</a>
                <a id=\"out\" href=\"logout\">выйти</a>
                ";
        }else{
            return $html =
                "
                <a id=\"open\" class=\"open\" href=\"#\">Вход</a>
                <a id=\"close\" style=\"display: none;\" class=\"close\" href=\"#\">Закрыть</a>
                <a id=\"sign\" href=\"index.php?ctrl=User&act=SignProfile\">Регистрация</a>
                ";
        }

    }
}