<?php

namespace Model;

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros', []);
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validate('/propiedades');

        // Buscar la propiedad por su id:
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog', []);
    }

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            //Crear una instancia nueva de php mailer
            $mail = new PHPMailer();

            //Configurar el protocolo SMTP para el envío de emails
            $mail->isSMTP(); //Protocolo SMTP
            $mail->Host = 'smtp.mailtrap.io'; //Servidor SMTP (Dominio o Host)
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = '8ce2f68932100e';
            $mail->Password = '57010cf879c226';
            $mail->SMTPSecure = 'tls'; // Transport Leyend Security (recomendado) PARA QUE LOS MAILS VIAJEN POR UN TÚNEL SEGURO
            $mail->Port = 2525; // Puerto de conexión

            // Configurar el contenido del Email
            // Quien envía el email:
            $mail->setFrom('admin@bienesraices.com');
            // A quien va dirigido:
            $mail->addAddress('joelpalacio630@gmail.com', 'J. Palacio');
            // Asunto del email:
            $mail->Subject = 'Tienes un nuevo mensaje desde tu página de bienes raíces';

            // Habilitar HTML para el cuerpo del email
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido del email
            $contenido = '<html>';
            $contenido .= '<h1>Hola, Joel</h1>';
            $contenido .= '<h2>Tienes un mensaje nuevo de tu página de Bienes Raíces </h2>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

            //Enviar de forma condicional algunos campos de email o teléfono:
            if ($respuestas['contacto'] == 'telefono') {
                $contenido .= '<p> Eligió ser contactado vía Telefónica</p>';
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha de Contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';
            } else {
                // Es Email, entonces agregamos el campo de email:
                $contenido .= '<p> Eligió ser contactado vía Email</p>';
                $contenido .= '<p>E-Mail: ' . $respuestas['email'] . '</p>';
            }

            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o Presupuesto: $ ' . $respuestas['precio'] . '</p>';
            $contenido .= '</html> ';

            // Agregar el contenido al cuerpo del email
            $mail->Body = $contenido;
            $mail->AltBody = ' Esto es texto alternativo sin HTML';

            // Enviar el email
            if ($mail->send()) {
                echo '<script>alert("Mensaje enviado correctamente")</script>';
            } else {
                echo '<script>("Error al enviar el mensaje:"  . <?php> $mail->ErrorInfo; ?> . ")" </script>';
}
}
$router->render('paginas/contacto', []);
}
}