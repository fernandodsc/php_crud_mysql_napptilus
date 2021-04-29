<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-dark table-striped table-bordered text-center">

                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>ISBN</th>
                        <th>Sinopsis</th>
                        <th>Portada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    //Armamos la tabla loopeando sobre el contenido de la DB
                    $query = "SELECT * FROM book";
                    $result_books = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_books)) { ?>
                        <tr>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['autor'] ?></td>
                            <td><?php echo $row['isbn'] ?></td>
                            <td><?php echo $row['sinopsis'] ?></td>
                            <td><img src="./uploads/<?php echo $row['portada'] ?>" alt="Portada" style="height: 100px;"></td>
                            <td>
                                <a href="edit_book.php?id=<?php echo $row['id'] ?>">
                                    <i class="fas fa-marker fa-lg p-1" style="color:#F8F9FA"></i>
                                </a>
                                <a href="delete_book.php?id=<?php echo $row['id'] ?>">
                                    <i class="fas fa-trash-alt fa-lg p-1" style="color:#F8F9FA"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>