<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;


/**
 * Description of Page
 *
 * @author akuryakov
 */
class Page extends App {
    public function viewAction()
    {
        d($this->route);
        echo __METHOD__;
        d($_GET);
    }
}
