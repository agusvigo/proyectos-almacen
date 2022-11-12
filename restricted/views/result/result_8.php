<!DOCTYPE html>

<div class="div_resultado">
    <?php
    if ($producto){
        ?>
        <h4>Se ha modificado el producto solicitado</h4>
        <?php
    } else {
        ?>
        <h4><?php echo $error_producto; ?></h4>
        <?php
    }
    ?>
</div>