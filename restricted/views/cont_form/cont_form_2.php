<!DOCTYPE html>
<!-- Permisos lectura -->
<div class="div_tit">
    <h3>Introducir la nueva contraseña</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=1&cont_form=2" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 2;
                include './views/forms/password.php';
                include './views/forms/password_bis.php';
                include './views/forms/accion.php';
                include './views/forms/submit.php';
                ?>
            </div>
        </fieldset>
    </form>

</div>