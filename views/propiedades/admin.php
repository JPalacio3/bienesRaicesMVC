<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces</h1>

    <!-- Validar que exista el resultado y lo imprime como un memsaje en pantalla.
intval() se usa para convertir un VALOR DE STRING A NÚMERO. Posteriormente agrego alertify y JQery para mostrar la notificación-->
    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo  s($mensaje); ?> </p>
    <?php }
    } ?>


    <a href="/propiedades/crear" class="btn btn-verde"> Nueva Propiedad</a>
    <a href="/vendedores/crear" class="btn btn-amarillo"> Nuevo(a) Vendedor(a)</a>

    <table class="propiedades">
        <h2>Propiedades</h2>
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>imágen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostrar los resultados-->
            <?php foreach ($propiedades as $propiedad) : ?>

                <tr>
                    <td class="id-color"><?php echo $propiedad->id ?> </td>
                    <td> <?php echo $propiedad->titulo ?> </td>
                    <td> <?php echo $propiedad->descripcion ?> </td>
                    <td> <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-tabla" alt="imagen de propiedad"></td>
                    <td> $ <?php echo $propiedad->precio ?> </td>
                    <td>
                        <!--Abrir ventanas tipo popUp -->
                        <a href=" /propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>

                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- VENDEDORES -->

    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostrar los resultados-->
            <?php foreach ($vendedores as $vendedor) : ?>

                <tr>
                    <td class="id-color"><?php echo $vendedor->id; ?> </td>
                    <td> <?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?> </td>
                    <td><?php echo $vendedor->telefono; ?> </td>
                    <td>
                        
                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>

                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



</main>