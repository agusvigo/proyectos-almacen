<!DOCTYPE html>
<!-- Permisos lectura -->
<div class="div_tit">
    <h3>Resultado</h3>
</div>
<div class="div_formulario">
    <form action="main.php" method="get">
        <fieldset>
            <div id="div_fiedlset">
                <h3>Modificación realizada con exito</h3>
                <input name="titulo_form" type="hidden" value="1">
                <input name="cont_form" type="hidden" value="2">
                <?php
                include './views/forms/aceptar.php';
                ?>
        </fieldset>
</div>