<?php

class authModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=socios;charset=UTF8', 'root', '');
    }

    public function guardarUsuario($nombre,$email,$contraseña,$sus){
        $query = $this->db->prepare('INSERT INTO socios (nombre_socio,email_socio, contraseña_socio, tipo_subscripcion) VALUES (? ,?, ?, ?)');
        $query->execute([$nombre,$email,$contraseña,$sus]);
    }

    public function obtenerEmail($email){
            $query = $this->db->prepare('SELECT * FROM socios WHERE email_socio = ?');
            $query->execute([$email]);
    
            $user = $query->fetch(PDO::FETCH_OBJ);
            return $user;
    }

    public function iniciarSesion($user){
        session_start();
        $_SESSION['USER_NOMBRE'] = $user->nombre_socio;
        $_SESSION['USER_ID'] = $user->id_socio;
        $_SESSION['USER_EMAIL'] = $user->email_socio;
        $_SESSION['USER_SUBSCRIPCION'] = $user->tipo_subscripcion;

    }

    public function verificar(){
        session_start();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'inicioSesion');
            die();
        }
    }
    
    function cerrarSesion(){
        session_start();
        session_destroy();
    }
}