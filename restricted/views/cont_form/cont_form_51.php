<!DOCTYPE html>
<!-- Permisos escritura -->
<div class="div_tit">
    <h3>Introduzca referencia a dar de baja</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=3&cont_form=51&result=5" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 7;
                include './views/forms/referencia.php';
                include './views/forms/accion.php';
                include './views/forms/buscar.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>