<!DOCTYPE html>
<!-- Permisos lectura -->
<div class="div_tit">
    <h3>Introduzca nombre completo o parcial del producto</h3>
</div>
<div class="div_formulario">
    <form action="main.php?titulo_form=2&cont_form=21&result=2" method="post">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                $accion = 4;
                include './views/forms/producto.php';
                include './views/forms/accion.php';
                include './views/forms/submit.php';
                ?>
            </div>
        </fieldset>
    </form>

</div>