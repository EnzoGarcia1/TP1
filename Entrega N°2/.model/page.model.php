<?php

class pageModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=socios;charset=UTF8', 'root', '');
    }

    public function verificar(){
        session_start();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . '/inicioSesion');
            die();
        }
    }
}