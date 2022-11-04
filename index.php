<?php
#llamamos el header para que jquery funcione
require_once("vistas/header.php");
#variable de session de usuario
$_SESSION["id_usuario"]=0;
#llamamos el login
require_once("vistas/login.php");
?>