<?php

require_once "assets/template/header.php";
require_once "assets/template/menu.php";


function enviarEmail($nombre, $email, $doubt) {

    $subject = "Email de $nombre";
    $body = "Consulta: $doubt";
    $headers = "From: admin@postmaster.com";
    if (mail($email, $subject, $body, $headers)) {
        return "Email enviado a $email...";
    } else {
        return "Error al enviar el emial...";
    }
}



function contactar() {
    $nombre = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $doubt = isset($_POST['doubt']) ? $_POST['doubt'] : '';

    $resultado = "";

    if (isset($_POST['submit'])) {

        $resultado = "";
        $resultado = enviarEmail($nombre, $email, $doubt);
    }
    require_once "view/mail_view.php";
}
