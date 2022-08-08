<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{

    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // Arrego con mensajes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //CREAR UNA NUEVA INSTANCIA//
            $propiedad = new Propiedad($_POST['propiedad']);

            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            // // Crear una instancia de la clase ImageManagerStatic:
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }


            // VALIDAR  
            $errores = $propiedad->validar();

            if (empty($errores)) {

                // crear carpeta para guardar las imágenes:
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }


                //         // Almacenar la imagen en el disco duro:
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    // Almacenar la imágen:
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validate('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        // Método POST para actualizar:

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos:
            $args = $_POST['propiedad'];


            $propiedad->sincronizar($args);

            // Validación de errores:
            $errores = $propiedad->validar();

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                // Subida de archivos:
                // Generar un nombre único para cada imágen:
                $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

                // Crear una instancia de la clase ImageManagerStatic:
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                    $propiedad->setImagen($nombreImagen);
                }
                // if (empty($errores)) {
                //     // Almacenar la imagen en el disco duro:
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    // Almacenar la imágen:
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
            }
            $propiedad->guardar();
        }


        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }
    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar id:
            $id = $_POST['id'] ?? null;
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                    imap_alerts('success', 'Propiedad eliminada correctamente');
                }
            }
        }
    }
}



