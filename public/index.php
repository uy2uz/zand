<?php

/* 
 * Entry point.
 */
error_reporting(-1);

use vendor\core\Router;

$query = ltrim($_SERVER['REQUEST_URI'], '/');

require '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'functions.php';


spl_autoload_register(function ($class){
    
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    
    if(file_exists($file)){
        require_once $file;
    }
});

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');



Router::dispetch($query);
