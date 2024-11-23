<?php
session_start();








function subirFichero() {
    require_once "model/libro_model.php";
    $imagen = new Libro_model();
    $carpetadestino = "assets/uploads/";
    $arrayDatos = [];
    $recogeDatos = [];
    // echo "<pre>";
    // echo var_dump($_FILES);
    // echo "</pre>";
    //Compruebo que existe el archivo y lo subo a mi carpeta.
    if (isset($_POST["insertar"]) && isset($_FILES["myfile"])) {
        $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
        $ruta = isset($_FILES["myfile"]["name"]) ? $_FILES["myfile"]["name"] : '';

        if (file_exists($carpetadestino) || @mkdir($carpetadestino)) {
            $origen  = $_FILES["myfile"]["tmp_name"];
            $destino = $carpetadestino . $_FILES["myfile"]["name"];
            if (@move_uploaded_file($origen, $destino)) {
                $message = "<p>" . $_FILES["myfile"]["name"] . " movido correctamente</p>";
            } else {
                $message = "<p>" . $_FILES["myfile"]["name"] . " -> No se ha movido</p>";
            }
        }

        //Cogeremos el archivo lo leemos e insertamos en la bd con el usuario que lo subió
        $file = fopen($destino, "r");

        while (!feof($file)) {
            // fgets(archiv, buffer) => el buffer por ejemplo 4096 daria el buuffer del archivo, funciona con y sin él.
            $line = fgets($file);
            // echo "linea: "  . $line; 
            //busco las posiciones donde aparecen las ; y lo mete en el array
            $arrayDatos = explode(";", $line);
            // echo "<pre>";
            // var_dump($arrayDatos);
            // echo "</pre>";
            $titulo = trim($arrayDatos[0]);
            $autor = trim($arrayDatos[1]);
            $comentario = trim($arrayDatos[2]);

            //echo "<br>Nombre: "  . $nombre . "<br>Edad: " . $edad . "<br>Email: " . $email . "<hr>";
            $recogeDatos[] = [
                'titulo' => $titulo,
                'autor' => $autor,
                'comentario' => $comentario,
                'usuario' => $usuario
            ];
            try {
                $imagen->insertarLibro($titulo, $autor, $comentario, $usuario);
                $message = "<h2>Hemos guardado: $$titulo</h2>";
            } catch (Exception $e) {
                $message = "<h2>Hemos tenido un problema al insertar a $$titulo</h2>";
            }
        }
        fclose($file);
        return $recogeDatos;
    }

    require_once "view/subirArchivo_view.php";
}














function home() {
    require_once "model/libro_model.php";
    $libros = new Libro_model();
    $todos = $libros->verTodos();
    require_once "view/libro_view.php";
}



function editarLibro() {
    require_once("model/libro_model.php");
    $libro = new Libro_model();
    $todas = $libro->verTodos();
    $message = "";

    if (isset($_POST["borrar"])) {
        $id = isset($_POST["id"]) ? $_POST["id"] : '';
        if ($elLibro = $libro->borrar($id)) {
            $message = "Borrado correctamente";
        } else {
            $message = "Error al borrar";
        }
    }

    require_once "view/libroEdit_view.php";
}
