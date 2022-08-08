<?php

// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();

// Crear un email y password
$email = 'joelpalacio630@gmail.com';
$password = '5635';

// Hashear el password:
$passwordHash = password_hash($password, PASSWORD_BCRYPT);


// Query para crear el usuario
$query = " INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}'); ";

// Agregarlo a la base de datos
mysqli_query($db, $query);