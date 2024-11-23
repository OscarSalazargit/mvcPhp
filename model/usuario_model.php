<?php

class Usuario_model {
    private $db;
    private $todos;

    public function __construct() {
        require_once "model/conectar.php";
        $this->db = Conectar::conectar();
        $this->todos = [];
    }

    public function getAll() {
        $sql = "SELECT * FROM usuarios";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->todos[] = $registro;
        }
        return $this->todos;
    }

    public function login($usuario, $passwd) {
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and passwd='$passwd'";
        $consulta = $this->db->query($sql);
        return (mysqli_num_rows($consulta) > 0);
    }

    public function borrar($usuario) {
        $sql = "DELETE FROM usuarios WHERE usuario='$usuario'";
        if ($consulta = $this->db->query($sql)) {
            return true;
        }
        return false;
    }

    public function insertar($usuario, $passwd, $email, $edad) {
        $sql = "INSERT INTO usuarios (usuario,passwd,email,edad) VALUES ('$usuario','$passwd','$email','$edad')";
        return ($this->db->query($sql));
    }

    public function existeUsuario($usuario) {
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $consulta = $this->db->query($sql);

        return (mysqli_num_rows($consulta) > 0);
    }
}
