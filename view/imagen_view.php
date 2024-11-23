<?php
require_once "assets/template/header.php";
require_once "assets/template/menu.php";

if (isset($todas)) {
    echo "<div class='cards'>";
    if (is_array($todas)) {
        foreach ($todas as $imagen) {
            echo "<div class='card'>";
            echo "<h1 class='card__title'>" . $imagen['titulo'] . "</h1>";
            echo "<img class='card__imagen' src='" . $imagen['imagen'] . "'>";
            echo "</div>";
        }
    }
    echo "</div>";
} else {
    echo "no hay imagenes";
}
