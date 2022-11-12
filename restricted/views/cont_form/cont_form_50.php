<!DOCTYPE html>
<!-- Permisos escritura -->
<div class="div_tit">
    <h3>Introducir los datos del producto</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=3&cont_form=50&result=4" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 6;
                include './views/forms/producto.php';
                include './views/forms/cantidad.php';
                include './views/forms/ref_fabricante.php';
                include './views/forms/accion.php';
                include './views/forms/submit.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>