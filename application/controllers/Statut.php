<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Statut
 *
 * @author Moussa
 */
class Statut extends Controller{
    function __construct() {
        
    }
    
    function index() {
        $this->render('projets-realisations');
    }
    function projet() {
        echo 'page projet';
    }
    function realisation() {
        echo 'page realisation';
    }
}
