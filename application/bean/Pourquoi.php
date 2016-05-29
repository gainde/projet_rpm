<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Bean.php';
class Pourquoi extends Bean {

    private $id;
    private $titre;
    private $description;
    private $contenu;
    
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

    public function getContenu() {
        return $this->contenu;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setDescription($desc) {
        $this->description = $desc;
    }
    
    public function setContenu($contenu) {
        return $this->contenu = $contenu;
    }
    
    public function getVars() {
        return $this->getLinks(get_object_vars($this));
    }

    public function __toString() {
        $chaine = 'id : ' . $this->id . '<br>';
        $chaine .= 'titre : ' . $this->titre . '<br>';
        $chaine .= 'description : ' . $this->description . '<br>';
        $chaine .= 'description : ' . $this->contenu . '<br>';
        return $chaine;
    }
}
