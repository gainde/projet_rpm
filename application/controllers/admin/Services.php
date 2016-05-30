<?php
require_once (WEBAPPROOT.'models/ServiceDao.php');
require_once (WEBAPPROOT.'models/DomaineDao.php');
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
class Services extends Admin_Controller{
    
    function __construct($isAdmin = false) {
          parent::__construct();
          /*$this->load_css();
          $this->load_js();
          $this->header = "admin/header.tpl";
          $this->footer ="admin/footer.tpl";*/
    }
    function index() {
        if(isset($_POST['check'])){
            $deleteProjects = $_POST['check'];

            foreach($deleteProjects as $value){
                $this->deleteDomaine($value);
                $serviceDao = new ServiceDao(new Service());
                $serviceDao->delete($value);
            }
        }
        $this->render('services');
    }
    function creer_service() {
        $erreur_array = array('name'=>-1,'description'=>-1,'contenu'=>-1,'from'=>-1,'to'=>-1);
            $erreur = false;
            //POST
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $array_services  = $this->postService($erreur_array,$erreur);
                if(!$erreur ){
                    
                    $serviceDao = new ServiceDao(new Service($array_services));
                    $serviceDao->create();
                    //die(var_dump($array_services));
                    $idservice = $serviceDao->getLastID();
                    if(isset($_POST['domaine'])){
                        $array_id_domaine = $_POST['domaine'];
                        foreach($array_id_domaine as $keys => $id_domaine){
                            $descD = $_POST['descd'][$keys];
                            $array_domaine = array('id_service'=>"$idservice",
                                                    'titre' => "$id_domaine",
                                                    'description' => "$descD"
                                                  );
                                                  
                            $domaineDao = new DomaineDao(new Domaine($array_domaine));
                            $domaineDao->create();
                        }
                    }
                    $this->redirect('admin/services');
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
                $array_services  = $this->postService($erreur_array,$erreur);
              
                if(!$erreur ){
                    $serviceDao = new ServiceDao(new Service($array_services));
                    //die(var_dump($array_services));
                    $serviceDao->update($params);
                  
                    $array_id_domaine = $_POST['domaine'];
                    $this->deleteDomaine($params);
                    foreach($array_id_domaine as $keys => $id_domaine){
                        $descD = $_POST['descd'][$keys];
                        $array_domaine = array('id_service'=>"$params",
                                                'titre' => "$id_domaine",
                                                'description' => "$descD"
                                              );

                        $domaineDao = new DomaineDao(new Domaine($array_domaine));
                        $domaineDao->create();
                    }
                    $this->redirect('admin/services');
                }else{
                    $this->set(array('erreur_array'=>$erreur_array,'erreur'=>$erreur));
                    $this->render('editer_service');
                }
            }else{
                 $serviceDao = new ServiceDao(new Service());
                 $list = $serviceDao->read($params);
                 $id_service = $list->getId();
                
                 $domaineDao = new DomaineDao(new Domaine());
                 $where = array("id_service"=>"$id_service");
                 $list1 = $domaineDao->getAllDataActive($where);
              
                 $this->set(array("service" => $list,"domaines"=>$list1));
                 $this->render('editer_service');
            }
    }
    
    function supprimer_service($params) {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $deleteServices = $_POST['check'];
                $domaineDao = new DomaineDao(new Domaine());
                $list = $domaineDao->getAllDataActive(array("id_service"=>"$params"));
                foreach($list as $value){
                    $domaineDao = new DomaineDao(new Domaine());
                    $id_domaine = $value->getId();
                    $domaineDao->delete($id_domaine);
                }
                $serviceDao = new ServiceDao(new Service());
                $serviceDao->delete($params);
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
    function deleteDomaine($id_service){
        $domaineDao = new DomaineDao(new Domaine());
        $list = $domaineDao->getAllDataActive(array("id_service"=>"$id_service"));
        foreach($list as $value){
            $domaineDao = new DomaineDao(new Domaine());
            $id_domaine = $value->getId();
            $domaineDao->delete($id_domaine);
        }
        $serviceDao = new ServiceDao(new Service());
        $serviceDao->delete($params);
    }
   
    function postService(&$erreur_array,&$erreur){
        //POST
        if($_POST['name'] == ''){
            $erreur_array['name'] = 1;
            $erreur = true;
        }else{
            $name = trim($_POST['name']);
            $name = $this->resizeString($name,100);
            $erreur_array['name'] = 0;
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
                                        'titre' => "$name",
                                        'description' => "$description"
                                        );
    }
    function resizeString($chaine,$size){
        if(count_chars($chaine) > $size){
            return substr($chaine,0,$size-1);
        }else{
            return $chaine;
        }
    }
}
