<?php 
function conexionBBD(){
    return new PDO('mysql:host=localhost;dbname=socios;charset=UTF8', 'root', '');
}

function obtenerDatos(){
    $db = conexionBBD();
    $consulta = $db -> prepare('SELECT * FROM socios');
    $consulta->execute();

    $tareas = $consulta-> fetchAll(PDO::FETCH_OBJ);
    return $tareas;
}






?>