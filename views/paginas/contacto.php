<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image.webp">
        <source srcset="build/img/destacada3.jpg" type="image.jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2 data-cy="heading-formulario">Llene el formulario de Contacto</h2>

    <form data-cy="formulario" class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre:</label>
            <input data-cy="nombre" type="text" placeholder="Tu nombre" id="nombre" required name="contacto[nombre]">

            <label for=" mensaje">Mensaje:</label>
            <textarea data-cy="mensaje" id="mensaje" name="contacto[mensaje]"> </textarea>
        </fieldset>
        <!--información personal-->

        <fieldset>
            <legend>Sobre la Propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select data-cy="opciones" id=" opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>--Seleccione--</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input data-cy="presupuesto" type="number" placeholder="Tu precio o presupuesto" id="presupuesto"
                min="100000" max="10000000" name="contacto[precio]" required>
        </fieldset>
        <!--sobre la propiedad-->

        <fieldset>
            <legend>Contacto</legend>
            <p>¿Cómo desea ser contactado?</p>
            <div class=" forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input data-cy="forma-contacto" type="radio" value="telefono" id="contactar-telefono" required
                    name="contacto[contacto]">

                <label for=" contactar-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" value="email" id="contactar-email" required
                    name="contacto[contacto]">
            </div>
            <!--.forma-contacto-->

            <!-- div para mostrar u ocultar el campo consicional según el método de contacto que elija -->
            <div data-cy="contacto-input" id="contacto"></div>

        </fieldset>

        <input data-cy="boton-enviar" type="submit" value="Enviar" class="btn-verde">
    </form>
</main>