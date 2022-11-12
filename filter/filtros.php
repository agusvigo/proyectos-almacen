<?php
/**
 * Filtros generales
 */
$page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$form = filter_input(INPUT_GET,'form',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$session =  filter_input(INPUT_GET,'session',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message =  filter_input(INPUT_GET,'message',FILTER_SANITIZE_FULL_SPECIAL_CHARS);


/**
 * Filtros de formularios
 */
$nombre = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$ap_1 = filter_input(INPUT_POST,'apellido_1',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$ap_2 = filter_input(INPUT_POST,'apellido_2',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$user = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pwd = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mail = filter_input(INPUT_POST,'mail',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$permisos = filter_input(INPUT_POST,'permisos',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$accion = filter_input(INPUT_POST,'accion',FILTER_SANITIZE_NUMBER_INT);

?>