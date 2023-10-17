<?php
class SubscripcionesModel
{

    //ahora genero en constructor, lo pienso como una propiedad de la clase (private $db), y en este caso vamos a usarlo para abrir la conexion a la BBDD, 
    //y no repetir este paso en cada funcion que haga despues abajo:

    private $db; //1° agrego la propiedad


    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=sistemadesocios;charset=utf8', 'root', '');
    }

    function getSubs()
    {
        $query = $this->db->prepare('SELECT * FROM subscripciones');
        $query->execute();
        $subscripciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $subscripciones;
    }
}
