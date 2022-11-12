<?php
$producto = null;
$datos_usuarios =null;
$error_usuario = null;
if (isset($accion)){
    switch($accion){
        //Modificar mis datos
        case '1':$controller->update_my_user($name,$ap_1,$ap_2,$correo);
            break;
        //Cambiar mi contraseña    
        case '2':
            
            if ($pwd == $pwd_2){
                $new_password = password_hash($pwd, PASSWORD_BCRYPT);
                $controller->update_my_pwd($new_password);
            } 
            else {header("Location: ./main.php?titulo_form=1&cont_form=7&error=pwd_no_coincide");}
            break;
        //Buscar producto por referencia
        case '3':
            if ($product = $controller->search_ref($ref)){
                $producto = $product;
                $error_producto = null;
            } else {
                $producto = null;
                $error_producto = "La referencia $ref no existe";
            }
            break;
        //Buscar producto por nombre
        case '4':
            if ($product = $controller->search_name($prod)){
                $producto = $product;
                $error_producto = null;
            } else {
                $producto = null;
                $error_producto = "No se ha encontrado '$prod'";
            }
            break;
        //Buscar producto por r. fabricante
        case '5':
            if ($product = $controller->search_fab($fab)){
                $producto = $product;
                $error_producto = null;
            } else {
                $producto = null;
                $error_producto = "No se ha encontrado '$fab'";
            }
            break;
        //Crear nuevo producto
        case '6':
            if ($product = $controller->alta_prod($prod, $cantidad, $fab)){
                $producto = $product;
                $error_producto = null;
            } else {
                $producto = null;
                $error_producto = "No se ha podio crear el producto";
            }
            break;
        //Seleccionar producto para borrar
        case '7':
            if ($product = $controller->search_ref($ref)){
                $producto = $product;
                $error_producto = null;
            } else {
                $producto = null;
                $error_producto = "La referencia $ref no existe";
            }
            break;
        //Seleccionar producto para borrar
        case '7':
            if ($product = $controller->search_ref($ref)){
                $producto = $product;
                $error_producto = null;
            } else {
                $producto = null;
                $error_producto = "La referencia $ref no existe";
            }
            break;
        //Borrar producto seleccionado
        case '8':
            if ($product = $controller->baja_prod($ref)){
                $producto = $product;
                $error_producto = null;
            } else {
                $producto = null;
                $error_producto = "No se ha podido dar de baja la referencia $ref";
            }
            break;
        //Previsualizar producto a modificar
        case '9':
            if ($product = $controller->search_ref($ref)){
                $referencia_disp = $product['referencia'];
                $producto_value = $product['producto'];
                $cantidad_value = $product['cantidad'];
                $ref_fabricante_value = $product['ref_fabricante'];
                $error_producto = null;
            } else {
                $producto = null;
                $error_producto = "La referencia $ref no existe";
            }
            break;
        //Modificar producto
        case '10':
            if ($product = $controller->modif_prod($ref, $prod, $cantidad, $fab)){
                $producto = $product;
                $error_producto = null;
            } else {
                $producto = null;
                $error_producto = "No se ha podido modificar la referencia $ref";
            }
            break;
        //Buscar usuario
        case '11':
            if ($user_data = $controller->buscar_usuario($id_user, $user_form, $name, $ap_1, $ap_2, $correo, $permisos)){
                $datos_usuarios = $user_data;
                $error_usuario = null;
            } else {
                $datos_usuarios = null;
                $error_usuario = "No hay coincidencias";
            }
            break;
        //Previsualizar usuario a modificar
        case '12':
            $id_disp = '';
            $user_disp = '';
            $nombre_disp = '';
            $ap_1_disp = '';
            $ap_2_disp = '';
            $mail_disp =  '';
            $permisos_disp = '';
            if ($user_data = $controller->search_user_id($id_user)){
                $id_disp = $user_data['id'];
                $user_disp = $user_data['user'];
                $nombre_disp = $user_data['nombre'];
                $ap_1_disp = $user_data['apellido_1'];
                $ap_2_disp = $user_data['apellido_2'];
                $mail_disp = $user_data['mail'];
                $permisos_disp = $user_data['permisos'];
                $error_usuario = null;
            } else {
                $error_usuario = "El usuario con id $id_user no existe";
            }
            break;
        //Modificar usuario
        case '13':
            if ($correo != $correo_2){
                if ($controller->comprueba_correo($correo)){
                    $datos_usuarios = null;
                    $error_usuario = 'El correo proporcionado ya existe en la base de datos';
                    break;
                }
            }
            if ($user_form !== $user_form_2){
                if ($controller->comprueba_usuario ($user_form)){
                    $datos_usuarios = null;
                    $error_usuario = 'El usuario proporcionado ya existe en la base de datos';
                    break;
                }
            }
            if ($pwd !== '') {
                $new_password = password_hash($pwd, PASSWORD_BCRYPT);
                $controller->cambiar_password ($id_user,$new_password);
            }
            if ($update_user = $controller->update_user ($id_user, $user_form, $name, $ap_1, $ap_2, $correo, $permisos)){
                $datos_usuarios = "Los datos del usuario se han actualizado correctamente";
                $error_usuario = null;
            } else {
                $datos_usuarios = null;
                $error_usuario = $update_user;
            }
            break;
        //Crear usuario
        case '14':
            if ($pwd !== $pwd_2) {
                $datos_usuarios = null;
                $error_usuario = "Las contraseñas no coinciden";
                break;
            }
            if ($controller->comprueba_correo($correo)){
                $datos_usuarios = null;
                $error_usuario = 'El correo proporcionado ya existe en la base de datos';
                break;
            }
            if ($controller->comprueba_usuario ($user_form)){
                $datos_usuarios = null;
                $error_usuario = 'El usuario proporcionado ya existe en la base de datos';
                break;
            }
            $new_password = password_hash($pwd, PASSWORD_BCRYPT);
            if ($update_user = $controller->create_user ($user_form, $new_password, $name, $ap_1, $ap_2, $correo, $permisos)){
                $datos_usuarios = $update_user;
                $error_usuario = null;
            } else {
                $datos_usuarios = null;
                $error_usuario = 'No se ha podico crear el usuario';
            }
            break;
        //Borrar usuario
        case '15':
            if ($controller->delete_user ($id_user)){
                $datos_usuarios = "El usuario seleccionado se ha eliminado de la base de datos";
                $error_usuario = null;
            } else {
                $datos_usuarios = null;
                $error_usuario = "no se ha podido eliminar el usuario";
            }
            break;
        //Buscar solicitudes de reseteo de contraseña
        case '16':
            if ($solicitudes = $controller->buscar_sol_pwd ()){
                $datos_usuarios = $solicitudes;
                $error_usuario = null;
            } else {
                $datos_usuarios = null;
                $error_usuario = "No existen solicitudes";
            }
            break;
        //Borrar solicitud r. password
        case '17':
            if ($controller->borrar_sol_pwd ($id_solicitud)){
                $datos_usuarios = null;
                $error_usuario = "Se ha borrado la solicitud seleccionada";
            } else {
                $datos_usuarios = null;
                $error_usuario = "No existen solicitudes";
            }
        break;
        //Buscar solicitudes de registro
        case '18':
            if ($solicitudes = $controller->buscar_sol_reg ()){
                $datos_usuarios = $solicitudes;
                $error_usuario = null;
            } else {
                $datos_usuarios = null;
                $error_usuario = "No existen solicitudes";
            }
            break;
        //Borrar solicitud de registro
        case '19':
            if ($controller->borrar_sol_reg ($id_solicitud)){
                $datos_usuarios = null;
                $error_usuario = "Se ha borrado la solicitud seleccionada";
            } else {
                $datos_usuarios = null;
                $error_usuario = "No existen solicitudes";
            }
            break;
    }
}

?>