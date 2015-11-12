<?php
require_once WEBROOT.'core/DAO.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adresseDao
 *
 * @author Moussa Thimbo
 */
class AdresseDao extends DAO{

    public function __construct(\Adresse $adresse) {
        parent::__construct($adresse->getVars());
        $this->pk = 'id';
        $this->table = 'adresse';
    }

    public function test() {
        var_dump($this->variables);
    }
}
