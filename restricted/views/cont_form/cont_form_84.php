<!DOCTYPE html>
<!-- Permisos administrador -->
<div class="div_tit">
    <h3>Solicitudes de contraseña</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=4&cont_form=84&result=12" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 16;
                include './views/forms/accion.php';
                include './views/forms/buscar.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>