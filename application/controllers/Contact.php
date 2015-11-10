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
class Contact extends Controller{
    function __construct() {
        
    }
    
    function index() {
        $this->render('contact');
    }
    
    function processcontact(){
        $this->includeFile("processcontact");
    }
}
