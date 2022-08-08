<main class='contenedor seccion'>
    <h1>Crear propiedad</h1>

    <?php
    // Insertar el mensaje de error cuando falten datos para validar el formulario
    foreach ($errores as $error) : ?>
        <!-- div contenedor para darle estilos al error-->
        <div class='alerta error'> <?php echo $error; ?> </div>

    <?php endforeach;
    ?>
    <a href="/admin" class="btn btn-verde">Volver</a>
    
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type='submit' value='Crear Propiedad' class='btn btn-verde'>

    </form>


</main>