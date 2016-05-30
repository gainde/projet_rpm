<?php
require_once (WEBAPPROOT.'models/ServiceDao.php');
require_once (WEBAPPROOT.'models/DomaineDao.php');
require_once (WEBAPPROOT.'libs/MenuHelper.php');
require_once (WEBAPPROOT.'libs/ArrayUtils.php');
require_once (WEBROOT.'system/Uri.php');


class Controller {
    protected $vars = array();
    protected $js = array();
    protected $css = array();
    protected $page_active = 'index';
    protected $sub_menu_active = '';
    protected $menuHelper ;
    protected $header = "header.tpl" ;
    protected $footer="footer.tpl";
    
    private $admin = "";
    protected $section;
    protected $tpl;
            
    function __construct($section) {
        $this->section = $section ;
        $this->menuHelper = MenuHelper::getInstance();
        require_once(WEBROOT.'tpl/SmartyBC.class.php');
        $this->tpl = new SmartyBC();
    }
    
    function set($tab){
        $this->vars = $tab;
    }
    
    function setData($key, $value){
        $this->vars[$key] = $value;
    }
    function setSubMenu($var){
        $this->sub_menu_active = $var;
    }
   
    function redirect($url, $statusCode = 303){
        $url = ROOT.$url;
       // header('Location: ' . $url, true, $statusCode);
        echo "<script>
            window.location = '".$url."';
            </script>";
        exit;
    }
    
    function render($filename){
        $this->page_active = strtolower(get_class($this));
        $this->menuHelper = MenuHelper::getInstance();
        $pages = $this->menuHelper->getNavBar($this->page_active, $this->sub_menu_active);
        
        $addmarging = (strcmp(get_class($this),"Accueil")=== 0)? "margin-0" : "margin_bottom40";
        
        if(!empty($this->vars)){
            foreach ($this->vars as $key => $value) {
                $this->tpl->assign($key, $value);
            }
        }
        $uri = Uri::getInstance()->getFragment();
        $home ="";
        if(isset($uri[0])){
            $home = $uri[0];
            unset($uri[0]);
        }
        
        $this->tpl->assign('addmarging', $addmarging);
        $this->tpl->assign('home', $home);
        $this->tpl->assign('uri', $uri);
        $this->tpl->assign('WEBROOT', WEBROOT);
        $this->tpl->assign('APPROOT', APPROOT);
        $this->tpl->assign('ROOT', ROOT); 
        $this->tpl->assign('ADMINROOT', ADMINROOT); 
        $this->tpl->assign('User', $this->getUser());
        $this->tpl->assign('services', $this->getServices());
        $this->tpl->assign('pages', $pages);
        $this->tpl->assign('liste_css', $this->css);
        $this->tpl->assign('liste_js', $this->js);
        $nav_bar_tpl = WEBAPPROOT.'views/'.  $this->section .'/nav_bar.tpl';
        $this->tpl->assign('navbar_tpl', $nav_bar_tpl);
        $this->tpl->assign('SITEURL', SITEURL); 
        $this->tpl->display(WEBAPPROOT."views/".  $this->section . '/'. $this->header);
        //$tpl->display(WEBAPPROOT.'views/nav_bar.tpl');
        $this->displayTpl($filename);
        $modal_tpl = WEBAPPROOT.'views/'.  $this->section .'/login-register/modal_login.tpl';
        //var_dump($this->getUser());
        $this->tpl->assign('modal_tpl', $modal_tpl);
        $this->tpl->display(WEBAPPROOT."views/".  $this->section . '/'. $this->footer);


        //require(WEBAPPROOT.'views/'.strtolower (get_class($this)).'/'.$filename.'.html');
    }
    
    function displayTpl($filename){
        $class = strtolower (get_class($this));
        if($this->section == 'admin' && $class == 'admin'){
            $class = "";
        }
                $this->tpl->display(WEBAPPROOT.'views/'.  $this->section .'/'. $class.'/'.$filename.'.tpl');
    }
    
    function includeFile($filename){
        require(WEBAPPROOT.'views/' .  $this->section . strtolower (get_class($this)).'/'.$filename.'.php');
    }
    
    function load_css(){
        $this->css[] = 'http://fonts.googleapis.com/css?family=Bree+Serif';
        $this->css[] = 'http://fonts.googleapis.com/css?family=Philosopher';
        $this->css[] = 'http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300';
        $this->css[] = "ressources/css/bootstrap.min.css";
        $this->css[] = "ressources/css/font-awesome.min.css";
        $this->css[] = "ressources/css/style.css";
        $this->css[] = "ressources/css/lightbox.css";
        
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
        $list_services = $dao->getAllData();
        
        //die(var_dump($list_services));
        $services = array("services" => $list_services);
        return $services;
    }
    
    function getPageActive(){
    }

    function getNavBar(){
        //print_r($this->page_active);
        
        $link = array(true => 'active', false => '');
       
        $dropdown = array(true => array(' class="dropdown-toggle"  data-toggle="dropdown"','<span class="caret"></span>') 
                                        , false => array('', ''));
        
        $pages = array(ROOT."accueil/"  => array(
                'class' => $link[$this->page_active === 'accueil'],
                'name' => 'Accueil',
                'param' => $dropdown[false],
                'sub_menu' => array()
            ),
            ROOT."authentification/register/"  => array(
                'class' => $link[$this->page_active === 'register'],
                'name' => 'Devenir membre',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."pourquoi/"  => array(
                'class' => $link[$this->page_active === 'pourquoi'],
                'name' => 'Pourquoi devenir membre',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."statut/"  => array(
                'class' => $link[$this->page_active === 'statut'],
                'name' => 'Projets/Réalisations',
                'param' => $dropdown[true],
                'sub_menu' => array(
                    ROOT."statut/projets"  => array(
                    'class' => $link[$this->sub_menu_active === 'projets'],
                    'name' => 'Projets'),
                    ROOT."statut/"  => array(
                    'class' => $link[$this->sub_menu_active === 'realisations'],
                    'name' => 'Réalisations')
                )),
            ROOT."actualites/"  => array(
                'class' => $link[$this->page_active === 'actualites'],
                'name' => 'Actualités',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."apropos/"  => array(
                'class' => $link[$this->page_active === 'apropos'],
                'name' => 'A propos de RPM',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."#/"  => array(
                'class' => $link[$this->page_active === ''],
                'name' => 'Forum',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."contact/"  => array(
                'class' => $link[$this->page_active === 'contact'],
                'name' => 'Nous joindre',
                'param' => $dropdown[false],
                'sub_menu' => array())
                
        );
        
       /* $nav_bar_menu = '<ul class="nav navbar-nav">';
        
        foreach ($pages as $page => $info_page ){
            
            $nav_bar_menu .= '<li class="'.$info_page['class'].'"><a href="'.$page.'" '. $info_page['param'][0].'>'.$info_page['name'].''. $info_page['param'][1].'</a>';
            if(empty($info_page['param'][0]) == false){
                $nav_bar_menu .= '<ul class="dropdown-menu nav bg-footer">';
           
            foreach ($info_page['sub_menu'] as $sub_page => $info_sub_page){
                     $nav_bar_menu .= '<li class="'.$info_sub_page['class'].'"><a href="'.$sub_page.'">'.$info_sub_page['name'].'</a></li>';
             }
             
             $nav_bar_menu .= '</ul>';
             } 
             $nav_bar_menu .= '</li>';
        }
        $nav_bar_menu .= '</ul>';*/
       // print_r($nav_bar_menu);
         return $pages;
        
    }
    
}