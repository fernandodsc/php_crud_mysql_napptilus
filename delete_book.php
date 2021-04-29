<?php 
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //'book' es la tabla dentro de la DB 'php_crud_mysql_napptilus'
    $query = "DELETE FROM book WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
    die("Algo salió mal...");
}

//redireccionamos a la misma pàgina
header("Location: list.php");
}
