<?php
require_once (WEBAPPROOT.'models/ProjetDao.php');
require_once (WEBAPPROOT.'models/UserDao.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin extends Controller{
    
    function __construct() {
          parent::__construct();
          $this->load_css();
          $this->load_js();
          $this->header = "admin/header.tpl";
          $this->footer ="admin/footer.tpl";
    }
    
    function index() {
        $this->render('index');
    }
    
    function projets($request = null) {
        if($request== null){
        $this->set($this->getListProjets());
        $this->render('projets/projets');
        }else if($request == 'creer_projet'){
            $erreur_array = array('name'=>-1,'description'=>-1,'contenu'=>-1,'from'=>-1,'to'=>-1);
            $erreur = false;
            //POST
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if($_POST['name'] == ''){
                    $erreur_array['name'] = 1;
                    $erreur = true;
                }else{
                    $name = trim($_POST['name']);
                    $erreur_array['name'] = 0;
                }
                if($_POST['description'] == ''){
                    $erreur_array['description'] = 1;
                    $erreur = true;
                }else{
                    $description = $_POST['description'];
                     $erreur_array['description'] = 0;
                }
                if($_POST['contenu'] == ''){
                    $erreur_array['contenu'] = 1;
                    $erreur = true;
                }else{
                    $contenu = $_POST['contenu'];
                     $erreur_array['contenu'] = 0;
                }
                if($_POST['from'] == ''){
                    $erreur_array['from'] = 1;
                    $erreur = true;
                }else{
                    $from = $_POST['from'];
                    $erreur_array['from'] = 0;
                    $dtFrom = DateTime::createFromFormat('m/d/Y', $from)->format('Y-m-d');
                }
                if($_POST['to'] == ''){
                    $erreur_array['to'] = 1;
                    $erreur = true;
                }else{
                    $to = $_POST['to'];
                    $erreur_array['to'] = 0;
                    $dtTo = DateTime::createFromFormat('m/d/Y', $to)->format('Y-m-d');
                }
                if(isset($_FILES['imgp'])){
                    $dir = WEBROOT."ressources/images/projets/";
                    $url =$_FILES['imgp']['name'];
                    $name_image = $_FILES['imgp']['name'];
                    if(isset($_POST['nameimg'])){
                        $name_image = trim($_POST['nameimg']);
                    }
                    $erreur = $this->uploadImage($_FILES['imgp'],$dir);
                }else{
                    $url = "";
                    $name_image = "";
                }
                if(!$erreur ){
                    $array_projet = array(
                                            'titre' => "$name",
                                            'description' => "$description",
                                            'contenu' =>"$contenu",
                                            'url' => "$url",
                                            'date_creation' => $dtFrom,
                                            'date_fin' => $dtTo,
                                            'image' => "$name_image");
                    $projetDao = new ProjetDao(new Projet($array_projet));
                    $projetDao->create();
                    $this->set($this->getListProjets());
                    $this->render('projets/projets');
                }
            }else{
           
                $this->set(array('erreur_array'=>$erreur_array,'erreur'=>$erreur));
                $this->render('projets/creer_projet');
            }
        }else if(substr($request, 0,13)  == 'editer_projet'){
                 $projetDao = new ProjetDao(new Projet());
                 $list = $projetDao->find('1');
                 $this->set(array("projets" => $list));
                $this->render('projets/editer_projet');
        }else{
            echo 'erreur 404 doit etre lancé';
        }
    }
    
    function membres($request = null){
        if($request== null){
            $this->set($this->getListMembres());
            $this->render('membres/liste_membres');
        }else{
            if($request == 'add_membre'){
                $this->render('membres/add_membre');
            }
            else{
                echo 'erreur 404 doit etre lancé';
            }
        }
    }
    
    function load_css(){  
        $this->css = $this->menuHelper->getCss('admin');
    }
    
    function load_js(){ 
        $this->js = $this->menuHelper->getJs('admin');
    }
    function getListProjets(){
       $projetDao = new ProjetDao(new Projet());
       $list = $projetDao->getAllData();
       return array("projets" => $list);
    }
    function getListMembres(){
        $userDao = new UserDao(new User());
        $list = $userDao->getAllData();
       return array("membres" => $list);
    }
    function uploadImage($name,$dir){
      header('Content-Type: text/plain; charset=utf-8');
      $errors = array();
      $err = true;
      $file_name = $name['name'];
      $file_size = $name['size'];
      $file_tmp = $name['tmp_name'];
      $file_type = $name['type'];
      $file_ext=strtolower(end(explode('.',$name['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$dir.$file_name);
         echo "Success";
      }else{
          $err = false;
      }
      return $err;
    }
}