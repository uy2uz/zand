<?php


/**
 * Description of Posts
 *
 * @author akuryakov
 */
namespace app\controllers;



class Posts extends App {
    
    
    public function indexAction(){
        echo 'Метод ' . __METHOD__ . ' запущен.';
    }
    
    public function testAction(){
        echo 'Метод ' . __METHOD__ . ' запущен.';
    }
}
