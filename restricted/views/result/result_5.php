<!DOCTYPE html>

<div class="div_resultado">
    <?php
    if (!is_null($producto)){
        ?>
        <h4>Se eliminara el siguiente producto de la base de datos</h4>
        <h4>Pulse borrar para continuar</h4>
        <div class="form_descripcion">Referencia</div>
        <div class="form_contenido"><?php echo $producto['referencia']; ?></div>
        <div class="form_descripcion">Producto</div>
        <div class="form_contenido"><?php echo $producto['producto']; ?></div>
        <div class="form_descripcion">Stock</div>
        <div class="form_contenido"><?php echo $producto['cantidad']; ?></div>
        <div class="form_descripcion">Ref. fabricante</div>
        <div class="form_contenido"><?php echo $producto['ref_fabricante']; ?></div>
        <form action="main.php?titulo_form=3&cont_form=51&result=6" method="post">
        <div class="div_input_text"><input type="hidden" name="referencia" id="referencia" value="<?php echo $producto['referencia']; ?>"></div>
        <?php 
        $accion = 8;
        include './views/forms/accion.php';
        include './views/forms/borrar.php';
        ?>
        </form>
        <?php
    } else {
        ?>
        <h4><?php echo $error_producto; ?></h4>
        <?php
    }
    ?>
</div>