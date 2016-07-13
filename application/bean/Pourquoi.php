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
    private $id_page;
    
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
    public function getId() {
        return $this->id;
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
    public function getId_page() {
        return $this->id_page;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setDescription($desc) {
        $this->description = $desc;
    }
    
    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }
    public function setId_page($id_page) {
       $this->id_page = $id_page;
    }
    public function getVars() {
        return $this->getLinks(get_object_vars($this));
    }

    public function __toString() {
        $chaine = 'id : ' . $this->id . '<br>';
        $chaine .= 'titre : ' . $this->titre . '<br>';
        $chaine .= 'description : ' . $this->description . '<br>';
        $chaine .= 'description : ' . $this->contenu . '<br>';
        $chaine .= 'id_page : ' . $this->id_page . '<br>';
        return $chaine;
    }
}
