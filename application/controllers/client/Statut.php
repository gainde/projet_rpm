<?php
require_once WEBAPPROOT.'bean/Projet.php';
require_once (WEBAPPROOT.'models/ProjetDao.php');
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
class Statut extends Client_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->render('projets-realisations');
    }
    function projets() {
        $this->set($this->getListProjetsActives());
        $this->setSubMenu("projets");
        $this->render('projets/projets');
    }
    function projet($params=null) {
        $projetDao = new ProjetDao(new Projet());
        $list = $projetDao->read($params);
        $this->set(array("projet" => $list));
             
        //$this->setSubMenu("projets");
        $this->render('projet');
    }
    function realisations() {
        echo 'page realisation';
    }
    
    
    function getListProjets(){
        $projetDao = new ProjetDao(new Projet());
        $list = $projetDao->getAllData();
        return array('projets'=>$list);
    }
     function getListProjetsActives(){
        $projetDao = new ProjetDao(new Projet());
        $where = array("statut"=>'1');
        $list = $projetDao->getAllDataActive($where);
        return array('projets'=>$list);
    }
}
