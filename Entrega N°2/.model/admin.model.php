<?php

class adminModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=socios;charset=UTF8', 'root', '');
    }

    function obtenerCategorias()
    {
        $query = $this->db->prepare('SELECT * FROM tipo_subscripcion');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }


    function eliminarCategoria($categoria)
    {
        $query = $this->db->prepare('DELETE FROM `subscripciones` WHERE tipo_subscripcion=?');
        $query->execute([$categoria]);
    }

    function editarCategoria($categoriaId, $nombre)
    {
        $query = $this->db->prepare('UPDATE `tipo_subscripcion` SET `tipo`=? WHERE nombre_subscripcion=?');
        $query->execute([$nombre, $categoriaId]);
    }

    function agregarCategoria($nombreCategoria)
    {

        $query = $this->db->prepare('INSERT INTO `tipo_subscripcion`( `tipo`) VALUES (?)');
        $query->execute([$nombreCategoria]);
    }


    function obtenerItemsConCategorias()
    {
        $query = $this->db->prepare('SELECT * FROM nombre_subscripcion INNER JOIN tipo_subscripcion ');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_OBJ);
        return $items;
    }


    function eliminarItem($item)
    {
        $query = $this->db->prepare('DELETE FROM `subscripciones` WHERE nombre_subscripcion=?');
        $query->execute([$item]);
    }



    function editarItem($id, $nuevo)
    {
        $query = $this->db->prepare("UPDATE subscripciones SET precio = ? WHERE nombre_subscripcion = ?");
        $query->execute([$nuevo, $id]);
    }


    function agregarItem($nombre, $categoria, $precio, $duracion, $caracteristicas)
    {
        $query = $this->db->prepare('INSERT INTO `productos`(nombre, material, precio, imagen, categoria) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$nombre, $categoria, $precio, $duracion, $caracteristicas]);
    }
}
