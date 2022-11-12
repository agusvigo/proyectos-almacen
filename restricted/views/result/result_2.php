<!DOCTYPE html>

<div class="div_resultado">
    <?php
    if (!is_null($producto)){
        foreach($producto as $value_prod){
            ?>
            <div class="div_resultado">
            <?php ;
            foreach($value_prod as $descripcion => $valor){
                if ($descripcion == 'referencia'){
                    ?>
                    <div class="form_descripcion">Referencia</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
                if ($descripcion == 'producto'){
                    ?>
                    <div class="form_descripcion">Producto</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
                if ($descripcion == 'cantidad'){
                    ?>
                    <div class="form_descripcion">Stock</div>
                    <div class="form_contenido"><?php echo $valor; ?></div>
                    <?php
                }
                if ($descripcion == 'ref_fabricante'){
                    ?>
                    <div class="form_descripcion">Ref. fabricante</div>
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
        <h4><?php echo $error_producto; ?></h4>
        <?php
    }
    ?>
</div>