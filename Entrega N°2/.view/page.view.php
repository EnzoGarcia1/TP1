<?php

class pageView{
    
    function mostrarInicio($error = null){
        require 'templates/inicio.phtml';
    }
    
    function mostrarMiPerfil(){
        require_once 'templates/miPerfil.phtml';
}
}