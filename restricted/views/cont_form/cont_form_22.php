<!DOCTYPE html>
<!-- Permisos lectura -->
<div class="div_tit">
    <h3>Introduzca la referencia del fabricante</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=2&cont_form=22&result=3" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 5;
                include './views/forms/ref_fabricante.php';
                include './views/forms/accion.php';
                include './views/forms/submit.php';
                ?>
            </div>
        </fieldset>
    </form>

</div>