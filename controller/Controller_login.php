<?php
include '../model/MI_DB.php';
include '../filter/filtros.php';
class ControllerLogin {
/**
 * Constructor
 */    
    public function __construct() {
        session_name('ALMSESSION');
        //establecemos la caducidad de la sesión en 3 horas
        session_set_cookie_params(10800);
        session_start();
    }
    
/**
 * Comprueba usuario y password, si son correctos crea una nueva sesión
 */    
    public function login($user,$pwd) {
        //comprobamos ussuario y contraseña en la BBDD
        if (MI_DB::check_user($user,$pwd)){
            $user_data = MI_DB::check_user($user,$pwd);
            $data_1 = password_hash(session_id(), PASSWORD_BCRYPT);
            $data_2 = password_hash($user_data['id'], PASSWORD_BCRYPT);
            $data_3 = password_hash($user_data['mail'], PASSWORD_BCRYPT);
            $data_4 = password_hash($user_data['apellido_1'], PASSWORD_BCRYPT);
            $_SESSION['data_0'] = $user_data['id'];
            $_SESSION['data_1'] = $data_1;
            $_SESSION['data_2'] = $data_2;
            $_SESSION['data_3'] = $data_3;
            $_SESSION['data_4'] = $data_4;
            unset($user_data);
            header("Location: ../restricted/main.php?titulo_form=2&cont_form=20");
        } else {
            header("Location: ../inicio.php?form=login&session=ko");
        }
    }
    
/**
 * Crea una petición de reseteo de password si el correo proporcionado existe en la BBDD
 */    
    public function reset_pwd($mail) {
        //comprobamos que el correo existe en la base de datos
        if ($id = MI_DB::check_mail($mail)){
            //Comprobamos que se crea el registro, si no devolvemos mensaje de error
            if (MI_DB::new_reset_pwd($id)){
                return true;
            } else {
                header("Location: ../inicio.php?form=recupera&message=fallo_consulta");
            }
        } else {
            header("Location: ../inicio.php?form=recupera&message=mail_incorrecto");
        }
    }
    
/**
 * Crea una petición de registro en la aplicación
 */    
    public function peticion_registro($nombre, $ap_1, $ap_2, $mail, $permisos) {
        //comprobamos que el correo existe en la base de datos
        if (MI_DB::new_reg_pet($nombre, $ap_1, $ap_2, $mail, $permisos)){
            return true;
        } else {
            return false;
        }
    }
}
?>