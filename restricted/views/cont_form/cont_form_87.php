<!DOCTYPE html>
<!-- Permisos administrador -->
<div class="div_tit">
    <h3>Buscar usuario</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=4&cont_form=81&result=10" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 15;
                include './views/forms/empleado_disp_2.php';
                include './views/forms/empleado_disp_hidden.php';
                include './views/forms/usuario_value.php';
                include './views/forms/nombre_value_2.php';
                include './views/forms/apellido_1_value_2.php';
                include './views/forms/apellido_2_value_2.php';
                include './views/forms/mail_value_2.php';
                include './views/forms/mail_value_2_hidden.php';
                include './views/forms/permisos_value.php';
                include './views/forms/accion.php';
                include './views/forms/borrar.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>