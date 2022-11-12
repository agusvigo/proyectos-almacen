<!DOCTYPE html>

<div class="div_resultado">
    <?php
    if (!is_null($datos_usuarios)){
        ?>
        <h4><?php echo $datos_usuarios; ?></h4>
        <?php
    } elseif (!is_null($error_usuario)) {
        ?>
        <h4><?php echo $error_usuario; ?></h4>
        <?php
    }
    ?>
</div>