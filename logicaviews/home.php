<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['valid'])) {
        header('Location: ../crud/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/b56decc6bc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
<script type="text/javascript" src="../JS/js.js"></script>
    <title>Descuentos</title>
    <style>
        body {
            background-image: url("https://i.pinimg.com/originals/57/d7/11/57d711f61d2b54cd89954b3144815495.jpg");
            background-size: contain;
            text-decoration: none;
        }

        .col .card {
            height: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body>
    <?php 
    include "../include/carrito.php";
    include "../include/header2Cc.php"
    ?>

    <div class="py-5 text-center text-white container position-relative">
        <div class="row py-lg-5" id="lista-productos">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light fw-bold">Bienvenido</h1>
                <p class="lead text-white fw-semibold">En esta seccion encontraras una cantidad de libros que podras
                    seleccionar y
                    comprar</p>
                <p>
                    <a href="./Descuentos.php" class="btn btn-primary my-2">Ver descuentos</a>
                </p>
            </div>
            <div class="container" id="lista-productos">
            <div class="mb-3 text-center row row-cols-lg-4">
              
            <?php 
            require "../crud/conf/connection.php";
            $resultado;
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
                $nombre = $_POST['search'];
                $nombre = $nombre.'%';
                $resultado = $conexion->prepare("SELECT * FROM articulo WHERE nombre LIKE :nombre ORDER BY idarticulo DESC");
                $resultado->execute(array(':nombre' => $nombre));   
            }else{
                $resultado = $conexion->prepare("SELECT * FROM articulo ORDER BY idarticulo DESC");  
                $resultado->execute();   
            }
            while($content = $resultado->fetch(PDO::FETCH_ASSOC)):
                require "../include/card.php"; 
            endwhile;  
            include "../include/mensajeInfo.php";
            ?>
              </div>
              </div>
            <div class="collapse position-fixed text-left" style="right: -70px;" id="collapseExample"><?php
            include "./chat.php"; 
            ?>
            </div>
                <button class="btn btn-primary fs-4 position-fixed" style="border-radius: 40px; width: 1.5cm; height: 1.5cm; bottom: 35px; right: 35px;" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa-regular fa-comments"></i>
    </button>
        </div>

    </div>


 
    <?php include "../include/footer.php" ?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.min.js"></script>
   
</body>

</html>