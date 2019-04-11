<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author akuryakov
 */
namespace app\controllers;


class Main extends App {


    public function indexAction(){
        echo 'Метод ' . __METHOD__ . ' запущен.';
    }
}
