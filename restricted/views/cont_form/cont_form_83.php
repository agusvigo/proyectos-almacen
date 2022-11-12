<!DOCTYPE html>
<!-- Permisos administrador -->
<div class="div_tit">
    <h3>Introdicir ID del usuario a borrar</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=4&cont_form=87&result=10" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 12;
                include './views/forms/empleado.php';
                include './views/forms/accion.php';
                include './views/forms/buscar.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>