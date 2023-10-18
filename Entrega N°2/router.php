<?php
require_once './.controller/auth.controller.php';
require_once './.controller/page.controller.php';
require_once './.controller/subscripciones.controller.php';
require_once './.controller/admin.controller.php';
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' .$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'miPerfil';
if (!empty ($_GET['action'])){
    $action = $_GET['action'];
};

$params = explode('/' , $action);

switch($params[0]){
    case 'registro':
        $controller = new authController();
        $controller -> MostrarRegistro();
        break;
    case 'registrar':
        $controller = new authController();
        $controller -> registrar();
        break;
    case 'inicioSesion':
        $controller = new authController();
        $controller -> mostrarInicio();
        break;
    case 'iniciar':
        $controller = new authController();
        $controller -> iniciarSesion();
        break;
    case 'cerrarSesion':
        $controller = new authController();
        $controller -> cerrarSesion();
        break;
    case 'miPerfil':
        $controller = new pageController();
        $controller -> mostrarMiPerfil();
        break;
    case 'verSuscripciones':
        $controller = new subscripcionesController();
        $controller->ShowSubs();
        break;
    case 'subscripciones':
        $controller = new subscripcionesController();
        $controller->ShowSubs();
        break;

    //
    case 'administracion':
        $controller = new adminController();
        $controller->mostrarAdmin();
        break;
    case 'eliminarCategoria':
        $controller = new adminController();
        $controller->eliminarCategoria($params[1]);
        break;
    case 'editarCategoria':
        $controller = new adminController();
        $controller->editarCategoria($params[1]);
        break;
    case 'agregarCategoria':
        $controller = new adminController();
        $controller->agregarCategoria();
        break;
    case 'agregarItem':
        $controller = new adminController();
        $controller->agregarItem();
        break;
    case 'eliminarItem':
        $controller = new adminController();
        $controller->eliminarItem($params[1]);
        break;
    case 'mostrarEditarItem':
        $controller = new adminController();
        $controller->mostrarFormEditar($params[1]);
        break;
    case 'editarItem':
        $controller = new adminController();
        $controller->editarItem($params[1]);
        break;
    default;
        echo 'error404';
}

?>
