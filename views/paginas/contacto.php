<main class="contenedor seccion">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image.webp">
        <source srcset="build/img/destacada3.jpg" type="image.jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Tu nombre" id="nombre" required name="contacto[nombre]">

            <label for=" email">E-mail:</label>
            <input type="email" name="email" placeholder="Tu Email" id="email" required name="contacto[email]">

            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" placeholder="Tu teléfono" id="telefono" required
                name="contacto[telefono]">

            <label for=" mensaje">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" name="contacto[mensaje]"> Escribe tu mensaje</textarea>
        </fieldset>
        <!--información personal-->

        <fieldset>
            <legend>Sobre la Propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select id=" opciones" name="tipo" name="contacto[tipo]" required>
                <option value="" disabled selected>--Seleccione--</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" name="precio" placeholder="Tu precio o presupuesto" id="presupuesto" min="100000"
                max="10000000" name="contacto[precio]" required>
        </fieldset>
        <!--sobre la propiedad-->

        <fieldset>
            <legend>Contacto</legend>
            <p>¿Cómo desea ser contactado?</p>
            <div class=" forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono" required
                    name="contacto[contacto]">

                <label for=" contactar-email">E-mail</label>
                <input name="contacto" type="radio" value="email" id="contactar-email" required
                    name="contacto[contacto]">
            </div>
            <!--.forma-contacto-->

            <p>Si eligió teléfono, elija la fecha y la hora </p>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" name="hora" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        </fieldset>

        <input type="submit" value="Enviar" class="btn-verde">
    </form>
</main>