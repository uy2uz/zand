<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11.04.19
 * Time: 23:41
 */

namespace vendor\core\base;



class View
{
    public $route = [];

    public $view;

    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }
    public function render ()
    {
        d($this->route);
        $file_view = APP . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $this->route['controller'] . DIRECTORY_SEPARATOR . $this->view . '.php';

        if (is_file($file_view)){
            require $file_view;
        } else {
            echo 'не найден вид';
        }
    }
}