<?php
require_once WEBAPPROOT.'bean/Projet.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Statut
 *
 * @author Moussa
 */
class Statut extends Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->render('projets-realisations');
    }
    function projets() {
        $this->set($this->getListProjets());
        $this->setSubMenu("projets");
        $this->render('projets/projets');
    }
    function realisations() {
        echo 'page realisation';
    }
    
    
    function getListProjets(){
        $list = array(
            new Projet(array(
            'id' => "1",
            'titre' => "Premier Projet Titre",
            'description' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                  Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                  dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                  Aliquam in felis sit amet augue.</p>",
            'url' => "",
            'date_creation' => "12/12/2015",
            'image' => "//placehold.it/100")),
            
            new Projet(array(
            'id' => "2",
            'titre' => "Deuxieme Projet Titre",
            'description' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                  Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                  dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                  Aliquam in felis sit amet augue.</p>",
            'url' => "",
            'date_creation' => "12/12/2015",
            'image' => "//placehold.it/100")),
            
            new Projet(array(
            'id' => "3",
            'titre' => "Troisième Projet Titre",
            'description' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                  Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                  dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                  Aliquam in felis sit amet augue.</p>",
            'url' => "",
            'date_creation' => "12/12/2015",
            'image' => "//placehold.it/100")),
            
            
            new Projet(array(
            'id' => "4",
            'titre' => "Quatrième Projet Titre",
            'description' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                  Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                  dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                  Aliquam in felis sit amet augue.</p>",
            'url' => "",
            'date_creation' => "12/12/2015",
            'image' => "//placehold.it/100")),
        );
        
        return array('projets'=>$list);
    }
}
