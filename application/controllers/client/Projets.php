<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projets
 *
 * @author Moussa Thimbo
 */
class Projets extends Client_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->render('apropos');
    }
}
