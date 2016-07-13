<?php
require_once (WEBAPPROOT.'models/ProjetDao.php');
require_once (WEBAPPROOT.'models/LinkDao.php');
require_once (WEBAPPROOT.'models/ServiceDao.php');
require_once (WEBAPPROOT.'models/DomaineDao.php');
/* 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ajax
 *
 * @author oussou
 */
class Ajax extends Admin_Controller{
     function __construct() {
          parent::__construct();
    }
    
    function subdomaine($params) {
        $domaineDao = new DomaineDao(new Domaine());
        $list = $domaineDao->getAllDataActive(array("id_service"=>"$params"));
        if(!$list){
           $serviceDao = new ServiceDao(new Service());
           $list = $serviceDao->read($params);
           
        }
        $result  = array("domaines" => $list,'active'=>"0");
        $this->set($result);
        $this->partialView('subdomaine');
    }
    function subdomaineName($params,$idproj) {
        $nameDomain = array();
            //$domaine_post = $domaine;
            $linkdao = new LinkDao(new Link());
            $list1 = $linkdao->getAllDataActive(array('id_project'=>"$idproj",'id_service'=>"$params"));
            $serviceDao = new ServiceDao(new Service());
            $service = $serviceDao->read($params);
            foreach($list1 as $value){
                $id_dom = $value->getId_domaine();
                $domainedao = new DomaineDao(new Domaine());
                $list = $domainedao->read($id_dom);
                $nameDomain[]= $list->getTitre();
            }
           
            $result  = array("serviceName" => $service->getTitre(),'domainesName'=>$nameDomain,'active'=>"1");
            $this->set($result);
            $this->partialView('subdomaine');
       }
}