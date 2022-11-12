<!DOCTYPE html>

<div class="div_resultado">
    <?php
    if (!is_null($datos_usuarios)){
        foreach($datos_usuarios as $value_datos){
            ?>
            <div class="div_formulario">
                <form action="main.php?titulo_form=4&cont_form=85&result=13" method="post">
                    
            <?php ;
            foreach($value_datos as $descripcion => $valor){
                if ($descripcion == 'id_solicitud') $id_solicitud = $valor;
                if ($descripcion == 'nombre') $name = $valor;
                if ($descripcion == 'apellido_1') $ap_1 = $valor;
                if ($descripcion == 'apellido_2') $ap_2 = $valor;
                if ($descripcion == 'mail') $correo = $valor;
                if ($descripcion == 'permisos') $permisos_2 = $valor;
            }
            $accion = 19;
            include './views/forms/id_solicitud_disp.php';
            include './views/forms/id_solicitud_disp_hidden.php';
            include './views/forms/nombre_disp_2.php';
            include './views/forms/apellido_1_disp_2.php';
            include './views/forms/apellido_2_disp_2.php';
            include './views/forms/mail_disp_2.php';
            include './views/forms/permisos_disp.php';
            include './views/forms/accion.php';
            include './views/forms/borrar.php';
            ?>
                </form>
            </div>
            <?php 
        }
    } else {
        ?>
        <h4><?php echo $error_usuario; ?></h4>
        <?php
    }
    ?>
</div>