/// <reference types="Cypress" />


describe('Página principal', () => {
    it('Prueba el Header de la página principal', () => {

        // Visitar la página principal:
        cy.visit('/');

        // Verificar que el heading contenga una clase data-cy válida:
        cy.get('[data-cy = "heading-sitio"]').should('exist');

        // Verifica que exista un texto en específico de la página:
        cy.get('[data-cy = "heading-sitio"]').invoke('text').should('equal', ' Venta de Casas y Departamentos Exclusivos de Lujo ');

        // Verifica que NO exista un texto en específico de la página:
        cy.get('[data-cy = "heading-sitio"]').invoke('text').should('not.equal', ' Bienes Raices');
    });

    it('Prueba el bloque de los íconos principales', () => {

        cy.get('[data-cy = "heading-nosotros"]').should('exist');
        cy.get('[data-cy = "heading-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2');

        // Selecciona los íconos principales:
        cy.get('[data-cy = "iconos-nosotros"]').should('exist');

        // Comprueba que haya tres íconos:
        cy.get('[data-cy = "iconos-nosotros"]').find('.icono').should('have.length', 3);

        // Comprueba que no haya más de trers íconos
        cy.get('[data-cy = "iconos-nosotros"]').find('.icono').should('not.have.length', 4, 'No debería haber más de tres íconos');
    });

    it('Prueba la sección de Propiedades', () => {

        // Debe haber 3 propiedades:
        cy.get('[data-cy = "anuncio"]').should('exist');
        cy.get('[data-cy = "anuncio"]').should('have.prop', 'tagName').should('equal', 'DIV');
        cy.get('[data-cy = "anuncio"]').should('have.length', 3);
        cy.get('[data-cy = "anuncio"]').should('not.have.length', 4, 'No debería haber más de tres íconos');

        // Probar el enlace de las propiedades:
        cy.get('[data-cy = "enlace-propiedad"]').should('have.class', 'btn-amarillo-block');
        cy.get('[data-cy = "enlace-propiedad"]').should('not.have.class', 'btn-amarillo');
        cy.get('[data-cy = "enlace-propiedad"]').should('have.length', 3);
        cy.get('[data-cy = "enlace-propiedad"]').should('not.have.length', 4);

        cy.get('[data-cy = "enlace-propiedad"]').first().invoke('text').should('equal', 'Ver Propiedad');

        // PROBAR EL ENLACE A UNA PROPIEDAD:
        cy.get('[data-cy = "enlace-propiedad"]').first().click();
        cy.get('[data-cy = "titulo-propiedad"]').should('exist');
        cy.wait(2000);
        // Regresar a la página principal:
        cy.go('back');

    });

    it('Prueba  El Routing hacia todas las propiedades', () => {
        cy.get('[data-cy = "ver-propiedades"]').should('exist');
        cy.get('[data-cy = "ver-propiedades"]').should('have.class', 'btn-verde');
        cy.get('[data-cy = "ver-propiedades"]').should('not.have.class', 'btn-amarillo');
        cy.get('[data-cy = "ver-propiedades"]').invoke('attr', 'href').should('equal', '/propiedades');
        cy.get('[data-cy = "ver-propiedades"]').click();

        cy.get('[data-cy = "heading-propiedades"]').should('exist');
        cy.get('[data-cy = "heading-propiedades"]').invoke('text').should('equal', 'Casas y Depas en Venta');

        cy.wait(2000);
        // Regresar a la página principal:
        cy.go('back');

    });

    it('Prueba el bloque de contacto', () => {
        cy.get('[data-cy = "imagen-contacto"]').should('exist');
        cy.get('[data-cy = "imagen-contacto"]').find('h2').invoke('text').should('equal', 'Encuentra la Casa de tus Sueños');
        cy.get('[data-cy = "imagen-contacto"]').find('p').invoke('text').should('equal', 'LLena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad');
        cy.get('[data-cy = "imagen-contacto"]').find('a').should('have.class', 'btn-amarillo');
        cy.get('[data-cy = "imagen-contacto"]').find('a').invoke('text', 'Contáctanos');
        cy.get('[data-cy = "imagen-contacto"]').find('a').invoke('attr', 'href').then(href => {
            cy.visit(href);
        })
        cy.get('[data-cy = "heading-contacto"]').should('exist');
        cy.wait(2000);
        cy.visit('/');

    });

    it('Prueba los Testimoniales y el Blog', () => {
        //Blog
        cy.get('[data-cy = "blog"]').should('exist');
        cy.get('[data-cy = "blog"]').find('h3').invoke('text').should('equal', 'Nuestro Blog');
        cy.get('[data-cy = "blog"]').find('h3').invoke('text').should('not.equal', 'Blog');
        cy.get('[data-cy = "blog"]').find('img').should('have.length', 2);


        // Testimoniales
        cy.get('[data-cy = "testimoniales"]').should('exist');
        cy.get('[data-cy = "testimoniales"]').find('h3').invoke('text').should('equal', 'Testimoniales');
        cy.get('[data-cy = "testimoniales"]').find('h3').invoke('text').should('not.equal', 'Nuestros Testimoniales');

    })
});

describe('Prueba de Navegación de Header y Footer', () => {
    // Header
    it('Prueba la Nevegación del Header', () => {
        cy.visit('/');
        cy.get('[data-cy = "navegacion-header"]').should('exist');
        cy.get('[data-cy = "navegacion-header"]').find('a').should('have.length', 5);
        cy.get('[data-cy = "navegacion-header"]').find('a').should('not.have.length', 4);

        // Revisar que los enlaces sean correctos:
        cy.get('[data-cy = "navegacion-header"]').find('a').eq(0).invoke('attr', 'href').should('equal', '/nosotros');
        cy.get('[data-cy = "navegacion-header"]').find('a').eq(1).invoke('attr', 'href').should('equal', '/propiedades');
        cy.get('[data-cy = "navegacion-header"]').find('a').eq(2).invoke('attr', 'href').should('equal', '/blog');
        cy.get('[data-cy = "navegacion-header"]').find('a').eq(3).invoke('attr', 'href').should('equal', '/contacto');

    });



    // Footer
    it('Prueba la Nevegación del Footer', () => {
        cy.visit('/');
        cy.get('[data-cy = "navegacion-footer"]').should('exist');
        cy.get('[data-cy = "navegacion-footer"]').find('a').should('have.length', 4);
        cy.get('[data-cy = "navegacion-footer"]').find('a').should('not.have.length', 5);

        // Revisar que los enlaces sean correctos:
        cy.get('[data-cy = "navegacion-footer"]').find('a').eq(0).invoke('attr', 'href').should('equal', '/nosotros');
        cy.get('[data-cy = "navegacion-footer"]').find('a').eq(1).invoke('attr', 'href').should('equal', '/propiedades');
        cy.get('[data-cy = "navegacion-footer"]').find('a').eq(2).invoke('attr', 'href').should('equal', '/blog');
        cy.get('[data-cy = "navegacion-footer"]').find('a').eq(3).invoke('attr', 'href').should('equal', '/contacto');


        cy.get('[data-cy = "copyrigth"]').should('exist');
        cy.get('[data-cy = "copyrigth"]').should('have.prop', 'class').should('equal', 'copyrigth');
    });
});

describe('Prueba del formulario de Contacto', () => {

    it('Prueba de la página de Contacto y el envío de Emails', () => {

        cy.visit('/contacto');
        cy.get('[data-cy ="heading-contacto"]').should('exist');
        cy.get('[data-cy ="heading-contacto"]').invoke('text').should('equal', 'Contacto');
        cy.get('[data-cy ="heading-contacto"]').invoke('text').should('not.equal', 'Contáctanos');

        cy.get('[data-cy ="heading-formulario"]').should('exist');
        cy.get('[data-cy ="heading-formulario"]').invoke('text').should('equal', 'Llene el formulario de Contacto');
        cy.get('[data-cy ="heading-formulario"]').invoke('text').should('not.equal', 'Llena el Formulario');
    });

    it('Llena los Campos del Formulario', () => {
        cy.get('[data-cy="nombre"]').should('exist');
        cy.get('[data-cy="nombre"]').type('Joel Palacio');

        cy.get('[data-cy="mensaje"]').should('exist');
        cy.get('[data-cy="mensaje"]').type('Hola, soy una prueba automatizada');

        cy.get('[data-cy="opciones"]').should('exist');
        cy.get('[data-cy="opciones"]').select('compra');

        cy.get('[data-cy="presupuesto"]').should('exist');
        cy.get('[data-cy="presupuesto"]').type('1000000');

        cy.get('[data-cy="forma-contacto"]').should('exist');
        cy.get('[data-cy="forma-contacto"]').eq(0).check();
        cy.wait(3000);
        cy.get('[data-cy="forma-contacto"]').eq(1).check();
        cy.get('[data-cy="contacto-input"]').type('JoelPalacio630@gmail.com');

        cy.get('[data-cy="boton-enviar"]').should('exist');
        cy.get('[data-cy="formulario"]').should('exist');
        cy.get('[data-cy="formulario"]').submit();




    })

});

describe('Prueba de Autenticación', () => {

    it('Prueba de la página de /login', () => {

        cy.visit('/login');
        cy.get('[data-cy ="heading-login"]').should('exist');
        cy.get('[data-cy ="heading-login"]').should('have.text', 'Iniciar Sesión');

        cy.get('[data-cy ="formulario-login"]').should('exist');

        // Ambos campos son obligatorios:
        cy.get('[data-cy ="formulario-login"]').submit();
        cy.get('[data-cy ="alerta-login"]').should('exist');
        cy.get('[data-cy ="alerta-login"]').eq(0).should('have.class', 'error');
        cy.get('[data-cy ="alerta-login"]').eq(0).should('have.text', 'EL EMAIL ES OBLIGATORIO');
        cy.get('[data-cy ="alerta-login"]').eq(1).should('have.class', 'error');
        cy.get('[data-cy ="alerta-login"]').eq(1).should('have.text', 'EL PASSWORD ES OBLIGATORIO');


        // El usuario exista:





        // Verificar el password:



    });
});