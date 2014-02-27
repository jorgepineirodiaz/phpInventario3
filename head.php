<?php
session_start();

//SOLICITUD DE INICIO DE SESSION
if (!isset($_SESSION['usuario'])) {
    $url = "error.php?msg_error?=REQUIERE_LOGIN";
    header("Location: ".$url);
}

//DATOS DE USUARIOS
echo "Usuario: ".$_SESSION['usuario']."<br />";
echo "<a href=logout.php>Cerrar Sesión</a><br /><br />";

?>