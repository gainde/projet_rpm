<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LinkDao
 *
 * @author oussou
 */
require_once WEBROOT.'core/DAO.php';
require_once (WEBAPPROOT.'bean/Link.php');
class LinkDao extends DAO {

    public function __construct(\Link $links = null) {
        parent::__construct($links?$links->getVars():array());
        $this->pk = 'id';
        $this->table = 'link';
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
    public function getAllDataActive($where='') {
        return $this->selectAllActive($this->table,'*',$where);
    }
}
