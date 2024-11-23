<?php

if (isset($_SESSION["usuario"])) {
    require_once "assets/template/header.php";
    require_once("assets/template/menu.php");
?>
    <!--
    <main class="formulario">
        <h1 class="formulario__titulo">Subir Imagen</h1>
        <form class="formulario__form" action="" method="POST" enctype="multipart/form-data">
            
            <div class="formulario__campo">
                <label for="titulo" class="formulario__label">Título:</label>
                <input type="text" id="titulo" name="titulo" class="formulario__input" required>
            </div>

           
            <div class="formulario__campo">
                <label for="autor" class="formulario__label">Autor:</label>
                <input type="text" id="autor" name="autor" class="formulario__input" required>
            </div>

            
            <div class="formulario__campo">
                <label for="usuario" class="formulario__label">Usuario:</label>
                <input type="text" id="usuario" name="usuario" class="formulario__input" placeholder="oscar" required value="oscar" readonly>
            </div>

           
            <div class="formulario__campo">
                <label for="imagen" class="formulario__label">Imagen:</label>
                <input type="file" id="imagen" placeholder="Imagen..." name="myfile" class="formulario__input" accept="image/*" required>
            </div>

             
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
    -->
    <?php
    /*Mostrar las imagenes para poder borrarlas */

    if (isset($todas)) {
        echo "<table class='table__usuarios'>
                <tr>
                    <th class='table__header'>Id</th>
                    <th class='table__header'>Titulo</th>
                    <th class='table__header'>Imagen</th>
                    <th class='table__header'>Usuario</th>
                    <th class='table__header'>Autor</th>
                    
                    <th class='table__header'>Acciones</th>
                </tr>";
        foreach ($todas as $registro) {
            if (is_array($registro)) {
                echo "<tr>";
                foreach ($registro as $key => $campo) {
                    if ($key == "imagen") {
                        echo "<td class='table__item'><img class='mini-pic' width=40px src=" . $campo . "></td>";
                    } else {
                        echo "<td class='table__item'>$campo</td>";
                    }
                }
                if (isset($registro["id"])) {

                    echo '<td>
                 <form action="" method="post">
                    <input type="hidden" name="id" value="' . $registro["id"] . '">
                    <input type="hidden" name="imagen" value="' . $registro["imagen"] . '">
                    
                    <input type="submit" name="borrar" value="Eliminar" class="btn__mini btn__red">                    
                    </form>
                </td>';
                }
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "<h3 class='message'>$message</h3>";

        // 
    }
} else {
    require_once("assets/template/header.php");
    // echo "<link rel='stylesheet' href='assets/css/slider.css'>";

    require_once("assets/template/menu.php");
    ?>

    <h3>No encuentra el session_start no deberias de llegar a esta pagina si session exite:</h3>
    <?php
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
    ?>

    <!--  
        <form>

            <input type="radio" name="fancy" autofocus value="clubs" id="clubs" />
            <input type="radio" name="fancy" value="hearts" id="hearts" />
            <input type="radio" name="fancy" value="spades" id="spades" />
            <input type="radio" name="fancy" value="diamonds" id="diamonds" />
            <label for="clubs">&#9827; Clubs</label>
            <label for="hearts">&#9829; Hearts</label>
            <label for="spades">&#9824; Spades</label>
            <label for="diamonds">&#9830; Diamonds</label>

            <div class="keys">Use left and right keys to navigate</div>
        </form>
        -->
<?php


    // if (isset($todas) && (count($todas) >= 1)) {
    //     if (is_array($todas)) {
    //         foreach ($todas as $key => $value) {
    //             echo "<label>" . $value["titulo"] . "</label>";
    //             echo "<img src='" . $value["imagen"] . "'>";
    //             echo "<p>" . $value["autor"] . "</p>";
    //         }
    //     }
    // } else {
    //     echo "No tenemos imagenes aun!";
    // }
    // if (isset($array)) {
    //    if (is_array($array)) {
    //        foreach ($array as $key => $value) {
    //            echo "<h2>" . $value["titulo"] . "</h2>";
    //            echo "<img src='" . $value["ruta"] . "'>";
    //             echo "<p>" . $value["autor"] . "</p>";
    //           echo "<p>" . $value["fecha"] . "</p>";        }
    //        }
    //     }
    // header("location: index.php?controlador=baseDatos&action=home");
}
