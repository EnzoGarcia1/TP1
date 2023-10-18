<?php
require_once './.controller/auth.controller.php';
require_once './.controller/page.controller.php';
require_once './.controller/subscripciones.controller.php';
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

         ////


    case 'administracion':
        $controllerAdmin->verificarLogeadoYShowPropiedadesDelAdministrador();
        break;
    case 'modificarSubs':
        $controllerAdmin->modificarSubs($params[1]);
        break;
    case 'eliminarSubs':
        $controllerAdmin->eliminarSubs();
        break;
    case 'agregar':
        $controllerAdmin->agregarDatos();
        break;
    case 'eliminar':
        $controllerAdmin->eliminarDatos();
        break;
    case 'modificar':
        $controllerAdmin->modificarDatos();
        break;
    case 'volver':
        $controllerAdmin->volver();
        break;
    case 'agregarCategoria':
        $controllerAdmin->agregarCategorias();
        break;
    case 'agregarTipoDeCategoria':
        $controllerAdmin->agregarTipoDeCategorias();
        break;
    case 'eliminarTipoDeCategoria':
        $controllerAdmin->eliminarCategorias();
        break;
    case 'modificarCategorias':
        $controllerAdmin->modificarCategorias();
        break;
    case 'modificar':
        $controllerAdmin->modificarCategorias($params[1]);
        break;
    
    default;
    echo 'error404';
}

?>
