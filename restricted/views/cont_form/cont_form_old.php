<!DOCTYPE html>
<div class="div_tit">
    <h3><?php echo $title_form; ?></h3>
    <h3>
        <?php
        if ($page == 'cuenta'){
            if ($form == 'datos'){echo 'Para modificar sus datos pulse Modificar';}//cont_form = 1
            if ($form == 'pwd'){echo 'Introducir la nueva contraseña';}//cont_form = 2
            if ($form == 'logout'){echo 'Salir';}
        }
        elseif ($page == 'modifica'){
            if ($form == 'alta'){echo 'Introducir producto y cantidad';}//cont_form = 3
            if ($form == 'baja'){echo 'Introduzca referencia a dar de baja';}//cont_form = 4
            if ($form == 'modif'){echo 'Introducir los datos de la referencia a modificar';}//cont_form = 5
        }
        elseif ($page == 'consultas'){
            if ($form == 'ref'){echo 'Introducir referencia';}//cont_form = 6
            if ($form == 'name'){echo 'Introduzca nombre del producto';}//cont_form = 7
            if ($form == 'fab'){echo 'Introduzca la referencia del fabricante';}//cont_form = 8
        }
        elseif ($page == 'admin'){
            if ($form == 'bus_user'){echo 'Buscar usuario';}//cont_form = 9
            if ($form == 'mod_user'){echo 'Modificar usuario';}//cont_form = 10
            if ($form == 'cre_user'){echo 'Crear usuario';}//cont_form = 11
            if ($form == 'bor_user'){echo 'Borrar usuario';}//cont_form = 12
            if ($form == 'sol_pwd'){echo 'Solicitudes de contraseña';}//cont_form = 13
            if ($form == 'sol_reg'){echo 'Solicitudes de registro';}//cont_form = 14
        }
        else{echo 'Introducir referencia';}
        ?>
    </h3>
</div>
<div class="div_formulario">
    <form action="" method="post">
        <fieldset>
            <div id="div_fiedlset">
            <?php echo $forms; ?>
            </div>
        </fieldset>
        <?php
        if (isset($page)){
            ?>
            <fieldset>
            <div id="div_fiedlset">
                <?php
                switch($form){
                    case 'datos'://cont_form = 1
                        include './views/forms/usuario.php';
                        include './views/forms/nombre.php';
                        include './views/forms/apellido_1.php';
                        include './views/forms/apellido_2.php';
                        include './views/forms/empleado.php';
                        include './views/forms/mail.php';
                        include './views/forms/modificar.php';
                        break;
                    case 'pwd'://cont_form = 2
                        include './views/forms/password.php';
                        include './views/forms/password_bis.php';
                        include './views/forms/submit.php';
                        break;
                    case 'alta'://cont_form = 3
                        if ((($permisos == 'Escritura') || ($permisos == 'Administrador'))){
                            include './views/forms/producto.php';
                            include './views/forms/cantidad.php';
                            include './views/forms/ref_fabricante.php';
                            include './views/forms/submit.php';
                            break;
                        } else {
                            echo '¡¡¡NO TIENE PERMISOS PARA UTILIZAR ESTA FUNCIÓN!!!';
                            break;
                        }
                    case 'baja'://cont_form = 4
                        if ((($permisos == 'Escritura') || ($permisos == 'Administrador'))){
                            include './views/forms/referencia.php';
                            include './views/forms/submit.php';
                            break;
                        } else {
                            echo '¡¡¡NO TIENE PERMISOS PARA UTILIZAR ESTA FUNCIÓN!!!';
                            break;
                        }
                    case 'modif'://cont_form = 5
                        if ((($permisos == 'Escritura') || ($permisos == 'Administrador'))){
                            include './views/forms/referencia.php';
                            include './views/forms/producto.php';
                            include './views/forms/cantidad.php';
                            include './views/forms/ref_fabricante.php';
                            include './views/forms/submit.php';
                            break;
                        } else {
                            echo '¡¡¡NO TIENE PERMISOS PARA UTILIZAR ESTA FUNCIÓN!!!';
                            break;
                        }
                    case 'ref'://cont_form = 6
                        include './views/forms/referencia.php';
                        include './views/forms/submit.php';
                        break;
                    case 'name'://cont_form = 7
                        include './views/forms/producto.php';
                        include './views/forms/submit.php';
                        break;
                    case 'fab'://cont_form = 8
                        include './views/forms/ref_fabricante.php';
                        include './views/forms/submit.php';
                        break;
                    case 'bus_user'://cont_form = 9
                        if (($permisos == 'Administrador')){
                            include './views/forms/empleado.php';
                            include './views/forms/usuario.php';
                            include './views/forms/nombre.php';
                            include './views/forms/apellido_1.php';
                            include './views/forms/apellido_2.php';
                            include './views/forms/mail.php';
                            include './views/forms/submit.php';
                            break;
                        } else {
                            echo '¡¡¡NO TIENE PERMISOS PARA UTILIZAR ESTA FUNCIÓN!!!';
                            break;
                        }
                    case 'mod_user'://cont_form = 10
                        if (($permisos == 'Administrador')){
                            include './views/forms/empleado.php';
                            include './views/forms/usuario.php';
                            include './views/forms/password.php';
                            include './views/forms/nombre.php';
                            include './views/forms/apellido_1.php';
                            include './views/forms/apellido_2.php';
                            include './views/forms/mail.php';
                            include './views/forms/submit.php';
                            break;
                        } else {
                            echo '¡¡¡NO TIENE PERMISOS PARA UTILIZAR ESTA FUNCIÓN!!!';
                            break;
                        }
                    case 'cre_user'://cont_form = 11
                        if (($permisos == 'Administrador')){
                            include './views/forms/usuario.php';
                            include './views/forms/password.php';
                            include './views/forms/nombre.php';
                            include './views/forms/apellido_1.php';
                            include './views/forms/apellido_2.php';
                            include './views/forms/mail.php';
                            include './views/forms/permisos.php';
                            include './views/forms/submit.php';
                            break;
                        } else {
                            echo '¡¡¡NO TIENE PERMISOS PARA UTILIZAR ESTA FUNCIÓN!!!';
                            break;
                        }
                    case 'bor_user'://cont_form = 12
                        if (($permisos == 'Administrador')){
                            include './views/forms/empleado.php';
                            break;
                        } else {
                            echo '¡¡¡NO TIENE PERMISOS PARA UTILIZAR ESTA FUNCIÓN!!!';
                            break;
                        }
                        case 'sol_pwd'://cont_form = 13
                            if (($permisos == 'Administrador')){
                                include './views/forms/sol_pwd.php';
                                break;
                            } else {
                                echo '¡¡¡NO TIENE PERMISOS PARA UTILIZAR ESTA FUNCIÓN!!!';
                                break;
                            }
                        case 'sol_reg'://cont_form = 14
                            if (($permisos == 'Administrador')){
                                include './views/forms/sol_reg.php';
                                break;
                            } else {
                                echo '¡¡¡NO TIENE PERMISOS PARA UTILIZAR ESTA FUNCIÓN!!!';
                                break;
                            }
                }
                ?>
            </div>
        </fieldset>
        <?php
        } else {
            ?>
            <fieldset>
            <div id="div_fiedlset">
                <?php
                include './views/forms/referencia.php';
                include './views/forms/submit.php';
                ?>
            </div>
        </fieldset>
        <?php
        }
        ?>
        
    </form>

</div>