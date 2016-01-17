<?php
require_once (WEBAPPROOT.'models/ServiceDao.php');

class Controller {
    protected $vars = array();
    protected $js = array();
    protected $css = array();
    
    function __construct() {
        
    }
    function set($tab){
        $this->vars = $tab;
    }
    
    function render($filename){
        
        require_once(WEBROOT.'tpl/SmartyBC.class.php');
        $addmarging = (get_class($this) === "Accueil")? "" : "margin_bottom40";
        $tpl = new SmartyBC();
        if(!empty($this->vars)){
            foreach ($this->vars as $key => $value) {
                $tpl->assign($key, $value);
            }
        }
        $tpl->assign('addmarging', $addmarging);
        $tpl->assign('WEBROOT', WEBROOT);
        $tpl->assign('APPROOT', APPROOT);
        $tpl->assign('ROOT', ROOT);
        $tpl->assign('User', $this->getUser());
        $tpl->assign('services', $this->getServices());
        //$nav_bar_tpl = WEBAPPROOT.'views/nav-bar.tpl';
        //$tpl->assign('navbar_tpl', $nav_bar_tpl);
        $tpl->display(WEBAPPROOT.'views/header.tpl');
        $tpl->display(WEBAPPROOT.'views/nav-bar.tpl');
        $tpl->display(WEBAPPROOT.'views/'.strtolower (get_class($this)).'/'.$filename.'.tpl');
        $modal_tpl = WEBAPPROOT.'views/login-register/modal_login.tpl';
        //var_dump($this->getUser());
        $tpl->assign('modal_tpl', $modal_tpl);
        $tpl->display(WEBAPPROOT.'views/footer.tpl');


        //require(WEBAPPROOT.'views/'.strtolower (get_class($this)).'/'.$filename.'.html');
    }
    
    function includeFile($filename){
        require(WEBAPPROOT.'views/'.strtolower (get_class($this)).'/'.$filename.'.php');
    }
    
    function load_css(){
        $this->css[] = 'http://fonts.googleapis.com/css?family=Bree+Serif';
        $this->css[] = 'http://fonts.googleapis.com/css?family=Philosopher';
        $this->css[] = 'http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300';
        $this->css[] = $WEBROOT."ressources/css/bootstrap.min.css";
        $this->css[] = $WEBROOT."ressources/css/font-awesome.min.css";
        $this->css[] = $WEBROOT."ressources/css/style.css";
        
    }
    
    function load_js(){ 
    }
    
    function getUser(){
        require_once WEBAPPROOT . 'security/AuthentificationManager.php';
        $auth = new AuthentificationManager();
        //print_r($auth->getUser());
        //$user = UserSession::getUser();
        return $auth->getUser();
    }
    
    function getServices() {
        $dao = new ServiceDao(new Service());
        $services = $dao->getAllData();
        return $services;
    }
    

}