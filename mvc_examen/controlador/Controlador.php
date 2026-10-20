<?php
require_once 'modelo/Modelo.php';

class Controlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Modelo();
    }

    public function procesarSolicitud() {
        $accion = isset($_GET['accion']) ? $_GET['accion'] : '';

        // Gestionar las acciones
        if ($accion == 'insertar' && isset($_POST['nombre']) && isset($_POST['precio'])) {
            $this->modelo->insertar($_POST['nombre'], $_POST['precio']);
            header("Location: index.php");
            exit();
        } elseif ($accion == 'eliminar' && isset($_GET['id'])) {
            $this->modelo->eliminar($_GET['id']);
            header("Location: index.php");
            exit();
        } elseif ($accion == 'editar' && isset($_POST['id'])) {
            $this->modelo->editar($_POST['id'], $_POST['nombre'], $_POST['precio']);
            header("Location: index.php");
            exit();
        }

        // Obtener productos para mostrarlos en la vista
        $productos = $this->modelo->mostrar();
        require_once 'vista/index.php';
    }
}
?>