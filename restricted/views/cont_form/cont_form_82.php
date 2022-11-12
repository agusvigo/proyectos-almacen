<!DOCTYPE html>
<!-- Permisos administrador -->
<div class="div_tit">
    <h3>Crear usuario</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=4&cont_form=82&result=11" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 14;
                include './views/forms/usuario.php';
                include './views/forms/password.php';
                include './views/forms/password_bis.php';
                include './views/forms/nombre.php';
                include './views/forms/apellido_1.php';
                include './views/forms/apellido_2.php';
                include './views/forms/mail.php';
                include './views/forms/permisos_2.php';
                include './views/forms/accion.php';
                include './views/forms/crear.php';
                ?>
            </div>
        </fieldset>
    </form>
</div>