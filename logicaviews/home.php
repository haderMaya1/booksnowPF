<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['valid'])) {
    header('Location: ../crud/login.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio | Tienda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="../css/estilo.css">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b56decc6bc.js" crossorigin="anonymous"></script>

    <style>
        body {
            background: #f4f6f9;
        }

        .hero-home {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            border-radius: 0 0 40px 40px;
            padding: 60px 20px;
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <?php 
        include "../include/carrito.php"; 
        include "../include/header2Cc.php"; 
    ?>

    <!-- HERO -->
    <section class="hero-home text-center">
        <div class="container">
            <h1 class="fw-bold">Bienvenido a tu tienda</h1>
            <p class="lead">Explora nuestros libros disponibles y compra fácil y rápido</p>
            <a href="./Descuentos.php" class="btn btn-light btn-lg mt-3">Ver Descuentos</a>
        </div>
    </section>

    <!-- CONTENEDOR DE PRODUCTOS -->
    <section class="container pb-5">

        <div class="row justify-content-center" id="lista-productos">

            <?php 
            require "../crud/conf/connection.php";

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
                $nombre = $_POST['search'] . '%';
                $resultado = $conexion->prepare("
                    SELECT * FROM articulo 
                    WHERE nombre LIKE :nombre 
                    ORDER BY idarticulo DESC
                ");
                $resultado->execute([':nombre' => $nombre]);
            } else {
                $resultado = $conexion->prepare("
                    SELECT * FROM articulo 
                    ORDER BY idarticulo DESC
                ");
                $resultado->execute();
            }

            while ($content = $resultado->fetch(PDO::FETCH_ASSOC)):
            ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                    <?php require "../include/card.php"; ?>
                </div>
            <?php endwhile; ?>

            <?php include "../include/mensajeInfo.php"; ?>

        </div>
    </section>

    <!-- CHAT -->
    <div class="collapse position-fixed bottom-0 end-0 p-3" id="collapseExample">
        <?php include "./chat.php"; ?>
    </div>

    <button class="btn btn-primary rounded-circle shadow-lg position-fixed"
        style="width: 60px; height: 60px; bottom: 30px; right: 30px;"
        type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample">
        <i class="fa-regular fa-comments fs-4"></i>
    </button>

    <?php include "../include/footer.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
