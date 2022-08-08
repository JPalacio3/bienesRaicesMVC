<?php

namespace Model;

class Admin extends ActiveRecord
{
    // BASE DE DATOS:
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {

        if (!$this->email) {
            self::$errores[] = 'EL EMAIL ES OBLIGATORIO';
        }

        if (!$this->password) {
            self::$errores[] = 'EL PASSWORD ES OBLIGATORIO';
        }

        return self::$errores;
    }

    public function existeUsuario()
    {
        //Revisar si un usuario existe en la base de datos
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {
            self::$errores[] = 'El usuario NO EXISTE';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if (!$autenticado) {
            self::$errores[] = ' PASSWORD  INCORRECTO';
        }
        return $autenticado;
    }

    public function autenticar()
    {
        session_start();

        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}