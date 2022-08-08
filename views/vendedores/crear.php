<main class='contenedor seccion'>
    <h1>Registrar Vendedor(a)</h1>

    <a href='/admin' class='btn btn-verde'> Volver</a>

    <?php
    // Insertar el mensaje de error cuando falten datos para validar el formulario
    foreach ($errores as $error) : ?>
        <!-- div contenedor para darle estilos al error-->
        <div class='alerta error'> <?php echo $error; ?> </div>

    <?php endforeach;
    ?>

    <form class='formulario' method='POST' action="/vendedores/crear">
        <?php include 'formulario.php' ?>
        <input type='submit' value='Registrar Vendedor' class='btn btn-verde'>

    </form>
    <!--Formulario -->
</main>