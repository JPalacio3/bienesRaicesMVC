<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;


class VendedorController
{
    public static function crear(Router $router)
    {

        // VALIDACIÓN DE ERRORES:
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;

        // CREACIÓN DE VENDEDOR EN LA BASE DE DATOS:
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Crear una nueva instancia de vendedor
            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar que no haya camnpos vacíos
            $errores = $vendedor->validar();

            // NO hay errroes:
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        // Pasarle la vista que vamos a mostrar: se crea el archivo con la vista que queremos mostrar, y le pasamos los modelos a la vista;
        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar(Router $router)
    {
        $errores = Vendedor::getErrores();
        $id = validate('/admin');

        //Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Asignar los valores:
            $args = $_POST['vendedor'];

            // Sincronizar objeto en memoria con lo que el usuario escribió:
            $vendedor->sincronizar($args);

            // Validación:
            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }


        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor

        ]);
    }


    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] == ' POST') {

            // Valida el ID a eliminar
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                // Valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if(validate($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
