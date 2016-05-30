<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Moussa
 */
class Contact extends Client_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->render('contact');
    }
    
    function processcontact(){
        $this->includeFile("processcontact");
    }
}
