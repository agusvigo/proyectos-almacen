<!DOCTYPE html>
<!-- Permisos lectura -->
<div class="div_tit">
    <h3>Introducir referencia</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=2&cont_form=20&result=1" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 3;
                include './views/forms/referencia.php';
                include './views/forms/accion.php';
                include './views/forms/submit.php';
                ?>
            </div>
        </fieldset>
    </form>

</div>