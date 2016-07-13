<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Adresse
 *
 * @author Moussa
 */
class Adresse extends Bean{
    private $id = '';
    private $numero;
    private $rue;
    private $ville;
    private $code_postal;
    private $province;
    private $pays;
    private $id_user;
    
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

    public function getNumero() {
        return $this->numero;
    }

    public function getRue() {
        return $this->rue;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getCode_postale() {
        return $this->code_postal;
    }

    public function getProvince() {
        return $this->province;
    }

    public function getPays() {
        return $this->pays;
    }
    public function getIdUser() {
        return $this->id_user;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setRue($rue) {
        $this->rue = $rue;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setCode_postale($code_postale) {
        $this->code_postal = $code_postale;
    }

    public function setProvince($province) {
        $this->province = $province;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }
    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }


    
}
