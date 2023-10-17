<?php
class subscripcionesModel
{

    private $db;


    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=socios;charset=utf8', 'root', '');
    }

    function getSubs()
    {
        $query = $this->db->prepare('SELECT * FROM subscripciones');
        $query->execute();
        $subscripciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $subscripciones;
    }
}
