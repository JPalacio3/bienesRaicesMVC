<?php

// REVISAR SI YA HAY UNA SESIÓN ACTIVA Y SI NO, CREARLA:
if (!isset($_SESSION)) {
    // ini_set('session.save_path', '/home/joelpalacio630@gmail.com/tmp');
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>😍Bienes Raíces😍</title>
    <link rel="stylesheet" href="../build/css/normalize.css">
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <!-- Esta es la validación de la clase inicio con php y la agrega -->
        <div class="contenedor .contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="logotipo de bienes raíces">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menú responsive">
                </div>
                <!--manu hamburguesa-->
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="boton dark-mode-boton">
                    <nav data-cy="navegacion-header" class="navegacion navOsc">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if (!$auth) : ?>
                        <a href="/login">Iniciar Sesión </a>
                        <?php endif; ?>
                        <?php if ($auth) : ?>
                        <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <!--.barra-->
            <?php echo $inicio ? "<h1 data-cy='heading-sitio' class='contenido-header' > Venta de Casas y Departamentos Exclusivos de Lujo </h1>" : ''; ?>
        </div>
    </header>


    <?php echo $contenido; ?>

    <!-- footer -->
    <footer class="footer seccion ">
        <div class="contenedor contenedor-footer ">
            <nav data-cy="navegacion-footer" class="navegacion navOsc ">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p data-cy="copyrigth" class="copyrigth">Todos los Derechos Reservados - J. Palacio &copy; -
            <?php echo date('Y'); ?>
            <!-- permite ajustar la fecha de manera automática. -->
        </p>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>

</html>