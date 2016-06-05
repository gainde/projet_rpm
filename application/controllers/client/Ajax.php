<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxContent
 *
 * @author oussou
 */
class Ajax extends Client_Controller{
     function __construct() {
          parent::__construct();
    }
    
    function subdomaine($params) {
        $domaineDao = new DomaineDao(new Domaine());
        $list = $domaineDao->getAllDataActive(array("id_service"=>"$params"));
        $field =  "0";
        if(!$list){
           $serviceDao = new ServiceDao(new Service());
           $list = $serviceDao->read($params);
           $field =  "1";
        }
        $result  = array("domaines" => $list,"field" =>$field);
        $this->set($result);
        $this->partialView('subdomaine');
    }
}
