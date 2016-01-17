<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DomaineDao
 *
 * @author Moussa Thimbo
 */
class DomaineDao extends DAO{

    public function __construct(\Domaine $domaine) {
        parent::__construct($domaine->getVars());
        $this->pk = 'id_service';
        $this->table = 'domaine';
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
