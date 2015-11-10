<?php

class Application {

    private $controller = null;
    private $action = null;
    private $params = array();

    /**
     * analyser et récupérer format (controlleur/methode/[params/]
     * sinon erreur
     */
    public function __construct() {
        $this->splitUrl();
        if (file_exists(WEBAPPROOT . 'controllers/' . $this->controller . '.php')) {
            require WEBAPPROOT . 'controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller();
            // verifier si méthode existe
            if (method_exists($this->controller, $this->action)) {
                if (!empty($this->params)) {
                    // Si ya des params
                    call_user_func_array(array($this->controller, $this->action), $this->params);
                } else {
                    // Si pas de parametres
                    $this->controller->{$this->action}();
                }
            } else {
                require (WEBAPPROOT . 'controllers/404.php');
                $this->controller = new Erreur();
                $this->controller->Page404();
            }
        } else {
            require (WEBAPPROOT . 'controllers/404.php');
            $this->controller = new Erreur();
            $this->controller->Page404();
        }
    }

    /**
     * Get and split the URL
     */
    private function splitUrl() {
        if (isset($_GET['page'])) {
            // split URL
            $url = trim($_GET['page'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $this->controller = isset($url[0]) ? ucfirst($url[0]) : "Accueil";
            $this->action = isset($url[1]) ? $url[1] : "index";
            // Enlever le controlleur et la méthode
            unset($url[0], $url[1]);
            // Récupérer les parametres
            $this->params = array_values($url);
        }else{
            $this->controller = "Accueil";
            $this->action = "index";
        }
    }

}
