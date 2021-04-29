<?php

include("db.php");

if (isset($_POST['save_book'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $sinopsis = $_POST['sinopsis'];

    $portada = $_FILES['img_portada']['name'];
    $type_img = $_FILES['img_portada']['type'];
    $size_img = $_FILES['img_portada']['size'];

    //Definimos un max 5mb para el archivo adjunto
    if ($size_img <= 5000000) {

        //Y especificamos tipo de img
        if ($type_img == "image/jpeg" || $type_img == "image/jpg" || $type_img == "image/png" || $type_img == "image/gif") {


            //Definimos la ruta de la carpeta destino en el servidor
            $uploads_folder = $_SERVER['DOCUMENT_ROOT'] . '/php_crud_mysql_napptilus/uploads/';


            //Movemos la imagen del directorio temporal al escogido
            move_uploaded_file($_FILES['img_portada']['tmp_name'], $uploads_folder . $portada);


            //La solicitud que pediremos ejecutar si todo va OK
            $query = "INSERT INTO book(titulo, autor, isbn, sinopsis, portada) VALUES ('$titulo','$autor','$isbn', '$sinopsis', '$portada')";

            //Y entonces:
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die('Query failed');
            }


            //Info de la sesiòn en la que le pasaremos info al 'alert'
            $_SESSION['message'] = 'Libro guardado con éxito';
            $_SESSION['message_color'] = 'success';


            //redireccionamiento al index
            header("Location:index.php");
        } else {

            $_SESSION['message'] = 'Ups! La imagen debe tener formarto jpg, png o gif. Intenta de nuevo :)';
            $_SESSION['message_color'] = 'danger';
            header("Location:index.php");
        }
    } else {

        $_SESSION['message'] = 'Ups! El archivo debe pesar menos de 5 MB :)';
        $_SESSION['message_color'] = 'danger';
        header("Location:index.php");
    }
}
