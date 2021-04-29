<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4 mt-4">
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <?php
            //mensajes de alerta al agregar nuevo libro
            if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_color'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>

            <div class="card card-body ">
                <form action="save_book.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Título" autofocus required="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="autor" class="form-control" placeholder="Autor" required="true">
                    </div>
                    <div class="form-group">
                        <input type="number" name="isbn" class="form-control" placeholder="ISBN" required="true">
                    </div>
                    <div class="form-group">
                        <textarea name="sinopsis" rows="2" class="form-control" placeholder="Sinopsis" required="true"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="img_portada">Portada (jpg, png o gif menor a 5MB)</label>
                        <input type="file" name="img_portada" required="true">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_book" value="Guardar Libro">
                </form>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>