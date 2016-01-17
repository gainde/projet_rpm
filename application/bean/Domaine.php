<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Domaine
 *
 * @author Moussa Thimbo
 */
require_once (WEBAPPROOT.'bean/Bean.php');

class Domaine extends Bean {

    private $id;
    private $titre;
    private $description;

    public function __construct(array $params = array()) {
        if (!empty($params)) {
            $vars = get_object_vars($this);
            foreach ($params as $k => $v) {
                if (array_key_exists($k, $vars)) {
                    $this->{$k} = $v;
                }
            }
        }
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }


    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setDescription($desc) {
        $this->description = $desc;
    }

    public function setData(Array $data) {
        
    }

    public function getVars() {
        return get_object_vars($this);
    }

    public function __toString() {
        $chaine = 'id : ' . $this->id . '<br>';
        $chaine .= 'titre : ' . $this->titre . '<br>';
        $chaine .= 'description : ' . $this->description . '<br>';
        return $chaine;
    }
}
