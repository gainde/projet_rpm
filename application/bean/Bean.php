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
abstract class Bean {
    protected $linkObject = array();
    
    public function __construct() {
    }
    
    protected function getLinks($data){
        foreach ((array) $this->linkObject as $value){
            $data[$value] = $data[$value]->getId();
        }
        unset($data['linkObject']);
        return $data;
    }
    
    protected function avoidLinks($data, $array){
        foreach ((array) $array as $value){
            unset($data[$value]);
        }
        return $data;
    }
}
