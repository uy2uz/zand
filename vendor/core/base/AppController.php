<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor\core\base;

/**
 * Description of Controller
 *
 * @author akuryakov
 */
abstract class AppController {
    
    public $route = [];
    public $view;
    public $layout;

    public function __construct($route) {
        $this->route = $route;
        $this->view = $route['action'];
        //include APP . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 
        //        $route['controller'] . DIRECTORY_SEPARATOR . $this->view . '.php';
    }
    public function getView()
    {
        d($this->route);
        $viewObj = new View($this->route, $this->layout, $this->view);
        $viewObj->render();
    }
    
}
