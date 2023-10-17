<?php
include_once 'app/model/subscripcionesModel.php';
include_once 'app/view/subscripcionesView.php';


class SubscripcionesController
{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new SubscripcionesModel();
        $this->view = new SubscripcionesView();
    }

    function ShowSubs()
    {

        //obtengo las subscripciones del modelo
        $subscripciones = $this->model->getSubs();
        //actualizo la vista
        $this->view->ShowSubs($subscripciones);
    }
}
