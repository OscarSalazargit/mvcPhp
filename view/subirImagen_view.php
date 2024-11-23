<?php
require_once "assets/template/header.php";
require_once "assets/template/menu.php";

?>
<main class="formulario">
    <h1 class="formulario__titulo">Subir Imagen</h1>
    <form class="formulario__form" action="" method="POST" enctype="multipart/form-data">
        <!-- Campo para el título -->
        <div class="formulario__campo">
            <label for="titulo" class="formulario__label">Título:</label>
            <input type="text" id="titulo" name="titulo" class="formulario__input" required>
        </div>

        <!-- Campo para el autor -->
        <div class="formulario__campo">
            <label for="autor" class="formulario__label">Autor:</label>
            <input type="text" id="autor" name="autor" class="formulario__input" required>
        </div>

        <!-- Campo para el usuario -->
        <div class="formulario__campo">
            <label for="usuario" class="formulario__label">Usuario:</label>
            <input type="text" id="usuario" name="usuario" class="formulario__input" placeholder="oscar" required value="oscar" readonly>
        </div>

        <!-- Campo para subir la imagen -->
        <div class="formulario__campo">
            <label for="imagen" class="formulario__label">Imagen:</label>
            <input type="file" id="imagen" placeholder="Imagen..." name="myfile" class="formulario__input" accept="image/*" required>
        </div>

        <!-- Botón para enviar el formulario -->
        <div class="formulario__campo">
            <button type="submit" class="formulario__boton" name="insertar">Subir Imagen</button>
        </div>
    </form>
    <h2><?php
        if (isset($message)) {
            echo $message;
        }
        ?></h2>
</main>