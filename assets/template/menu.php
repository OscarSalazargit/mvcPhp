
<?php
if (isset($_SESSION["usuario"])) {
    //Logeado
    echo '

<nav class="menu">
    <button class="menu__toggle" aria-label="Abrir menú">☰</button>
    <ul class="menu__list">
        <li class="menu__item">
            <a href="index.php" class="menu__link">HOME</a>
            <!-- <ul class="submenu">
                 <li class="submenu__item"><a href="#">Subitem 1</a></li>
                 <li class="submenu__item"><a href="#">Subitem 2</a></li>
            </ul> -->
        </li>
        <li class="menu__item">
            <a href="#" class="menu__link">Imagenes</a>
            <ul class="submenu">
                <li class="submenu__item"><a href="index.php?controlador=imagen&action=subirImagen">Subir Imagenes</a></li>
                <li class="submenu__item"><a href="index.php?controlador=imagen&action=editarImagen">Editar</a></li>
            </ul>
        </li>
        <li class="menu__item">
            <a href="#" class="menu__link">Libros</a>
            <ul class="submenu">
                <li class="submenu__item"><a href="index.php?controlador=libro&action=subirFichero">Subir Libros</a></li>
                <li class="submenu__item"><a href="index.php?controlador=libro&action=editarLibro">Editar Libros</a></li>
            </ul>
        </li>
        <li class="menu__item">
            <a href="index.php" class="menu__link">☰</a>            
            <ul class="submenu">
                <li class="submenu__item"><a href="index.php?controlador=usuario&action=logout" class="menu__link">Desconectar</a></li>
                <li class="submenu__item"><a href="#">Cerrar Ventana</a></li>
            </ul>
        </li>
        <!-- <li class="menu__item">
            <a href="#" class="menu__link">Item 4</a>
            <ul class="submenu">
                <li class="submenu__item"><a href="#">Subitem 1</a></li>
                <li class="submenu__item"><a href="#">Subitem 2</a></li>
            </ul>
        </li> -->
    </ul>
</nav>
';
} else {
    //Sin logear
    echo '

<nav class="menu">
    <button class="menu__toggle" aria-label="Abrir menú">☰</button>
    <ul class="menu__list">

        <li class="menu__item">
            <a href="index.php" class="menu__link">HOME</a>
            <!-- <ul class="submenu">
                 <li class="submenu__item"><a href="#">Subitem 1</a></li>
                 <li class="submenu__item"><a href="#">Subitem 2</a></li>
            </ul> -->
        </li>

        <li class="menu__item">
            <a href="index.php?controlador=mail&action=contactar" class="menu__link">Contactar</a>
            <!--<ul class="submenu">
                <li class="submenu__item"><a href="index.php?controlador=imagen&action=subirImagen">Subir Imagenes</a></li>
                <li class="submenu__item"><a href="#">Subitem 2</a></li>
            </ul>-->
        </li>

        <li class="menu__item">
            <a href="index.php" class="menu__link">☰</a>
            
            <ul class="submenu">
                <li class="submenu__item"><a href="index.php?controlador=usuario&action=login" class="menu__link">Conectar</a></li>
                <li class="submenu__item"><a href="index.php">Cerrar VEntana</a></li>
            </ul>
        </li>

        <!-- <li class="menu__item">
            <a href="#" class="menu__link">Item 4</a>
            <ul class="submenu">
                <li class="submenu__item"><a href="#">Subitem 1</a></li>
                <li class="submenu__item"><a href="#">Subitem 2</a></li>
            </ul>
        </li> -->
    </ul>
</nav>
';
}
