<?php

class pageView{
    
    function mostrarInicio($error = null){
        require 'templates/inicio.phtml';
    }
    
    function mostrarMiPerfil(){
        require_once 'templates/header.phtml';
        echo 'hola '  . $_SESSION['USER_NOMBRE'];
    }
    
    function mostrarVerSuscripciones(){
        require_once 'templates/header.phtml';
        echo 'verSuscripciones';
    }
    
    function MostrarSuscribirse(){
        require_once 'templates/header.phtml';
        echo 'suscribirse';
    }
}