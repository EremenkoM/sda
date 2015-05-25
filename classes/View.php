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
        include $fileName;
        return ob_get_clean();
    }

    public function display($template)
    {
        $v = $this->render($template);
        $path = __DIR__ . '/../views/index.php';
        echo $this->view_include($path, ['content' => $v]);
    }

}
/*
// Внутренний шаблон.
$content = view_include('views/start.php');

// Внешний шаблон.
$page = view_include(
    'views/index.php',
    array('title' => $title, 'content' => $content));
*/
// Вывод.
//echo $page;