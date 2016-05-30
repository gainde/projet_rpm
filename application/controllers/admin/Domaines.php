<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Services
 *
 * @author oussou
 */
class Domaines extends Admin_Controller{
    
    function __construct($isAdmin = false) {
          parent::__construct();
          /*$this->load_css();
          $this->load_js();
          $this->header = "admin/header.tpl";
          $this->footer ="admin/footer.tpl";*/
    }
    function index() {
        if(isset($_POST['check'])){
            $deleteDomaine = $_POST['check'];

            foreach($deleteDomaine as $value){
                $domaineDao = new DomaineDao(new Domaine());
                $list = $domaineDao->read($value);
                $list->setStatut(-1);
                $domaineDao = new DomaineDao($list);
                $domaineDao->update($value);
            }
        }
        $this->set($this->getListDomaines());
        $this->render('domaines');
    }
    function creer_domaine() {
        $erreur_array = array('name'=>-1,'description'=>-1,'contenu'=>-1,'from'=>-1,'to'=>-1);
            $erreur = false;
            //POST
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $array_domaines  = $this->postDomaine($erreur_array,$erreur);
                if(!$erreur ){
                    $domaine = new Domaine($array_services);
                    $domaineDao = new DomaineDao($domaine);
                    $domaineDao->create();$id = $db->lastInsertId();
                    $id = $domaineDao->getLastID();
                    $nameDomaine = $domaine->getTitre();
                    $this->redirect('admin/creer_service/'.$id.'/'.$nameDomaine);
                }else{
                    $this->set(array('erreur_array'=>$erreur_array,'erreur'=>$erreur));
                    $this->render('creer_service');
                }
            }else{
           
                $this->set(array('erreur_array'=>$erreur_array,'erreur'=>$erreur));
                $this->render('creer_service');
            }
    }
    function editer_service($params) {
        $erreur_array = array('name'=>-1,'description'=>-1,'contenu'=>-1,'from'=>-1,'to'=>-1);
            $erreur = false;
            //POST
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $array_services  = $this->postProject($erreur_array,$erreur);
              
                if(!$erreur ){
                    $serviceDao = new ServiceDao(new Service($array_services));
                    $serviceDao->update($params);
                    $this->redirect('admin/services');
                }else{
                    $this->set(array('erreur_array'=>$erreur_array,'erreur'=>$erreur));
                    $this->render('editer_service');
                }
            }else{
                 $serviceDao = new ServiceDao(new Service());
                 $list = $serviceDao->read($params);
                 $this->set(array("service" => $list));
                 $this->render('editer_service');
            }
    }
    
    function supprimer_service($params) {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $deleteServices = $_POST['check'];
                $serviceDao = new ServiceDao(new Service());
                $list = $serviceDao->read($deleteServices );
                $list->setStatut(-1);
                $serviceDao = new ProjetDao($list);
                $serviceDao->update($deleteProjects);
                $this->redirect('admin/services');
            }
             $serviceDao = new ServiceDao(new Service());
             $list = $serviceDao->read($params);
             $this->set(array("service" => $list));
             $this->render('supprimer_service');
        
    }
    function ajouter_input_domaine() {
        echo ' <div class="input-group input-group-lg">
            <label class="bg-label">Domaine :</label>
            <input  type="text" name="domaine[]" class="form-control" placeholder="domaine">
        </div>';
    }
    function getListDomaines(){
       $domaineDao = new DomaineDao(new Domaine());
       $list = $domaineDao->getAllData();
       return array("domaines" => $list);
    }
    function postDomaine(&$erreur_array,&$erreur){
        //POST
        if($_POST['name'] == ''){
            $erreur_array['name'] = 1;
            $erreur = true;
        }else{
            $name = trim($_POST['name']);
            $name = $this->resizeString($name,100);
            $erreur_array['name'] = 0;
        }
        if($_POST['idservice'] == ''){
            $erreur_array['idservice'] = 1;
            $erreur = true;
        }else{
            $idservice = $_POST['idservice'];
            $erreur_array['idservice'] = 0;
        }
        if($_POST['description'] == ''){
            $erreur_array['description'] = 1;
            $erreur = true;
        }else{
            $description = $_POST['description'];
            $description = $this->resizeString($description,100);
            $erreur_array['description'] = 0;
        }
        return $array_projet = array(
                                        'id_service' =>"$idservice",
                                        'titre' => "$name",
                                        'description' => "$description"
                                        );
    }
}
