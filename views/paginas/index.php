<main class="contenedor seccion">
    <h2 data-cy="heading-nosotros">Más Sobre Nosotros</h2>

    <?php include 'iconos.php'; ?>

</main>

<section class=" seccion contenedor ">
    <h2>Casas y Depas en Venta</h2>

    <?php
    include 'listado.php'; //incluir archivo de anuncios
    ?>

    <!--contenedor-anuncio-->
    <div class=" alinear-derecha ">
        <a href="/propiedades" class=" btn-verde " data-cy="ver-propiedades">Ver Todas</a>
    </div>
</section>

<section data-cy="imagen-contacto" class=" imagen-contacto ">
    <h2>Encuentra la Casa de tus Sueños</h2>
    <p>LLena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="/contacto" class=" btn-amarillo ">Contáctanos</a>
</section>
<!-- sección imagen-contacto -->

<div class=" contenedor seccion seccion-inferior ">
    <section data-cy="blog" class=" blog ">
        <h3>Nuestro Blog</h3>

        <article class=" entrada-blog ">
            <div class=" imagen ">
                <picture>
                    <source srcset=" build/img/blog1.webp " type=" image/webp ">
                    <source srcset=" build/img/blog1.jpg " type=" image/jpeg ">
                    <img loading=" lazy " src=" build/img/blog1.jpg " alt=" Texto entrada Blog ">
                </picture>
            </div>
            <div class=" texto-entrada ">
                <a href=" /propiedad ">
                    <h4>Terraza en el Techo de Tu Casa</h4>
                    <p class=" informacion-meta ">Escrito el <span>25-Sept-2021</span> por: <span>Darik Palacio</span>
                    </p>
                    <p>
                        Consejos para construir una terraza en el techo de tu casa con los mejores materiales y
                        ahorrando dinero.
                    </p>
                </a>
            </div>
        </article>

        <article class=" entrada-blog ">
            <div class=" imagen ">
                <picture>
                    <source srcset=" build/img/blog2.webp " type=" image/webp ">
                    <source srcset=" build/img/blog2.jpg " type=" image/jpeg ">
                    <img loading=" lazy " src=" build/img/blog2.jpg " alt=" Texto entrada Blog ">
                </picture>
            </div>
            <div class=" texto-entrada ">
                <a href=" /propiedad ">
                    <h4>Guía para la Decoración de Tu Hogar</h4>
                    <p class=" informacion-meta ">Escrito el <span>30-Ago-2021</span> por: <span>Johan Cotoplo</span>
                    </p>
                    <p>
                        Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores para darle
                        vida a tu espacio.
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section data-cy="testimoniales" class=" testimoniales ">
        <h3>Testimoniales</h3>

        <div class=" testimonial ">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple
                con todas mis expectativas.
            </blockquote>
            <p>- Tatán Palacio</p>
        </div>
    </section>
</div>