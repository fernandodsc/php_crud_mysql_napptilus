<?php

//inicio de la sesión
session_start();

//Conexión a la DB
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud_mysql_napptilus'
);

?>