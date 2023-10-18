<?php
require_once 'app/model/modelAdmin.php';
require_once 'app/view/viewAdmin.php';
class controllerAdmin
{
    private $model;
    private $viewAdmin;

    public function __construct()
    {
        $this->model = new modelAdmin();
        $this->viewAdmin = new viewAdmin();
    }
    public function agregarSubsEInfo()
    {
        if (
            !empty($_POST['tipo_subscripcion']) && !empty($_POST['nombre_subscripcion']) &&
            !empty($_POST['caracteristicas']) && !empty($_POST['precio']) && !empty($_POST['duracion'])
        ) {
            $categoria = $_POST['tipo_subscripcion'];
            $nombre = $_POST['nombre_subscripcion'];
            $caracteristicas = $_POST['caracteristicas'];
            $precio = $_POST['precio'];
            $duracion = $_POST['duracion'];
            $this->model->agregarSub($categoria, $nombre, $caracteristicas, $precio, $duracion);
        }
    }

    function accionesAdmin()
    {
        $this->viewAdmin->mostrarAccionesAdmin();
    }
    public function agregarDatos()
    {
        $this->viewAdmin->mostrarAgregarSubs();
    }
    public function modificarDatos()
    {
        $subs = $this->model->obtenerSubs();
        $this->viewAdmin->mostrarModificarSubs($subs);
    }
    public function eliminarDatos()
    {
        $subs = $this->model->obtenerSubs();
        $this->viewAdmin->mostrarEliminarSubs($subs);
    }
    public function agregarCategorias()
    {
        $this->viewAdmin->mostrarAgregarCategorias();
    }
    public function mostrarModificarCategorias()
    {
        $categorias = $this->model->obtenerCategorias();
        $this->viewAdmin->listarCategoriasParaModificarlas($categorias);
    }
    public function EliminarCategorias()
    {
        $categorias = $this->model->obtenerCategorias();
        $this->viewAdmin->mostrarEliminarCategorias($categorias);
    }
    public function eliminarSubs()
    {
        if (!empty($_POST['nombre_subscripcion'])) {
            $subs = $_POST['nombre_subscripcion'];
            $mensaje = $this->model->eliminarSub($subs);
            $this->viewAdmin->mostrarMensaje($mensaje);
        }
    }
    public function modificarSubs($nombre)
    {
        if (!empty($_POST['tipo_subscripcion']) && !empty($_POST['nombre_subscripcion'])) {
            $categoria = $_POST['tipo_subscripcion'];
            $nombre = $_POST['nombre_subscripcion'];

            $mensaje = $this->model->modificarSub('precio', 'caracteristicas', 'duracion');
            $this->viewAdmin->mostrarMensaje($mensaje);
        }
    }
    public function verificarLogeadoYMostrarPropiedadesDelAdmin()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if ($_SESSION['user'] == 'webadmin' && $_SESSION['password'] == 'admin') {
            $this->viewAdmin->mostrarAccionesAdmin();
        } else {
            header("Location: " . "login");
            die();
        }
    }
    public function volver()
    {
        header('Location: ' . "administracion");
    }

    public function mostrarMensaje($mensaje)
    {
        $this->viewAdmin->mostrarMensaje($mensaje);
    }
    public function agregarCategoria()
    {
        if (!empty($_POST['tipo_subscripcion'])) {
            $tipoDeCategoria = $_POST['tipo_subscripcion'];
            $mensaje = $this->model->agregarCategoria($tipoDeCategoria);
            $this->viewAdmin->mostrarMensaje($mensaje);
        }
    }
    public function eliminarTipoCategorias()
    {
        try {
            if (!empty($_POST['tipo_subscripcion'])) {
                $categoria = $_POST['tipo_subscripcion'];
                $mensaje = $this->model->eliminarCategoria($categoria);
                $this->viewAdmin->mostrarMensaje($mensaje);
            }
        } catch (PDOException) {
            $this->viewAdmin->mostrarMensaje("No puedes eliminar una categoria que tiene membresias");
        }
    }
    public function modificarCategorias($tipo_subscripcion)
    {
        $nuevoNombreDeCategoria = $_POST['categoria'];
        $mensaje = $this->model->modificarCategoria($nuevoNombreDeCategoria, $tipo_subscripcion);
        $this->viewAdmin->mostrarMensaje($mensaje);
    }
}
