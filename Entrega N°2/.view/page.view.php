<?php

class pageView{
    
    function mostrarInicio($error = null,$esAdmin){
        require 'templates/inicio.phtml';
    }
    
    function mostrarMiPerfil($nombre,$email,$plan,$esAdmin){
        require_once 'templates/miPerfil.phtml';
    }

    function MostrarUsuarios($socios,$esAdmin){
        require_once 'templates/sociosList.phtml';
    }

    function mostrarNoticias(){
        require_once 'templates/noticias.phtml';
    }
}