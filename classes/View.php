<?php

class View
{
    protected $data = array();

    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }


   /* public  function  __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public  function  __get($v)
    {
        return $this->data = $v;
    }*/

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

    public function display($template)
    {
        echo $this->render($template);
    }

}