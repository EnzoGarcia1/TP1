<?php
require_once '.model/page.model.php';
require_once '.view/page.view.php';

class pageController {
    private $view;
    private $model;

    function __construct()
    {
        $this->model = new pageModel();
        $this->view = new pageView();
    }

    function mostrarInicio(){
        $this->view->mostrarInicio();
    }
    
    function mostrarMiPerfil(){
        $this->view->mostrarMiPerfil();
    }
    
    function mostrarVerSuscripciones(){
        $this->view->mostrarVerSuscripciones();
    }
    
    function MostrarSuscribirse(){
        $this->view->MostrarSuscribirse();
    }
}