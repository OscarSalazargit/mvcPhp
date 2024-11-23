<?php
require_once "assets/template/header.php";
require_once "assets/template/menu.php";

?>
<main class="formulario">
    <h1 class="formulario__titulo">Subir Fichero de Libros</h1>
    <form class="formulario__form" action="" method="POST" enctype="multipart/form-data">
        <!-- Campo para el usuario -->
        <div class="formulario__campo">
            <label for="usuario" class="formulario__label">Usuario:</label>
            <input type="text" id="usuario" name="usuario" class="formulario__input" placeholder="oscar" required value="oscar" readonly>
        </div>

        <!-- Campo para subir la imagen -->
        <div class="formulario__campo">
            <label for="archivo" class="formulario__label">Archivo:</label>
            <input type="file" id="archivo" placeholder="Archivo..." name="myfile" class="formulario__input" required>
        </div>

        <!-- Botón para enviar el formulario -->
        <div class="formulario__campo">
            <button type="submit" class="formulario__boton" name="insertar">Subir Archivo</button>
        </div>
    </form>
    <h2><?php
        if (isset($message)) {
            echo $message;
        }
        ?></h2>
</main>