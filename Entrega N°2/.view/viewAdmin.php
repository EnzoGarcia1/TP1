<?php

class viewAdmin
{

    public function mostrarAgregarSubs()
    {
        require_once 'Templates/formsAdmin/agregarSub.phtml';
    }

    public function mostrarAgregarCategorias()
    {
        require_once 'Templates/formsAdmin/agregarCategoria.phtml';
    }

    public function mostrarEliminarSubs($subs)
    {
        require_once 'Templates/formsAdmin/eliminarSubs.phtml';
    }

    public function mostrarEliminarCategorias($tipo_subscripcion)
    {
        require_once 'Templates/formsAdmin/eliminarCategoria.phtml';
    }

    public function mostrarModificarSubs($subs)
    {
        require_once 'Templstes/formsAdmin/modificarSubs.phtml';
    }

    public function mostrarModificarCategorias()
    {
        require_once 'Templates/formsAdmin/modificarCategorias.phtml';
    }

    public function mostrarAccionesAdmin()
    {
        require_once 'Templates/administracion/accionesDelAdministrador.phtml';
    }
    public function mostrarMensaje($mensaje)
    {
        require_once 'Templates/mensajes/mostrarMensaje.phtml';
    }
    public function mostrarVolver()
    {
        require_once 'Templates/mensajes/mostrarVolver.phtml';
    }

    public function listarCategoriasParaModificarlas($tipo_subscripcion)
    {
        require_once 'Templates/formsAdmin/formModificarCategorias.phtml';
    }
}
