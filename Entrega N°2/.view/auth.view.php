<?php

class authView{
    
    function MostrarRegistro($error = null){
        require './Templates/registro.phtml';
        
    }

    function mostrarInicio($error = null){
        require './Templates/inicio.phtml';
    }

}
?>
