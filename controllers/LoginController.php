<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {
        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if (empty($errores)) {

                //Validar si el usuario existe en la base de datos
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    // VERIFICAR SI EL USUARIO NO EXISTE (MENSAJE DE ERROR)
                    $errores = Admin::getErrores();
                } else {
                    // Verificar el Password
                    $autenticado = $auth->comprobarPassword($resultado);
                    if ($autenticado) {
                        // Autenticar el usuario
                        $auth->autenticar();
                    } else {
                        //Password incorrecto(mensaje de error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }



    public static function logout()
    {
        session_start();

        $_SESSION = [];

        header('Location: /login');
    }
}