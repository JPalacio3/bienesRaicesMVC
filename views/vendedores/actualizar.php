<main class='contenedor seccion'>
    <h1>Actualizar Vendedor(a)</h1>

    <a href='/admin' class='btn btn-verde'> Volver</a>

    <?php
    // Insertar el mensaje de error cuando falten datos para validar el formulario
    foreach ($errores as $error) : ?>
        <!-- div contenedor para darle estilos al error-->
        <div class='alerta error'> <?php echo $error; ?> </div>

    <?php endforeach;
    ?>

    <form class='formulario' method='POST'>
        <?php include 'formulario.php' ?>
        <input type='submit' value='Guardar Cambios' class='btn btn-verde'>

    </form>
    <!--Formulario -->
</main>