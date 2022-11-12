<!DOCTYPE html>
<div class="div_tit">
    <h3>
        <?php
        if (isset($form)){
            if ($form == 'login'){
                if($session == 'ko'){
                    ?>Los datos son incorrectos<?php
                } elseif ($session == 'end'){
                    ?>Sesión finalizada<?php
                } else {
                    ?>Introducir usuario y contraseña<?php
                }
            }
            if ($form == 'registro'){?>Introduzca sus datos para enviar la solicitud<?php }
            if ($form == 'recupera'){?>Introducir correo electrónico<?php }
        } else {
            ?>Introducir usuario y contraseña<?php
        }
        ?>
    </h3>
</div>
<div class="div_formulario">
    <form action="./router/router.php" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                if (isset($form)){
                    switch($form){
                        case 'login':
                            $accion = 1;
                            include './views/forms/usuario.php';
                            include './views/forms/password.php';
                            include './views/forms/accion.php';
                            include './views/forms/submit.php';
                            break;
                        case 'registro':
                            $accion = 2;
                            include './views/forms/nombre.php';
                            include './views/forms/apellido_1.php';
                            include './views/forms/apellido_2.php';
                            include './views/forms/mail.php';
                            include './views/forms/permisos.php';
                            include './views/forms/accion.php';
                            include './views/forms/submit.php';
                            break;
                        case 'recupera':
                            $accion = 3;
                            include './views/forms/mail.php';
                            include './views/forms/accion.php';
                            include './views/forms/submit.php';
                            break;
                    }
                } else {
                    include './views/forms/usuario.php';
                    include './views/forms/password.php';
                    include './views/forms/submit.php';
                }
                ?>
            </div>
        </fieldset>
    </form>
    <h4 id="message"><?php
         if (isset($message)){
            if ($message == 'peticion_enviada') echo 'Su petición se ha enviado correctamente';
            if ($message == 'fallo_consulta') echo 'La petición ha fallado, contacte con su administrador';
            if ($message == 'mail_incorrecto') echo 'El correo introducido es incorrecto';
         }
         ?>
    </h4>

</div>