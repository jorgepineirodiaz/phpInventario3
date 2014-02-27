<?php
session_start();
require_once 'funciones_bd.php';

$_SESSION['id'] = (isset($_SESSION['id']))?$_SESSION['id']:NULL;

$bd = conectaBd();
$consulta = "DELETE FROM software WHERE id=".$_SESSION['id'];
$resultado = $bd->prepare($consulta);

if ($resultado->execute(array(":id" => $_SESSION['id']))) {
    unset($_SESSION['id']);
    $url = "listado_software.php";
    header("Location: ".$url);
} else {
    $url = "error.php?msg_error=Error_Eliminar_Software";
    header ("Location: ".$url);
}

$db = null;

?>