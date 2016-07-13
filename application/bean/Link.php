<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Link
 *
 * @author oussou
 */
class Link extends Bean{
    private $id = '';
    private $id_project;
    private $id_service;
    private $id_domaine;
    private $general;

    public function __construct(array $params = array()) {
        if(!empty($params)){
            $vars = get_object_vars($this);
            foreach($params as $k=>$v){
                if(array_key_exists($k, $vars)) {
                    $this->{$k}=$v;
                }
            }
        }
    }
    public function getVars(){
        return $this->getLinks(get_object_vars($this));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getId_project() {
        return $this->id_project;
    }

    public function getId_service() {
        return $this->id_service;
    }

    public function getId_domaine() {
        return $this->id_domaine;
    }

    public function getGeneral() {
        return $this->general;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setId_project($id_project) {
        $this->id_project = $id_project;
    }

    public function setId_service($id_service) {
        $this->id_service = $id_service;
    }

    public function setId_domaine($id_domaine) {
        $this->id_domaine = $id_domaine;
    }

    public function setGeneral($general) {
        $this->general = $general;
    }

}

