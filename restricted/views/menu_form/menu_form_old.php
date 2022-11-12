<!DOCTYPE html>
<nav>
    <ul>
        <?php echo $menu_form; ?>
        <?php
        if (isset($page)){
            if ($page == 'cuenta'){echo// menu_form = 1 
                "<li><a href='main.php?page=cuenta&form=datos'>Mis Datos</a></li>
                <li><a href='main.php?page=cuenta&form=pwd'>Cambiar contraseña</a></li>
                <li><a href='./router/router_private.php?accion=0'>Salir</a></li>";}
            if ((($permisos == 'Escritura') ||($permisos == 'Administrador')) && ($page == 'modifica')){echo// menu_form = 2  
                "<li><a href='main.php?page=modifica&form=alta'>Alta</a></li>
                <li><a href='main.php?page=modifica&form=baja'>Baja</a></li>
                <li><a href='main.php?page=modifica&form=modif'>Modificación</a></li>";}
            if ($page == 'consultas'){echo// menu_form = 3
                "<li><a href='main.php?page=consultas&form=ref'>Buscar por referencia</a></li>
                <li><a href='main.php?page=consultas&form=name'>Buscar por nombre</a></li>
                <li><a href='main.php?page=consultas&form=fab'>Buscar por r. fabricante</a></li>";}
            if (($permisos == 'Administrador') && ($page == 'admin')){echo// menu_form = 4
                "<li><a href='main.php?page=admin&form=bus_user'>Buscar usuario</a></li>
                <li><a href='main.php?page=admin&form=mod_user'>Modificar usuario</a></li>
                <li><a href='main.php?page=admin&form=cre_user'>Crear usuario</a></li>
                <li><a href='main.php?page=admin&form=bor_user'>Borrar usuario</a></li>
                <li><a href='main.php?page=admin&form=sol_pwd'>Solicitudes r.password</a></li>
                <li><a href='main.php?page=admin&form=sol_reg'>Solicitudes de registro</a></li>";}
        }else{echo 
            "<li><a href='main.php?page=consultas&form=ref'>Buscar por referencia</a></li>
            <li><a href='main.php?page=consultas&form=name'>Buscar por nombre</a></li>
            <li><a href='main.php?page=consultas&form=fab'>Buscar por r. fabricante</a></li>";}
        ?>
    </ul>
</nav>