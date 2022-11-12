<!DOCTYPE html>
<?php echo $title ?>
<?php
if (isset($page)){
    if ($page == 'cuenta'){echo "<h2>Mi cuenta</h2>";}// title = 1
    if ($page == 'modifica'){echo "<h2>Modificaciones</h2>";}// title = 2
    if ($page == 'consultas'){echo "<h2>Consultas</h2>";}// title = 3
    if ($page == 'admin'){echo "<h2>Administración</h2>";}// title = 4
}else{echo "<h2>Consultas</h2>";}
?>