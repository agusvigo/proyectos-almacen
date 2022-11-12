<?php
include '../controller/Controller_login.php';
include '../filter/filtros.php';
/**
 * accion 1 = login
 * accion 2 = registro
 * accion 3 = recuperar contraseña
 */
// si el usuario introducido en el formulario no está vacio intentamos login
if (($user != '') && ($accion == 1)){
    $login = new ControllerLogin();
    $login->login($user,$pwd);
    unset($login);
// si el usuario introducido en el formulario está vacio volvemos a login
} 
elseif ($accion == 2){
    $registro = new ControllerLogin();
    //si se completa la consulta enviamos mensaje de OK
    if ($registro->peticion_registro($nombre, $ap_1, $ap_2, $mail, $permisos)) {
        header("Location: ../inicio.php?form=recupera&message=peticion_enviada");
    } else {
        header("Location: ../inicio.php?form=recupera&message=fallo_consulta");
    }
    unset($registro);
}
elseif ($accion == 3){
    $reset_pwd = new ControllerLogin();
    //si se completa la consulta enviamos mensaje de OK
    if ($reset_pwd->reset_pwd($mail)) header("Location: ../inicio.php?form=recupera&message=peticion_enviada");
    unset($reset_pwd);
}
else {
    header("Location: ../inicio.php?form=login&session=ko");
}
?>