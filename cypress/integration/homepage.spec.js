/// <references types="Cypress" />


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



});