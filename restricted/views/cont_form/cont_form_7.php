<!DOCTYPE html>
<!-- Permisos lectura -->
<div class="div_tit">
    <h3>Resultado</h3>
</div>
<div class="div_formulario">
    <form action="main.php" method="get">
        <fieldset>
            <div id="div_fiedlset">
                <?php
                if ($error == 'fallo_en_consulta') {
                    ?><h3>Ha fallado la consulta</h3><?php ;
                }
                elseif ($error == 'pwd_no_coincide') {
                    ?><h3>Las contraseñas introducidas no coinciden</h3><?php ;
                } else {
                    ?><h3>Error indefinido</h3><?php ;
                } ?>
                <input name="titulo_form" type="hidden" value="1">
                <input name="cont_form" type="hidden" value="2">
                <?php
                include './views/forms/aceptar.php';
                ?>
        </fieldset>
</div>