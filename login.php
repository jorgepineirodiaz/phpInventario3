<?php
session_start();
require_once 'funciones_bd.php';

$login = (isset($_REQUEST['login'])) ?$_REQUEST['login'] :NULL;
$password = (isset($_REQUEST['password'])) ?$_REQUEST['password'] :NULL;

if ($login == NULL || $password == NULL) {
    header("Location: index.php");
}   

$bd = conectaBd();
$consulta = "SELECT * FROM usuario where login= :login and password= :password";
$resultado = $bd->prepare($consulta);

if(!$resultado->execute(array(":login" => $login, ":password" => $password))) {
    $url = "error.php?msg_error=Error_Consulta_Login";
    header("Location: ".$url);
} else {
    $registro = $resultado->fetch();
    
    if (!$registro) {
        $url = "error.php?msg_error=Error_Usuario_Inexistente";
        header("Location: ".$url);
    } else {
        $_SESSION['usuario'] = $registro[2];
        header("Location:listado_software.php");
    }
}

?>