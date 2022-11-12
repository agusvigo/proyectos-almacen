<!DOCTYPE html>
<!-- Permisos lectura -->
<div class="div_tit">
    <h3>Para modificar sus datos pulse Modificar</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=1&cont_form=1" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 1;
                include './views/forms/usuario_disp.php';
                include './views/forms/nombre_value.php';
                include './views/forms/apellido_1_value.php';
                include './views/forms/apellido_2_value.php';
                include './views/forms/empleado_disp.php';
                include './views/forms/accion.php';
                include './views/forms/mail_value.php';
                ?>
                <div class="div_boton_doble"><input type="Submit" name="modificar" id="modificar" value="Modificar"></div>
            </div>
        </fieldset>
    </form>
    <form action="main.php" method="get">
        <input name="titulo_form" type="hidden" value="1">
        <input name="cont_form" type="hidden" value="1">
        <div class="div_boton_2"><input type="Submit" name="cancelar" id="cancelar" value="Cancelar"></div>
    </form>

</div>