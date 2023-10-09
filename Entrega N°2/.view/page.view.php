<?php

class pageView{
    
    function mostrarInicio(){
        require_once 'templates/header.phtml';
        require 'templates/inicio.phtml';
    }
    
    function mostrarMiPerfil(){
        require_once 'templates/header.phtml';
        echo 'miPerfil';
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