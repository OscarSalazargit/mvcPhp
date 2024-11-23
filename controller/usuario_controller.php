<?php
session_start();
function login() {
    require_once("model/usuario_model.php");
    $datos = new Usuario_model();
    $message = "";
    // echo "no existe usuario" . $_SESSION["usuario"];
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    // session_destroy();
    if (!isset($_SESSION["usuario"])) {
        if (isset($_POST["submit"])) {
            $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
            $paswd = isset($_POST["passwd"]) ? $_POST["passwd"] : '';
            echo "entro en login -> " . $usuario . " y pass " . $paswd;
            if ($datos->login($usuario, $paswd)) {
                $_SESSION["usuario"] = $usuario;
                echo "logeado";
                header("Location: index.php");
            } else {
                echo "nada";
                $message = "Usuario o contraseña incorrectos";
            }
        }
    }
    require_once("view/usuarioLogin_view.php");
}

function logout() {
    require_once "model/usuario_model.php";
    session_destroy();
    header("location: index.php");
}
