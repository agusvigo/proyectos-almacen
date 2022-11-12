<!DOCTYPE html>

<div class="div_resultado">
    <?php
    if (!is_null($datos_usuarios)){
        foreach($datos_usuarios as $value_datos){
            ?>
            <div class="div_formulario">
                <form action="main.php?titulo_form=4&cont_form=84&result=12" method="post">
                    
            <?php ;
            foreach($value_datos as $descripcion => $valor){
                if ($descripcion == 'id_solicitud') $id_solicitud = $valor;
                if ($descripcion == 'id_user') $id_user = $valor;
                if ($descripcion == 'fecha') $fecha = $valor;
            }
            $accion = 17;
            include './views/forms/id_solicitud_disp.php';
            include './views/forms/id_solicitud_disp_hidden.php';
            include './views/forms/id_user_disp.php';
            include './views/forms/fecha_disp.php';
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