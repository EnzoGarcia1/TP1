<?php
require_once 'config.php';
class modelAdmin
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=socios;charset=utf8', 'root', '');
    }

    public function agregarSub($tipo_subscripcion, $nombre_subscripcion, $caracteristicas, $precio, $duracion)
    {
        $query = $this->db->prepare('INSERT INTO subscripciones (tipo_subscripcion, nombre_subscripcion, caracteristicas, precio, duracion) VALUES (?,?,?,?,?)');
        $query->execute([$tipo_subscripcion, $nombre_subscripcion, $caracteristicas, $precio, $duracion]);
        if ($this->db) {
            return "la membresia se ha ingresado correctamente";
        } else {
            return "Error al ingresar membresia";
        }
    }

    public function agregarCategoria($tipo_subscripcion)
    {
        $query = $this->db->prepare('INSERT INTO subscripciones (tipo_subscripcion) VALUES (?)');
        $query->execute([$tipo_subscripcion]);
        return "Se agrego categoria";
    }

    public function eliminarSub($nombre_subscripcion)
    {
        $query = $this->db->prepare('DELETE FROM subscripciones WHERE nombre_subscripcion = ?');
        $query->execute([$nombre_subscripcion]);
        if ($this->db) {
            return "Membresia eliminada correctamente";
        } else {
            return "Error al eliminar membresia";
        }
    }

    public function eliminarCategoria($tipo_subscripcion)
    {
        $query = $this->db->prepare('SELECT * FROM subscripciones WHERE tipo_subscripcion = ?');
        $query->execute([$tipo_subscripcion]);
        $subs = $query->fetchAll(PDO::FETCH_OBJ);

        if (empty($subs)) {
            $query = $this->db->prepare('DELETE FROM subscripciones WHERE tipo_subscripcion = ?');
            $query->execute([$tipo_subscripcion]);
            return "Se ha eliminado la categoria";
        } else {
            return "No puedes eliminar una categoria que tenga membresias";
        }
    }

    public function modificarSub($precio, $duracion, $caracteristicas)
    {
        $query = $this->db->prepare('UPDATE subscripciones SET precio = ?, duracion = ?, caracteristicas = ? WHERE nombre_subscripcion = ?');
        $query->execute([$precio, $duracion, $caracteristicas]);
        return "se actualizado la membresia";
    }

    public function modificarCategoria($nuevo_tipo_subscripcion)
    {
        try {
            $query = $this->db->prepare('UPDATE tipo_subscripcion SET tipo = ? WHERE tipo_subscripcion = ?');
            $query->execute([$nuevo_tipo_subscripcion]);
        } catch (PDOException) {
            return 'No se pudo modificar categoria';
        }
    }

    public function obtenerSubs()
    {
        $query = $this->db->prepare('SELECT * FROM subscripciones');
        $query->execute();
        $subs = $query->fetchAll(PDO::FETCH_OBJ);
        return $subs;
    }

    public function obtenerCategorias()
    {
        $query = $this->db->prepare('SELECT * FROM tipo_subscripcion');
        $query->execute();
        $tiposCategorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $tiposCategorias;
    }
}
