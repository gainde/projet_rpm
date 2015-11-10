<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author Moussa
 */
class Model {
    protected $linkObject;
    
    public function __construct() {
    }
    
    protected function getLinks($data){
        foreach ($this->linkObject as $value){
            var_dump($data[$value]);
            $data[$value] = $data[$value]->getId();
        }
        unset($data['linkObject']);
        return $data;
    }
}
