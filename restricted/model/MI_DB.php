<?php
class MI_DB {
    private static $host;
    private static $us;
    private static $pw;
    private static $db;
    private static $pt;

/**
 * Método para la conexión a la base de datos
 */
    static function connection()
    {
        self::$host = constant('DB_HOST');
        self::$us = constant('DB_USER');
        self::$pw = constant('DB_PASS');
        self::$db = constant('DB');
        self::$pt = constant('DB_PORT');
        if ($connection = new mysqli(self::$host, self::$us, self::$pw, self::$db, self::$pt)){
            return $connection;
        } else {
            printf("Falló la conexión: %s\n", mysqli_connect_error());
            exit();
        }
    }

    

    /*********************************************************************************/
    /****************************Consultas de usuarios********************************/
    /*********************************************************************************/

    /**
     * Comprueba usuario y password del login y devuelve un array con los datos del usuario si existe
     */
    static function check_user($user,$pwd){  
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users WHERE users.user = '$user'";
        $result = mysqli_query($mysqli,$consulta);
        while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            if (($r_array['user'] == $user) && password_verify($pwd,$r_array['password'])){
                return $r_array;
            } else {
                return false;
            }
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    
    /**
     * Comprueba usuario por id y devuelve un array con los datos del usuario si existe
     */
    static function check_id($id){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users WHERE users.id = '$id'";
        $result = mysqli_query($mysqli,$consulta);
        if($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            return $r_array;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    
    /**
     * Comprueba si existe el mail pasado como parámetro, si existe
     * devuelve true, si no false
     */
    static function check_mail($mail){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users WHERE users.mail = '$mail'";
        $result = mysqli_query($mysqli,$consulta);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    
    /**
     * Comprueba si existe el user pasado como parámetro, si existe
     * devuelve true, si no false
     */
    static function check_user_exists($user){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users WHERE users.user = '$user'";
        $result = mysqli_query($mysqli,$consulta);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    
    /**
     * Modifica el usuario con la id pasada como parámetro
     */
    static function modificar_user($id,$user,$nombre,$ap_1,$ap_2,$mail,$permisos){ 
        $mysqli = self::connection();
        $consulta = "UPDATE users 
                    SET 
                        user = '$user',
                        nombre = '$nombre',
                        apellido_1 = '$ap_1',
                        apellido_2 = '$ap_2',
                        mail = '$mail',
                        permisos = '$permisos'
                    WHERE id = '$id'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    
    /**
     * Elimina el usuario con la id pasada como parámetro
     */
    static function borrar_user($id){ 
        $mysqli = self::connection();
        $consulta = "DELETE FROM users 
                    WHERE id = '$id'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    
    /**
     * Crea el usuario con los datos pasados como parámetro y devuelve un array con los datos del nuevo usuario
     */
    static function crear_user($user_form, $pwd, $name, $ap_1, $ap_2, $correo, $permisos){ 
        $mysqli = self::connection();
        $consulta = "INSERT INTO users (user, password, nombre, apellido_1, apellido_2, mail, permisos)  
        VALUES ('$user_form', '$pwd', '$name', '$ap_1', '$ap_2', '$correo', '$permisos')";
        if (mysqli_query($mysqli,$consulta)){
            $consulta_2 = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
            if ($result = mysqli_query($mysqli,$consulta_2)){
                $r_array = mysqli_fetch_array($result,MYSQLI_ASSOC);
                return $r_array;
                /* liberar el conjunto de resultados */
                $result->close();
            }else{
                return false;
            }
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    
    /**
     * Busca los usuarios que coincidan con los datos pasados como parámetros
     */
    static function find_user($id, $user_form, $nombre, $apellido_1, $apellido_2, $mail, $permisos){ 
        $mysqli = self::connection();
        $consulta = "SELECT * 
                        FROM 
                            users 
                        WHERE 
                            id LIKE '%$id%'
                            AND user LIKE '%$user_form%'
                            AND nombre LIKE '%$nombre%'
                            AND apellido_1 LIKE '%$apellido_1%'
                            AND apellido_2 LIKE '%$apellido_2%'
                            AND mail LIKE '%$mail%'
                            AND permisos LIKE '%$permisos%'";
        if ($result = mysqli_query($mysqli,$consulta)){
            $resultado = [];
            while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($resultado,$r_array);
            }
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }


    
    /**
     * Modifica la password del id de usuario pasado como parámetro
     */
    static function modificar_password($id,$password){ 
        $mysqli = self::connection();
        $consulta = "UPDATE users 
                    SET 
                        password = '$password'
                    WHERE id = '$id'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }


    /*********************************************************************************/
    /***************************Consultas de productos********************************/
    /*********************************************************************************/
    
    /**
     * Comprueba producto por id y devuelve un array con los datos del producto si existe
     */
    static function check_ref($ref){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM productos WHERE productos.referencia = '$ref'";
        $result = mysqli_query($mysqli,$consulta);
        if($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            return $r_array;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }
    
    /**
     * Busca producto por nombre y devuelve un array con los productos coincidentes
     */
    static function check_name($name){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM productos WHERE productos.producto LIKE '%$name%'";
        if($result = mysqli_query($mysqli,$consulta)){
            $resultado = [];
            while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($resultado,$r_array);
            }
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }
    
    /**
     * Busca producto por referencia del fabricante y devuelve un array con los productos coincidentes
     */
    static function check_fab($fab){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM productos WHERE productos.ref_fabricante LIKE '%$fab%'";
        if($result = mysqli_query($mysqli,$consulta)){
            $resultado = [];
            while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($resultado,$r_array);
            }
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }
    
    
    /**
     * Insertar nuevo producto en la base de datos
     */
    static function create_prod($producto,$cantidad,$creador,$ref_fabricante){ 
        $mysqli = self::connection();
        $fecha = date('Y-m-d');
        $consulta = "INSERT INTO productos (producto, cantidad, creado, modificado, fecha_creacion, fecha_modificacion, ref_fabricante)  
                    VALUES ('$producto', '$cantidad', '$creador', '$creador', '$fecha', '$fecha', '$ref_fabricante')";
        if($result = mysqli_query($mysqli,$consulta)){
            $consulta_resultado = "SELECT * FROM productos ORDER BY productos.referencia DESC LIMIT 1";
            $result = mysqli_query($mysqli,$consulta_resultado);
            $resultado = mysqli_fetch_array($result,MYSQLI_ASSOC);
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Borrar producto de la base de datos
     */
    static function delete_prod($referencia){ 
        $mysqli = self::connection();
        $consulta = "DELETE FROM productos WHERE productos.referencia = '$referencia'";
        if($result = mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }
    
    /**
     * Modifica un producto en la base de datos
     */
    static function update_prod($referencia, $producto, $cantidad, $creador, $ref_fabricante){ 
        $mysqli = self::connection();
        $fecha = date('Y-m-d');
        $consulta = "UPDATE productos 
                    SET producto = '$producto',
                        cantidad = '$cantidad',
                        modificado = '$creador',
                        fecha_modificacion = '$fecha',
                        ref_fabricante = '$ref_fabricante'
                    WHERE 
                        referencia = '$referencia'";
        if($result = mysqli_query($mysqli,$consulta)){
            return $result;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }


    /*********************************************************************************/
    /*************************Consultas de solicitudes_pwd****************************/
    /*********************************************************************************/

    
    /**
     * Busca solicitudes de reseteo de password, si hay alguna devuelve un array con las solicitudes, si no devuelve false
     */
    static function search_sol_pwd(){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM solicitudes_pwd";
        if($result = mysqli_query($mysqli,$consulta)){
            $resultado = [];
            while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($resultado,$r_array);
            }
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }
    
    /**
     * Borra la solicitud de reseteo de password pasada por parámetro, si no existe devuelve true, si no false
     */
    static function delete_sol_pwd($id_solicitud){ 
        $mysqli = self::connection();
        $consulta = "DELETE FROM solicitudes_pwd WHERE id_solicitud = '$id_solicitud'";
        if(mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /*********************************************************************************/
    /*************************Consultas de solicitudes_registro****************************/
    /*********************************************************************************/

    
    /**
     * Busca solicitudes de registro, si hay alguna devuelve un array con las solicitudes, si no devuelve false
     */
    static function search_sol_reg(){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM solicitudes_registro";
        if($result = mysqli_query($mysqli,$consulta)){
            $resultado = [];
            while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($resultado,$r_array);
            }
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }
    
    /**
     * Borra la solicitud de reseteo de password pasada por parámetro, si no existe devuelve true, si no false
     */
    static function delete_sol_reg($id_solicitud){ 
        $mysqli = self::connection();
        $consulta = "DELETE FROM solicitudes_registro WHERE id_solicitud = '$id_solicitud'";
        if(mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }
}
?>