<!DOCTYPE html>
<!-- Permisos escritura -->
<div class="div_tit">
    <h3>Introducir los datos de la referencia a modificar</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=3&cont_form=52&result=8" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 10;
                include './views/forms/referencia_disp.php';
                include './views/forms/referencia_disp_hidden.php';
                include './views/forms/producto_value.php';
                include './views/forms/cantidad_value.php';
                include './views/forms/ref_fabricante_value.php';
                include './views/forms/accion.php';
                include './views/forms/submit.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>