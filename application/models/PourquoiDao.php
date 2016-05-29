<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once WEBROOT.'core/DAO.php';
require_once (WEBAPPROOT.'bean/Pourquoi.php');
class PourquoiDao extends DAO{

    public function __construct(\Pourquoi $pourquoi) {
        parent::__construct($pourquoi->getVars());
        $this->pk = 'id';
        $this->table = 'pourquoi';
    }

    public function test() {
        var_dump($this->variables);
    }
    public function getDataById() {
        return $this->read();
    }
    public function getAllData() {
        return $this->selectAll($this->table);
    }
}