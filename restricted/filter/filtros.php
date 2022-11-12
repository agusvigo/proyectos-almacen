<?php
/**
 * Variables formularios
 */
$id_user = filter_input(INPUT_POST,'empleado',FILTER_SANITIZE_NUMBER_INT);
$session =  filter_input(INPUT_GET,'session',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$user_form = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$user_form_2 = filter_input(INPUT_POST,'usuario_2',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pwd = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pwd_2 = filter_input(INPUT_POST,'password_2',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$accion = filter_input(INPUT_POST,'accion',FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$ap_1 = filter_input(INPUT_POST,'apellido_1',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$ap_2 = filter_input(INPUT_POST,'apellido_2',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$correo = filter_input(INPUT_POST,'mail',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$correo_2 = filter_input(INPUT_POST,'mail_2',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$permisos = filter_input(INPUT_POST,'permisos',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$ref = filter_input(INPUT_POST,'referencia',FILTER_SANITIZE_NUMBER_INT);
$prod = filter_input(INPUT_POST,'producto',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fab = filter_input(INPUT_POST,'ref_fabricante',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cantidad = filter_input(INPUT_POST,'cantidad',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id_solicitud = filter_input(INPUT_POST,'id_solicitud',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

/**
 * Variables generales
 */
$page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$form = filter_input(INPUT_GET,'form',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$titulo_form = filter_input(INPUT_GET,'titulo_form',FILTER_SANITIZE_NUMBER_INT);
$cont_form = filter_input(INPUT_GET,'cont_form',FILTER_SANITIZE_NUMBER_INT);
$error = filter_input(INPUT_GET,'error',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$result = filter_input(INPUT_GET,'result',FILTER_SANITIZE_NUMBER_INT);

?>