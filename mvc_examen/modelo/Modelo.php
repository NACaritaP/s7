<?php
class Modelo {
    private $conexion;

    public function __construct() {
        // Conexión a la base de datos examen_mvc
        $this->conexion = new mysqli("localhost", "root", "", "examen_mvc");
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function insertar($nombre, $precio) {
        $stmt = $this->conexion->prepare("INSERT INTO productos (nombre, precio) VALUES (?, ?)");
        $stmt->bind_param("sd", $nombre, $precio);
        return $stmt->execute();
    }

    public function mostrar() {
        $resultado = $this->conexion->query("SELECT * FROM productos");
        $productos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
        return $productos;
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    
    // Método extra para cumplir con la prueba de edición del Ejercicio 6
    public function editar($id, $nombre, $precio) {
        $stmt = $this->conexion->prepare("UPDATE productos SET nombre=?, precio=? WHERE id=?");
        $stmt->bind_param("sdi", $nombre, $precio, $id);
        return $stmt->execute();
    }
}
?>