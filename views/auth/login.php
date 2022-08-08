<main class='contenedor seccion contenido-centrado'>
    <h1 data-cy="heading-login">Iniciar Sesión</h1>

    <?php
    // Agregamos la validación de errores al formulario:
    foreach ($errores as $error) : ?>
    <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <form data-cy="formulario-login" class='formulario' method='POST' action="/login">
        <fieldset>
            <legend>Email y Password</legend>

            <label for='email'>E-mail:</label>
            <input type='email' name="email" placeholder='Tu Email' id='email' required>

            <label for='password'>Password:</label>
            <input type='password' name="password" placeholder='Introduce un Password' id='password'>
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="btn btn-verde">
    </form>
</main>