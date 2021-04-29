<?php
//logica

include("db.php");

//Si existe una llamada GET donde le pasamos una 'id':
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM book WHERE id = $id";
    $result = mysqli_query($conn, $query);

    //Si existe un match, entonces:
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $titulo = $row['titulo'];
        $autor = $row['autor'];
        $isbn = $row['isbn'];
        $sinopsis = $row['sinopsis'];
        $portada = $row['portada'];
    }
}


//Si ocurre una llamada POST (botòn 'actualizar'), actualizar DB con la nueva info:
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $sinopsis = $_POST['sinopsis'];

    $portada = $_FILES['img_portada']['name'];

    $type_img = $_FILES['img_portada']['type'];
    $size_img = $_FILES['img_portada']['size'];

    //Condicion para evitar bug en caso de no necesitar cambiar la imagen
    if (!$_FILES['img_portada']['name']) {
        $portada = $row['portada'];
    }


    //Falta agregar condicion de type & size, anàlogo a save_book.php :/


    $uploads_folder = $_SERVER['DOCUMENT_ROOT'] . '/php_crud_mysql_napptilus/uploads/';


    //Movemos la imagen del directorio temporal al escogido
    move_uploaded_file($_FILES['img_portada']['tmp_name'], $uploads_folder . $portada);


    $query = "UPDATE book set titulo='$titulo', autor='$autor', isbn='$isbn', sinopsis='$sinopsis', portada='$portada' WHERE id = $id";



    mysqli_query($conn, $query);

    header("Location: list.php");
}


?>



<?php include("includes/header.php") ?>

<div class="container p-4 mt-4">

    <div class="d-flex justify-content-center">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <form action="edit_book.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo ?>" class="form-control" placeholder="Actualizar título" required="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="autor" value="<?php echo $autor ?>" class="form-control" placeholder="Actualizar autor" required="true">
                    </div>
                    <div class="form-group">
                        <input type="number" name="isbn" value="<?php echo $isbn ?>" class="form-control" placeholder="Actualizar ISBN" required="true">
                    </div>
                    <div class="form-group">
                        <textarea name="sinopsis" rows="2" class="form-control" placeholder="Actualizar Sinopsis" required="true"><?php echo $sinopsis ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="img_portada">Portada (jpg, png o gif menor a 5MB)</label>
                        <input type="file" name="img_portada">
                    </div>

                    <button class="btn btn-success" name="update">Actualizar</button>

                </form>

            </div>

        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>