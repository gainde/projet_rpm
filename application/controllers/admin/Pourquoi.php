<?php
require_once (WEBAPPROOT.'models/PourquoiDao.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Pourquoi extends Admin_Controller{
    
    function __construct($isAdmin = false) {
          parent::__construct();
          /*$this->header = "admin/header.tpl";
          $this->footer ="admin/footer.tpl";*/
    }
    function index(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
             $erreur = false;
            if($_POST['contenu'] == ''){
                $erreur_array['contenu'] = 1;
                $erreur = true;
            }else{
                $contenu = $_POST['contenu'];
                 $erreur_array['contenu'] = 0;
            }
            if(!$erreur ){
                $array_projet = array('titre' => "Pourquoi devenir membre",
                                    'description' => "Devenir membre est devenir mouride",
                                    'contenu' =>"$contenu");
                $pourquoiDao = new PourquoiDao(new Pourquoi($array_projet));
                $pourquoiDao->create();
                $file = WEBROOT.'application/views/pourquoi/contenu_pourquoi.tpl';
                // Open the file to get existing content
                //$current = file_get_contents($file);
                // Append a new person to the file
                $current = $contenu;
                // Write the contents back to the file
                file_put_contents($file, $current);
                //$this->redirect('admin');
            }
        }
        //$this->set($this->getListMembres());
        $pourquoiDao = new PourquoiDao(new Pourquoi());
        $list = $pourquoiDao->getAllData();
        $this->set(array("pourquoi" => $list));
        $this->render('pourquoi/pourquoi');
    }
}