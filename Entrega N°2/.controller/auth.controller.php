<?php
require_once '.model/auth.model.php';
require_once '.view/auth.view.php';

class authController {
    private $view;
    private $model;

    function __construct()
    {
        $this->model = new authModel();
        $this->view = new authview();
    }

    function MostrarRegistro(){
        $this->view->MostrarRegistro();
    }

    function registrar(){
        if(!empty ($_POST['email-registro']) && !empty ($_POST['contraseña-registro'])){
            $this->model->guardarUsuario();
        }
    }
}