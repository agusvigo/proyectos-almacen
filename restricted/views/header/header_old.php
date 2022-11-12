<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Almacén</title>
    <link rel="stylesheet" href="../styles/estilos.css">
    <link rel="shortcut icon" href="../favicon.png" type="image/png">
</head>
<body>
    <header id="div_header">
        <a href="main.php?page=consultas&form=ref"><h1>ALMACEN</h1></a>
        <!-- Menu normal -->
        <nav>
            <ul>
                <?php echo $menu_nav; ?>
                <?php if ($permisos == 'Administrador'){// menu_nav = 1 ?>
                <li><a href="main.php?page=consultas&form=ref">Consultas</a></li>
                <li><a href="main.php?page=modifica&form=alta">Modificaciones</a></li>
                <li><a href="main.php?page=admin&form=bus_user">Administración</a></li>
                <li><a href='main.php?page=cuenta&form=datos'>Mi cuenta</a></li>
                <?php } ?>
                <?php if ($permisos == 'Escritura'){// menu_nav = 2 ?>
                <li><a href="main.php?page=consultas&form=ref">Consultas</a></li>
                <li><a href="main.php?page=modifica&form=alta">Modificaciones</a></li>
                <li><a href='main.php?page=cuenta&form=datos'>Mi cuenta</a></li>
                <?php } ?>
                <?php if ($permisos == 'Lectura'){// menu_nav = 3 ?>
                <li><a href="main.php?page=consultas&form=ref">Consultas</a></li>
                <li><a href='main.php?page=cuenta&form=datos'>Mi cuenta</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main>