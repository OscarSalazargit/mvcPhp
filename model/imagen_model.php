<?php

class Imagen_model {

    private $db;
    private $todos;

    public function __construct() {
        require_once("model/conectar.php");
        $this->db = Conectar::conectar();
        $this->todos = [];
    }

    public function insertarImagen($titulo, $autor, $usuario, $imagen) {
        $sql = "INSERT INTO `imagenes` ( `titulo`, `autor`, `usuario`, `imagen`) VALUES ( '" . $titulo . "', '" . $autor . "', '" . $usuario . "', 'assets/img/" . $imagen . "');";

        try {
            $resultado = $this->db->query($sql);
        } catch (Exception $ex) {
            die("Error : " . $ex->getMessage());
        }
        return $resultado;
    }

    public function verTodas() {

        $sql = "SELECT * FROM `imagenes`";
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
        $sql = "DELETE FROM imagenes WHERE `id` =" . $id;

        try {
            $resultado = $this->db->query($sql);
        } catch (Exception $ex) {
            die("Error : " . $ex->getMessage());
        }
        return $resultado;
    }
}
