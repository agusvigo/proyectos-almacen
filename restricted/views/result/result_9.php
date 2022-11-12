<!DOCTYPE html>

<div class="div_resultado">
    <?php
    if (!is_null($datos_usuarios)){
        foreach($datos_usuarios as $value_datos){
            ?>
            <div class="div_resultado">
            <?php ;
            foreach($value_datos as $descripcion => $valor){
                if ($descripcion == 'id'){
                    ?>
                    <div class="form_descripcion"> ID Empleado</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
                if ($descripcion == 'user'){
                    ?>
                    <div class="form_descripcion">Usuario</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
                if ($descripcion == 'nombre'){
                    ?>
                    <div class="form_descripcion">Nombre</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
                if ($descripcion == 'apellido_1'){
                    ?>
                    <div class="form_descripcion">Apellido 1</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
                if ($descripcion == 'apellido_2'){
                    ?>
                    <div class="form_descripcion">Apellido 2</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
                if ($descripcion == 'mail'){
                    ?>
                    <div class="form_descripcion">Correo electrónico</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
                if ($descripcion == 'permisos'){
                    ?>
                    <div class="form_descripcion">Permisos</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
            }
            ?>
            </div>
            <?php ;
        }
    } else {
        ?>
        <h4><?php echo $error_usuario; ?></h4>
        <?php
    }
    ?>
</div>