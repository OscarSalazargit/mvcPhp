<?php
require_once "assets/template/header.php";
require_once "assets/template/menu.php";
// echo $_SESSION["usuario"];
?>
<main class="formulario">
    <h1 class="formulario__titulo">Login</h1>
    <form class="formulario__form" action="" method="POST">

        <div class="formulario__campo">
            <label for="usuario" class="formulario__label">Usuario:</label>
            <input type="text" id="usuario" name="usuario" class="formulario__input" required>
        </div>

        <div class="formulario__campo">
            <label for="passwd" class="formulario__label">Password:</label>
            <input type="password" id="passwd" name="passwd" class="formulario__input" required>
        </div>

        <div class="formulario__campo">
            <button type="submit" class="formulario__boton" name="submit" value="login">Iniciar Sesion</button>
        </div>
    </form>
    <h2><?php
        if (isset($message)) {
            echo $message;
        }
        ?></h2>
</main>