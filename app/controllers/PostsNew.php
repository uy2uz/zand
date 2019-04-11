<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostsNew
 *
 * @author akuryakov
 */
namespace app\controllers;


class PostsNew extends App {
    public function __construct() {
        echo 'объект класса' . __CLASS__ . ' создан ';
    }
    
    public function indexAction(){
        echo 'Метод ' . __METHOD__ . ' запущен.';
    }
    
    public function testAction(){
        echo 'Метод ' . __METHOD__ . ' запущен.';
    }
    
    public function testPageAction(){
        echo 'Метод ' . __METHOD__ . ' запущен.';
    }
    
    public function before(){
        echo 'Метод ' . __METHOD__ . ' запущен.';
    }
}
