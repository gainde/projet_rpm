<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projet
 *
 * @author Moussa Thimbo
 */

require_once 'Bean.php';

class Projet extends Bean {
    private $id;
    private $titre;
    private $description;
    private $contenu;
    private $image;
    private $date_creation;
    private $date_fin;
    private $url;

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

    public function getDate_creation() {
        return $this->date_creation;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDate_fin() {
        return $this->date_fin;
    }

    public function getUrl() {
        return $this->url;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    function setDate_fin($date_fin) {
        $this->date_fin = $date_fin;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    
    public function getVars() {
        return $this->getLinks(get_object_vars($this));
    }

    public function __toString() {
        $chaine = 'id : ' . $this->id . '<br>';
        $chaine .= 'titre : ' . $this->titre . '<br>';
        $chaine .= 'description : ' . $this->description . '<br>';
        $chaine .= 'contenu : ' . $this->contenu . '<br>';
        $chaine .= 'url : ' . $this->url . '<br>';
        $chaine .= 'date_creation : ' . $this->date_creation . '<br>';
        $chaine .= 'date_fin : ' . $this->date_fin . '<br>';
        return $chaine;
    }
}
