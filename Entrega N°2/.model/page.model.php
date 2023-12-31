<?php
require_once 'config.php';
class pageModel{

    protected $db;


    function __construct()
    {
        $this->db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8",MYSQL_USER, MYSQL_PASS);
    }

    public function verificar()
    {
        session_start();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . '/inicioSesion');
            die();
        }
    }

    public function getSocios()
    {
        $query = $this->db->prepare('SELECT * FROM socios');
        $query->execute();
        $socios = $query->fetchAll(PDO::FETCH_OBJ);

        return $socios;
    }
    
    function obtenerPlan($id){
        $querry = $this->db->prepare('SELECT * FROM subscripciones WHERE ID_subscripcion = ?');
        $querry->execute([$id]);
        $plan = $querry->fetch(PDO::FETCH_OBJ);
        return $plan;
    }

    public function esAdmin(){
        $query = $this->db->prepare('SELECT rol FROM socios WHERE ID = ?');
        $query->execute([$_SESSION['USER_ID']]);
        $rol = $query->fetch(PDO::FETCH_OBJ);
        if($rol->rol == 1){
            return true;
        }
        return false;
    }

    function borrarSocio($id){
        $querry = $this->db->prepare('DELETE FROM socios WHERE ID = ?');
        $querry->execute([$id]);
        $querry = $this->db->prepare('DELETE FROM usuarios WHERE ID = ?');
        $querry->execute([$id]);
    }

    function hacerAdmin($id){
        $querry = $this->db->prepare('UPDATE socios SET rol = ? WHERE ID = ?');
        $querry->execute([1,$id]);
    }

    function quitarAdmin($id){
        $querry = $this->db->prepare('UPDATE socios SET rol = ? WHERE ID = ?');
        $querry->execute([0,$id]);
    }

    function cambiarNombre($id, $nombre){
        $querry = $this->db->prepare('UPDATE usuarios SET nombre = ? WHERE ID = ?');
        $querry->execute([$nombre,$id]);
        $querry = $this->db->prepare('UPDATE socios SET nombre = ? WHERE ID = ?');
        $querry->execute([$nombre,$id]);
    }
}