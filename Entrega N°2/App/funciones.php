<?php
require_once 'db.php';

function home(){
    require_once 'templates/header.php';
    require_once 'templates/form.php';
}

function inicio(){
    require_once 'templates/header.php';
    echo 'inicio';
}

function miPerfil(){
    require_once 'templates/header.php';
    echo 'miPerfil';
}

function verSuscripciones(){
    require_once 'templates/header.php';
    echo 'verSuscripciones';
}

function suscribirse(){
    require_once 'templates/header.php';
    echo 'suscribirse';
}
?>