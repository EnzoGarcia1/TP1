<?php

class authModel{

    function guardarUsuario(){
        $email = $_POST['email-registro'];
        $contraseña = password_hash($_POST['contraseña-registro'], PASSWORD_BCRYPT);
        $sus = 1;
        $db = new PDO('mysql:host=localhost;dbname=socios;charset=UTF8', 'root', '');
        $query = $db->prepare('INSERT INTO socios (nombre_socio, contraseña_socio, tipo_subscripcion) VALUES (? ,?, ?)');
        $query->execute([$email,$contraseña,$sus]);
    }
}