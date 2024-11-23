<?php

require_once "assets/template/header.php";
require_once "assets/template/menu.php";
?>

<section class="formulario">
    <h2 class="formulario__titulo">Contactar</h2>
    <form class="formulario__form" method="post">
        <fieldset class="formulraio__fieldset">
            <legend class="formulario__legend">Formulario de Contacto:</legend>
            <div class="formulario__campo">
                <label for="name" class="formulario__label">Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Introduce tu nombre" class="formulario__input">
            </div>
            <div class="formulario__campo">
                <label for="email" class="formulario__label">Email:</label>
                <input type="email" name="email" id="email" placeholder="Introduce tu Email" class="formulario__input">
            </div>
            <div class="formulario__campo">
                <label for="doubt" class="formulario__label">Comentarios:</label>
                <input type="text" name="doubt" id="doubt" placeholder="Cuentame" class="formulario__input">
                <button type="submit" name="submit" class="formulario__boton">Enviar Email</button>
        </fieldset>
    </form>
    <div class="mail__confirm">
        <h3 class="mail__confirm__answer"><?php echo $resultado ?></h3>
    </div>
    <ul class="mail__recived">
        <li class="recived__item"><span class="recived__item-span">Nombre</span> <?php echo $nombre; ?></li>
        <li class="recived__item"><span class="recived__item-span">Email </span><?php echo $email; ?></li>
        <li class="recived__item"><span class="recived__item-span">Consulta </span> <?php echo $doubt; ?></li>
    </ul>


</section>