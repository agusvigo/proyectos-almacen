<?php
require './config/config.php';
require './controller/ControllerPrivate.php';
require './model/MI_DB.php';
require './filter/filtros.php';
$controller = new ControllerPrivate;
$user = $controller->check_view($titulo_form,$cont_form);
require './router/router_private.php';
//Variables de usuario
$id = $user['id'];
$nombre = $user['nombre'];
$usuario = $user['user'];
$password = $user['password'];
$apellido_1 = $user['apellido_1'];
$apellido_2 = $user['apellido_2'];
$mail = $user['mail'];
$permisos = $user['permisos'];
//Header
require './views/header/header.php';
//Main
require './views/contenido.php';
//Footer
require './views/footer.php';
?>