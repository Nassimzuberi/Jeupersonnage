<?php

namespace Core\Controller;

use App\App;
use Core\Auth\DbAuth;

class Controller{

    protected $viewPath;
    protected $template;


    public function render($view, $variables = []){
        $auth = new DbAuth();
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/',$view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/'. $this->template . '.php');

    }
    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Accès interdit');
    }
    protected function notFound(){
        header('HTTP/1.0 403 Forbidden');
        die('Page introuvable');
    }
}