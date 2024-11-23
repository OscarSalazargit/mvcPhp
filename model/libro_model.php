<?php

class Libro_model {

    private $tabla;
    private $db;
    private $todos;

    public function __construct() {
        require_once("model/conectar.php");
        $this->db = Conectar::conectar();
        $this->todos = [];
        $this->tabla = 'libros';
    }

    public function insertarLibro($titulo, $autor, $comentario, $usuario) {
        $sql = "INSERT INTO `libros` ( `titulo`, `autor`, `comentario`, `usuario`) VALUES ( '$titulo', '$autor', '$comentario','$usuario');";

        try {
            $resultado = $this->db->query($sql);
        } catch (Exception $ex) {
            die("Error : " . $ex->getMessage());
        }
        return $resultado;
    }

    public function verTodos() {

        $sql = "SELECT * FROM `$this->tabla`";
        $datos = [];
        try {
            $resultado = $this->db->query($sql);
            while ($todosLosDatos = $resultado->fetch_assoc()) {
                $datos[] = $todosLosDatos;
            }
        } catch (Exception $ex) {
            die("Error : " . $ex->getMessage());
        }
        return $datos;
    }

    public function borrar($id) {
        $sql = "DELETE FROM `$this->tabla` WHERE `id` =" . $id;

        try {
            $resultado = $this->db->query($sql);
        } catch (Exception $ex) {
            die("Error : " . $ex->getMessage());
        }
        return $resultado;
    }
}
