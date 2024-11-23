<?php

class Conectar {
    public static function conectar() {
        try {
            $conexion = new mysqli("127.0.0.1", "root", "", "mvc");
            // echo "Conexion exitosa!! Borrame estoy en model conexion";
        } catch (Exception $ex) {
            die("Error en la conexion :" . $ex->getMessage());
        }
        return $conexion;
    }
}
