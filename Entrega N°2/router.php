<?php
require_once './.controller/auth.controller.php';
require_once './.controller/page.controller.php';
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
        $controller = new pageController();
        $controller -> mostrarVerSuscripciones();
        break;
    case 'suscribirse':
        $controller = new pageController();
        $controller -> MostrarSuscribirse();
        break;
    case 'subscripciones':
    $controller = new SubscripcionesController();
    $controller->ShowSubs();
    default;
    echo 'error404';
}

?>
