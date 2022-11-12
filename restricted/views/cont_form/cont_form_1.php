<!DOCTYPE html>
<!-- Permisos lectura -->
<div class="div_tit">
    <h3>Para modificar sus datos pulse Modificar</h3>
</div>
<div class="div_formulario">
    <form action="main.php" method="get">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                include './views/forms/usuario_disp.php';
                include './views/forms/nombre_disp.php';
                include './views/forms/apellido_1_disp.php';
                include './views/forms/apellido_2_disp.php';
                include './views/forms/empleado_disp.php';
                include './views/forms/mail_disp.php';
                ?>
                <input name="titulo_form" type="hidden" value="1">
                <input name="cont_form" type="hidden" value="3">
                <?php
                include './views/forms/modificar.php';
                ?>
            </div>
        </fieldset>
    </form>

</div>