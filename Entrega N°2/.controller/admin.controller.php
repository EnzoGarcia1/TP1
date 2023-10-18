<?php
require_once './view/admin.view.php';
require_once './model/admin.model.php';

class adminController
{
    private $view;
    private $model;
    function __construct()
    {
        $this->view = new adminView();
        $this->model = new adminModel();
    }

    public function mostrarAdmin()
    {
        session_start();
        if (isset($_SESSION['logueado']) && $_SESSION['logueado'] == true && $_SESSION['ADMIN'] == true) {
            $items = $this->model->obtenerItemsConCategorias();
            $categorias = $this->model->obtenerCategorias();
            $this->view->mostrarAdmin($categorias, $items);
        } else {
            $this->view->mostrarError("Acceso denegado");
        }
    }

    public function mostrarFormEditar($id)
    {
        $this->view->mostrarFormEditar($id);
    }

    public function eliminarCategoria($categoria)
    {
        try {
            $this->model->eliminarCategoria($categoria);
            $this->mostrarAdmin();
        } catch (PDOException) {
            $this->view->mostrarError("No puede eliminar la categoria si no esta vacia.");
        }
    }


    public function editarCategoria($categoriaId)
    {
        $nombre = $_POST['nombre_subscripcion'];

        $this->model->editarCategoria($categoriaId, $nombre);
        $this->mostrarAdmin();
    }

    public function agregarCategoria()
    {
        $nombreCategoria = $_POST['tipo_subscripcion'];

        $this->model->agregarCategoria($nombreCategoria);
        $this->mostrarAdmin();
    }

    public function eliminarItem($id)
    {
        $this->model->eliminarItem($id);
        $this->mostrarAdmin();
    }

    public function editarItem($idproducto)
    {
        $nuevo = $_POST['nombre_subscripcion'];

        if (empty($nuevo)) {
            $this->view->mostrarError("No están completos todos los campos");
        } else {
            $this->view->mostrarFormEditar($idproducto);
            $this->model->editarItem($idproducto, $nuevo);
            header('Location: ' . BASE_URL . 'administracion');
        }
    }

    public function agregarItem()
    {
        $nombre = $_POST['nombre_subscripcion'];
        $categoria = $_POST['tipo_subscripcion'];
        $precio = $_POST['precio'];
        $duracion = $_POST['duracion'];
        $caracteristicas = $_POST['caracteristicas'];

        if (empty($nombre) || empty($categoria) || empty($precio)) {
            $this->view->mostrarError("No se completaron todos los campos");
        } else {
            $this->model->agregarItem($nombre, $categoria, $precio, $duracion, $caracteristicas);
            $this->mostrarAdmin();
        }
    }
}
