<?php
class ControllerPrivate {
/**
 * Constructor
 */    
    public function __construct() {
        session_name('ALMSESSION');
        session_start();
    }
    
    /**
     * Comprueba si estamos logueados en la sesión
     */
    public function check_login() {
        //comprobamos si las variables de sesión existen
        if (isset($_SESSION['data_0']) && 
            isset($_SESSION['data_1']) && 
            isset($_SESSION['data_2']) && 
            isset($_SESSION['data_3']) && 
            isset($_SESSION['data_4'])){
                $id = $_SESSION['data_0'];
                //comprobamos que existe el id de usuario de la variable de sesión
                if (MI_DB::check_id($id)){
                    $sesion_ok = true;
                    //Obtenemos los datos del usuario por el id
                    $user_data = MI_DB::check_id($id);
                    $data_1 = $_SESSION['data_1'];
                    $data_2 = $_SESSION['data_2'];
                    $data_3 = $_SESSION['data_3'];
                    $data_4 = $_SESSION['data_4'];
                    //Comprobamos que las variables de sesión sean correctas
                    if (!password_verify(session_id(),$data_1)) {$sesion_ok = false;}
                    if (!password_verify($user_data['id'],$data_2)) {$sesion_ok = false;}
                    if (!password_verify($user_data['mail'],$data_3)) {$sesion_ok = false;}
                    if (!password_verify($user_data['apellido_1'],$data_4)) {$sesion_ok = false;}
                    //Si las variables de sesión son correctas las volvemos a encriptar para que se modifiquen y devolvemos el rol del usuario
                    if ($sesion_ok){
                        return $user_data;
                        unset($user_data);
                    } else {
                        unset($user_data);
                        header("Location: ../inicio.php?form=login&session=end");
                        exit();
                    }

                } else {
                    header("Location: ../inicio.php?form=login&session=end");
                    exit();
                }

            } else {
                header("Location: ../inicio.php?form=login&session=end");
                exit();
            }
    }
    /**
     * Cierra la sesion existente
     */
    public function log_out(){
        session_unset();
        session_destroy();
        header("Location: ../inicio.php?form=login&session=end");
    }

    /**
     * Chequea la sesion y comprueba las vistas recibidas de acuerdo con los permisos del usuario
     */
    public function check_view($titulo_form,$cont_form){
        $user_data = $this->check_login();
        $permisos = $user_data['permisos'];
        //Comprobamos que las vistas no sean menores que 1 y que exista
        if ($titulo_form < 1) {
            $this->log_out();
            exit();
        }
        if ($cont_form < 1) {
            $this->log_out();
            exit();
        }
        if (($cont_form > 8) && ($cont_form < 20)) {
            $this->log_out();
            exit();
        }
        //vistas con permisos de lectura
        if ($permisos == 'Lectura'){
            if ($titulo_form > 2) {
                $this->log_out();
                exit();
            }
            if ($cont_form > 22){
                $this->log_out();
                exit();
            }
        }
        //vistas con permisos de escritura
        if ($permisos == 'Escritura'){
            if ($titulo_form > 3) {
                $this->log_out();
                exit();
            }
            if ($cont_form > 53) {
                $this->log_out();
                exit();
            }
        }
        //vistas con permisos de administrador
        if ($permisos == 'Administrador'){
            if ($titulo_form > 4) {
                $this->log_out();
                exit();
            }
            if ($cont_form > 87) {
                $this->log_out();
                exit();
            }
        }
        return $user_data;
        unset($user_data);
    }
    

    /**
     * Modifica mi nombre, apellidos y mail si este no existe en la BBDD.
     */
    public function update_my_user ($name,$ap_1,$ap_2,$correo){
        $user = $this->check_login();
        if ($user['mail'] != $correo){
            if(MI_DB::check_mail($correo)) {
                header("Location: ./main.php?titulo_form=1&cont_form=5&error=correo_en_uso");
                exit();
            } 
        }
        $id = $user['id'];
        $usuario = $user['user'];
        $permisos = $user['permisos'];
        if(MI_DB::modificar_user($id,$usuario,$name,$ap_1,$ap_2,$correo,$permisos)){
            $data_3 = password_hash($correo, PASSWORD_BCRYPT);
            $data_4 = password_hash($ap_1, PASSWORD_BCRYPT);
            $_SESSION['data_3'] = $data_3;
            $_SESSION['data_4'] = $data_4;
            header("Location: ./main.php?titulo_form=1&cont_form=4");
        } else {
            header("Location: ./main.php?titulo_form=1&cont_form=5&error=fallo_en_consulta");
        }


        
    }
    

    /**
     * Modifica la password del usuario que tiene la sesión activa
     */
    public function update_my_pwd ($password){
        $user = $this->check_login();
        $id = $user['id'];
        if(MI_DB::modificar_password($id,$password)){
            header("Location: ./main.php?titulo_form=1&cont_form=6");
        } else {
            header("Location: ./main.php?titulo_form=1&cont_form=5&error=fallo_en_consulta");
        }
    }
    

    /**
     * Busca un producto por referencia y devuelve un array con los resultaso o false si el producto no existe
     */
    public function search_ref ($ref){
        $this->check_login();
        if($prod = MI_DB::check_ref($ref)){
            return $prod;
        } else {
            return false;
        }
    }

    /**
     * Busca producto por nombre y devuelve un array con los productos coincidentes o false si no hay coincidencias
     */
    public function search_name ($name){
        $this->check_login();
        if($prod = MI_DB::check_name($name)){
            return $prod;
        } else {
            return false;
        }
    }

    /**
     * Busca producto por nombre y devuelve un array con los productos coincidentes o false si no hay coincidencias
     */
    public function search_fab ($fab){
        $this->check_login();
        if($prod = MI_DB::check_fab($fab)){
            return $prod;
        } else {
            return false;
        }
    }

    /***********************************Consultas con permisos de escritura***************************************/

    /**
     * Crea un nuevo producto en la base de datos
     */
    public function alta_prod ($prod, $cantidad, $fab){
        $this->check_login();
        $id_alta = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_alta);
        $permisos_alta = $user_data['permisos'];
        if ($permisos_alta == 'Escritura' || $permisos_alta == 'Administrador'){
            if ($resultado = MI_DB::create_prod($prod, $cantidad, $id_alta, $fab)){
                return $resultado;
            } else {
                return false;
            }
        } else {
            $this->log_out();
        }
    }
    /**
     * Da de baja un producto en la base de datos
     */
    public function baja_prod ($referencia){
        $this->check_login();
        $id_alta = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_alta);
        $permisos_alta = $user_data['permisos'];
        if ($permisos_alta == 'Escritura' || $permisos_alta == 'Administrador'){
            if (MI_DB::delete_prod($referencia)){
                return true;
            } else {
                return false;
            }
        } else {
            $this->log_out();
        }
    }
    /**
     * Modifica un producto en la base de datos
     */
    public function modif_prod ($referencia, $producto, $cantidad, $ref_fabricante){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Escritura' || $permisos_modif == 'Administrador'){
            if (MI_DB::update_prod($referencia, $producto,$cantidad, $id_modif,$ref_fabricante)){
                return true;
            } else {
                return false;
            }
        } else {
            $this->log_out();
        }
    }

    /***********************************Consultas con permisos de administrador***************************************/
    

    /**
     * Busca usuarios que coincidan con los datos pasados como parámetros y devuelve un array con las coincidencias
     */
    public function buscar_usuario ($id, $user_form, $nombre, $apellido_1, $apellido_2, $mail, $permisos){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if ($users_data = MI_DB::find_user($id, $user_form, $nombre, $apellido_1, $apellido_2, $mail, $permisos)){
                return $users_data;
            } else {
                return false;
            }
        } else {
            $this->log_out();
        }
    }
    

    /**
     * Busca el usuario por id pasado como parámetro y devuelve un array con los datos del usuario
     */
    public function search_user_id ($id){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if ($users_data = MI_DB::check_id($id)){
                return $users_data;
            } else {
                return false;
            }
        } else {
            $this->log_out();
        }
    }
    

    /**
     * Comprueba si el correo pasado como parámetro existe en la BBDD, devuelve true si existe y false si no es así
     */
    public function comprueba_correo ($mail){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if (MI_DB::check_mail($mail)){
                    return true;
                } else {
                    return false;
                }
        } else {
            $this->log_out();
        }
    }
    

    /**
     * Modifica el usuario con la id pasada como parámetro si el mail no existe en la BBDD
     */
    public function update_user ($id, $user_form, $nombre, $apellido_1, $apellido_2, $mail, $permisos){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if (MI_DB::modificar_user($id, $user_form, $nombre, $apellido_1, $apellido_2, $mail, $permisos)){
                    return true;
                } else {
                    $error = 'No se ha podido realizar la actualización';
                    return $error;
                }
        } else {
            $this->log_out();
        }
    }

    /**
     * Borra el usuario con la id pasada como parámetro
     */
    public function delete_user ($id){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if (MI_DB::borrar_user($id)){
                    return true;
                } else {
                    return false;
                }
        } else {
            $this->log_out();
        }
    }

    /**
     * Crea el usuario con los datos pasados como parámetro
     */
    public function create_user ($user_form, $new_password, $name, $ap_1, $ap_2, $correo, $permisos){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if ($new_user = MI_DB::crear_user($user_form, $new_password, $name, $ap_1, $ap_2, $correo, $permisos)){
                    return $new_user;
                } else {
                    return false;
                }
        } else {
            $this->log_out();
        }
    }

    /**
     * Comprueba si existe el user pasado como parámetro, si existe
     * devuelve true, si no false
     */
    public function comprueba_usuario ($user_form){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if ($new_user = MI_DB::check_user_exists($user_form)){
                    return true;
                } else {
                    return false;
                }
        } else {
            $this->log_out();
        }
    }

    /**
     * Comprueba si existe el user pasado como parámetro, si existe
     * devuelve true, si no false
     */
    public function cambiar_password ($id,$password){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if (MI_DB::modificar_password($id,$password)){
                    return true;
                } else {
                    return false;
                }
        } else {
            $this->log_out();
        }
    }

    /**
     * Busca solicitudes de cambio de password si existe alguno devuelve un array 
     * con los resultados, si no false
     */
    public function buscar_sol_pwd (){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if ($result = MI_DB::search_sol_pwd()){
                    return $result;
                } else {
                    return false;
                }
        } else {
            $this->log_out();
        }
    }

    /**
     * Borra la solicitud de cambio de pwd pasada como parámetro 
     * 
     */
    public function borrar_sol_pwd ($id_solicitud){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if ($result = MI_DB::delete_sol_pwd($id_solicitud)){
                    return true;
                } else {
                    return false;
                }
        } else {
            $this->log_out();
        }
    }

    /**
     * Busca solicitudes de registro si existe alguno devuelve un array 
     * con los resultados, si no false
     */
    public function buscar_sol_reg (){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if ($result = MI_DB::search_sol_reg()){
                    return $result;
                } else {
                    return false;
                }
        } else {
            $this->log_out();
        }
    }

    /**
     * Borra la solicitud de cambio de pwd pasada como parámetro 
     * 
     */
    public function borrar_sol_reg ($id_solicitud){
        $this->check_login();
        $id_modif = $_SESSION['data_0'];
        $user_data = MI_DB::check_id($id_modif);
        $permisos_modif = $user_data['permisos'];
        if ($permisos_modif == 'Administrador'){
            if ($result = MI_DB::delete_sol_reg($id_solicitud)){
                    return true;
                } else {
                    return false;
                }
        } else {
            $this->log_out();
        }
    }
}

?>