<!DOCTYPE html>
<!-- Permisos administrador -->
<div class="div_tit">
    <h3>Solicitudes de registro</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=4&cont_form=85&result=13" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 18;
                include './views/forms/accion.php';
                include './views/forms/buscar.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>