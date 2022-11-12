<!DOCTYPE html>
<!-- Permisos administrador -->
<div class="div_tit">
    <h3>Buscar usuario</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=4&cont_form=80&result=9" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 11;
                include './views/forms/empleado.php';
                include './views/forms/usuario.php';
                include './views/forms/nombre.php';
                include './views/forms/apellido_1.php';
                include './views/forms/apellido_2.php';
                include './views/forms/mail.php';
                include './views/forms/permisos.php';
                include './views/forms/accion.php';
                include './views/forms/buscar.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>