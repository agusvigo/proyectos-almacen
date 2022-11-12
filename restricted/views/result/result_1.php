<!DOCTYPE html>

<div class="div_resultado">
    <?php
    if (!is_null($producto)){
        ?>
        <div class="form_descripcion">Referencia</div>
        <div class="form_contenido"><?php echo $producto['referencia']; ?></div>
        <div class="form_descripcion">Producto</div>
        <div class="form_contenido"><?php echo $producto['producto']; ?></div>
        <div class="form_descripcion">Stock</div>
        <div class="form_contenido"><?php echo $producto['cantidad']; ?></div>
        <div class="form_descripcion">Ref. fabricante</div>
        <div class="form_contenido"><?php echo $producto['ref_fabricante']; ?></div>
        <?php
    } else {
        ?>
        <h4><?php echo $error_producto; ?></h4>
        <?php
    }
    ?>
</div>