<?php
include_once './.model/subscripciones.model.php';
include_once './.view/subscripciones.view.php';


class subscripcionesController
{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new subscripcionesModel();
        $this->view = new subscripcionesView();
    }

    function ShowSubs()
    {
        //obtengo las subscripciones del modelo
        $subscripciones = $this->model->getSubs();
        //actualizo la vista
        $this->model->verificar();
        $this->view->ShowSubs($subscripciones);
    }
}
