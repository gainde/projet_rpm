<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuHelper
 *
 * @author Moussa Thimbo
 */
class MenuHelper {
    private static $instance;
    
    private function __construct() {}
    
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new MenuHelper();
        }
        
        return self::$instance;
    }
    
    /**
     * pour eviter la copie de l'obget.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * pour eviter desiarialisation de l'obget.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
    
    function getCss($page = 'default'){
        $css = array();
        $css[] = "bootstrap.min.css";
        $css[] = "font-awesome.min.css";
        if($page == 'admin'){
            $css[] = "bootstrap-theme.css";
            $css[] = "admin/elegant-icons-style.css";
            $css[] = "admin/widgets.css";
            $css[] = "admin/style.css";
            $css[] = "admin/box.css";
            $css[] = "admin/style-responsive.css";
            $css[] = "admin/jquery-ui-1.10.4.min.css";
            $css[] = "admin/jquery-jvectormap-1.2.2.css";
            $css[] = "admin/owl.carousel.css";
            $css[] = "admin/dataTables.bootstrap.min.css";
        }else{
            $css[] = "style.css";
            $css[] = "bjqs.css";
        }
        return $css;
    }
    function getJs($page = 'default'){
        $js = array();
        if($page == 'admin'){
            $js[] = "admin/jquery.js";
            $js[] = "admin/jquery-ui-1.10.4.min.js";
            $js[] = "admin/jquery-1.8.3.min.js";
            $js[] = "admin/jquery-ui-1.9.2.custom.min.js";
            //charger boostrap apres jquery
            $js[] = "bootstrap.min.js";
            $js[] = "admin/jquery.scrollTo.min.js";
            $js[] = "admin/jquery.nicescroll.js";
            $js[] = "admin/scripts.js";
            $js[] = "admin/jquery.autosize.min.js";
            $js[] = "admin/jquery.placeholder.min.js";
            $js[] = "admin/gdp-data.js";
            $js[] = "admin/morris.min.js";
            $js[] = "admin/sparklines.js";
            $js[] = "admin/jquery.slimscroll.min.js";
            
            $js[] = "admin/jquery.knob.js";
            $js[] = "admin/owl.carousel.js";
            $js[] = "admin/jquery-1.12.0.min.js";
            $js[] = "admin/dataTables.bootstrap.min.js";
            $js[] = "admin/jquery.dataTables.min.js";
        }
        return $js;
    }
    
    function getNavBar($page_active = 'accueil', $sub_menu_active = ''){
        
        $link = array(true => 'active', false => '');
       
        $dropdown = array(true => array(' class="dropdown-toggle"  data-toggle="dropdown"','<span class="caret"></span>') 
                                        , false => array('', ''));
        
        $pages = array(ROOT."accueil/"  => array(
                'class' => $link[$page_active === 'accueil'],
                'name' => 'Accueil',
                'param' => $dropdown[false],
                'sub_menu' => array()
            ),
            ROOT."authentification/register/"  => array(
                'class' => $link[$page_active === 'register'],
                'name' => 'Devenir membre',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."pourquoi/"  => array(
                'class' => $link[$page_active === 'pourquoi'],
                'name' => 'Pourquoi devenir membre',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."statut/"  => array(
                'class' => $link[$page_active === 'statut'],
                'name' => 'Projets/Réalisations',
                'param' => $dropdown[true],
                'sub_menu' => array(
                    ROOT."statut/projets"  => array(
                    'class' => $link[$sub_menu_active === 'projets'],
                    'name' => 'Projets'),
                    ROOT."statut/"  => array(
                    'class' => $link[$sub_menu_active === ''],
                    'name' => 'Réalisations')
                )),
            ROOT."actualites/"  => array(
                'class' => $link[$page_active === 'actualites'],
                'name' => 'Actualités',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."apropos/"  => array(
                'class' => $link[$page_active === 'apropos'],
                'name' => 'A propos de RPM',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."#/"  => array(
                'class' => $link[$page_active === ''],
                'name' => 'Forum',
                'param' => $dropdown[false],
                'sub_menu' => array()),
            ROOT."contact/"  => array(
                'class' => $link[$page_active === 'contact'],
                'name' => 'Nous joindre',
                'param' => $dropdown[false],
                'sub_menu' => array())
                
        );
         return $pages;
    }
            
    function getAdminSideBar(){
        
    }
    

}
