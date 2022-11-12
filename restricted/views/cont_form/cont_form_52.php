<!DOCTYPE html>
<!-- Permisos escritura -->
<div class="div_tit">
    <h3>Introducir la referencia del producto a modificar</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=3&cont_form=53&result=7" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 9;
                include './views/forms/referencia.php';
                include './views/forms/accion.php';
                include './views/forms/submit.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>