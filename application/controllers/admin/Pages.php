<?php
require_once (WEBAPPROOT.'models/PourquoiDao.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Pages extends Admin_Controller{
    
    function __construct($isAdmin = false) {
          parent::__construct();
          /*$this->header = "admin/header.tpl";
          $this->footer ="admin/footer.tpl";*/
    }
    function index(){
        //$this->set($this->getListMembres());
        $pourquoiDao = new PourquoiDao(new Pourquoi());
        $list = $pourquoiDao->getAllData();
        $this->set(array("allpages" => $list));
        $this->render('pages');
    }
    function pourquoi(){// page pourquoi default id_page = 1
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
                $array_projet = array('titre' => "pourquoi",
                                    'description' => "Page pourquoi devenir membre",
                                    'contenu' =>"$contenu",
                                    'id_page' =>"1"
                    );
                $page = $this->pageExist(array('id_page'=>1));
                if(!$page){
                $pourquoiDao = new PourquoiDao(new Pourquoi($array_projet));
                $pourquoiDao->create();
                }else{
                  $id = $page->getId();
                  $page->setContenu($contenu);
                  $pourquoiDao = new PourquoiDao($page); 
                  $pourquoiDao->update($id);
                }
                $file = WEBROOT.'application/views/client/pourquoi/contenu_pourquoi.tpl';
                // Open the file to get existing content
                //$current = file_get_contents($file);
                // Append a new person to the file
                $current = $contenu;
                // Write the contents back to the file
                file_put_contents($file, $current);
                 $this->redirect('admin/pages');
            }
        }
        //$this->set($this->getListMembres());
        $page = $this->pageExist(array('id_page'=>1));
        $this->set(array("page" => $page));
        $this->render('pourquoi');
    }
    function actualite(){// page pourquoi default id_page = 2
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
                $array_projet = array('titre' => "actualite",
                                    'description' => "Page actualite",
                                    'contenu' =>"$contenu",
                                    'id_page' =>"2"
                    );
                $page = $this->pageExist(array('id_page'=>2));
                if(!$page){
                $pourquoiDao = new PourquoiDao(new Pourquoi($array_projet));
                $pourquoiDao->create();
                }else{
                  $id = $page->getId();
                  $page->setContenu($contenu);
                  $pourquoiDao = new PourquoiDao($page); 
                  $pourquoiDao->update($id);
                }
                $file = WEBROOT.'application/views/client/actualites/contenu_actualite.tpl';
                // Open the file to get existing content
                //$current = file_get_contents($file);
                // Append a new person to the file
                $current = $contenu;
                // Write the contents back to the file
                file_put_contents($file, $current);
                $this->redirect('admin/pages');
            }
        }
        //$this->set($this->getListMembres());
        $page = $this->pageExist(array('id_page'=>2));
        $this->set(array("page" => $page));
        $this->render('pourquoi');
    }
    function apropos(){// page pourquoi default id_page = 3
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
                $array_projet = array('titre' => "apropos",
                                    'description' => "Page actualite",
                                    'contenu' =>"$contenu",
                                    'id_page' =>"3"
                    );
                $page = $this->pageExist(array('id_page'=>3));
                if(!$page){
                $pourquoiDao = new PourquoiDao(new Pourquoi($array_projet));
                $pourquoiDao->create();
                }else{
                  $id = $page->getId();
                  $page->setContenu($contenu);
                  $pourquoiDao = new PourquoiDao($page); 
                  $pourquoiDao->update($id);
                }
                $file = WEBROOT.'application/views/client/apropos/contenu_apropos.tpl';
                // Open the file to get existing content
                //$current = file_get_contents($file);
                // Append a new person to the file
                $current = $contenu;
                // Write the contents back to the file
                file_put_contents($file, $current);
                $this->redirect('admin/pages');
            }
        }
        //$this->set($this->getListMembres());
        $page = $this->pageExist(array('id_page'=>3));
        $this->set(array("page" => $page));
        $this->render('pourquoi');
    }
    function pageExist($where){
        $pourquoiDao = new PourquoiDao(new Pourquoi());
        //$where = array('email'=>"$email");
        return  $pourquoiDao->getRow($where);
    }
}