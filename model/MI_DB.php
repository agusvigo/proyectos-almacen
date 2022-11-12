<?php
include_once '../restricted/config/config.php';
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

    /*********************** Métodos de Usuarios****************************************/

    /**
     * Comprueba usuario y password del login
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
     * Comprueba Comprueba que el correo existe y si es así devuelve el id del usuario, si no devuelve false
     */
    static function check_mail($mail){  
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users WHERE users.mail = '$mail'";
        $result = mysqli_query($mysqli,$consulta);
        if ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            return $r_array['id'];
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Crea una nueva solicitud de reseteo de password en la base de datos
     */
    static function new_reset_pwd($id){  
        $mysqli = self::connection();
        $fecha = date('Y-m-d');
        $consulta = "INSERT INTO solicitudes_pwd (id_user,fecha) VALUES ('$id','$fecha')";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Crea una nueva solicitud de registro en la base de datos
     */
    static function new_reg_pet($nombre, $ap_1, $ap_2, $mail, $permisos){  
        $mysqli = self::connection();
        $consulta = "INSERT INTO solicitudes_registro (nombre, apellido_1, apellido_2, mail, permisos) VALUES ('$nombre', '$ap_1', '$ap_2', '$mail', '$permisos')";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }
}
?>