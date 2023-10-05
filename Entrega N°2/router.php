<?php
require_once 'app/funciones.php';
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' .$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';
if (!empty ($_GET['action'])){
    $action = $_GET['action'];
};

$params = explode('/' , $action);

switch($params[0]){
    case 'home':
        home();
        break;
    case 'inicio':
        inicio();
        break;
    case 'miPerfil':
        miPerfil();
        break;
    case 'verSuscripciones':
        verSuscripciones();
        break;
    case 'suscribirse':
        suscribirse();
        break;
    default;
    echo 'erro404';
}

?>
