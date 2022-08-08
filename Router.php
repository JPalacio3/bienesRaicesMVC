<?php

namespace MVC;


class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    //Soporte para el método GET
    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    // Soporte para el método POST
    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }


    public function comprobarRutas()
    {
        // iniciar la sesión

        session_start();

        // Obtener la URL actual

        $auth = $_SESSION['login'] ?? null;

        // Arreglo de rutas protegidas
        $rutas_protegidas = [
            '/admin',
            '/propiedades/crear',
            '/propiedades/actualizar',
            '/propiedades/eliminar',
            '/propiedades/formulario',
            '/vendedores/actualizar',
            '/vendedores/crear',
            '/vendedores/formulario',
            '/vendedores/eliminar',
        ];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $urlActual = explode('?', $urlActual)[0];
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $urlActual = explode('?', $urlActual)[0];
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // Proteger las rutas
        if (in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }



        if ($fn) {
            // La Url existe y hay una función asociada
            // call_user_func() nos permite ubicar una función cuando no sabemos su nombre;
            call_user_func($fn, $this);
        } else {
            // La Url no existe
            echo ' Página No Encontrada';
        }
    }

    //Muestra una vista
    public function render($view, $datos = [])
    {

        foreach ($datos as $key => $value) {
            $$key = $value;  //$$ significa que es variable de variable, lo que significa que va a tomar el valor de la variable $key y lo va a asignar a la variable $value en cada iteración que haga. Mantiene el nombre pero no pierde el valor.
        }
        ob_start(); // inicia el almacenamiento en memoria.
        include __DIR__ . "/views/$view.php"; // Dirección de la ruta de la vista.
        $contenido = ob_get_clean(); // Limpia el Buffer
        include __DIR__ . "/views/layout.php"; // Dirección de la ruta del layout.
    }
}