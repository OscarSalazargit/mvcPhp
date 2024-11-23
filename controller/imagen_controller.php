<?php
session_start();

function home() {
    require_once "model/imagen_model.php";
    $imagenes = new Imagen_model();
    $todas = $imagenes->verTodas();

    require_once "view/imagen_view.php";
}

function subirImagen() {
    require_once "model/imagen_model.php";
    $imagen = new Imagen_model();
    if (isset($_POST["insertar"]) && isset($_FILES["myfile"])) {
        $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : '';
        $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
        $autor = isset($_POST["autor"]) ? $_POST["autor"] : '';
        $ruta = isset($_FILES["myfile"]["name"]) ? $_FILES["myfile"]["name"] : '';
        if ($imagen->insertarImagen($titulo, $autor, $usuario, $ruta)) {
            $message = "Insertado correctamente";
        } else {
            $message = "Error al insertar";
        }
        $carpetadestino = "assets/img/";
        // echo "<pre>";
        // echo var_dump($_FILES);
        // echo "</pre>";
        if (isset($_FILES["myfile"])) {
            if (file_exists($carpetadestino) || @mkdir($carpetadestino)) {
                $origen  = $_FILES["myfile"]["tmp_name"];
                $destino = $carpetadestino . $_FILES["myfile"]["name"];
                if (@move_uploaded_file($origen, $destino)) {
                    $message .= "<p> Imagen Guardada correctamente</p>";
                } else {
                    $message .= "<p>" . $_FILES["myfile"]["name"] . " -> No se ha guardado la foto</p>";
                }
            }
        } else {
            echo "<h2>No se ha subido ningun fichero</h2>";
        }
    }
    require_once "view/subirImagen_view.php";
}

function editarImagen() {
    require_once("model/imagen_model.php");

    $imagen = new Imagen_model();
    $todas = $imagen->verTodas();
    $message = "";

    if (isset($_POST["borrar"])) {
        $id = isset($_POST["id"]) ? $_POST["id"] : '';
        $rutaImagen = isset($_POST["imagen"]) ? $_POST["imagen"] : '';
        if ($laImagen = $imagen->borrar($id)) {
            $message = "Borrado correctamente";
            if ($laImagen) {
                unlink($rutaImagen);
            }
        } else {
            $message = "Error al borrar";
        }
    }
    require_once "view/imagenesEdit_view.php";
}
