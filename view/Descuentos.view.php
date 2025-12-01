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
    <link rel="stylesheet" type="text/css" href="../css/chat.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script type="text/javascript" src="../JS/js.js"></script>
    <title>Descuentos</title>
    <style>
        body {
            background-image: url("https://i.pinimg.com/originals/57/d7/11/57d711f61d2b54cd89954b3144815495.jpg");
            background-size: cover;
        }
    </style>
</head>

<body>

    <?php              
    include "../include/carrito.php";
    include "../include/header2Cc.php";
    ?>
    <main>

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 class="display-4 mt-4 text-light fw-semibold ">Descuentos</h1>

            <p class="lead text-white fw-light fw-semibold">Selecciona uno de nuestros productos con descuento incluido
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
                        if($content['estado'] == 1){
                            include "../include/card.php"; 
                        }
                endwhile; 
                ?>
                <div class="collapse position-fixed text-left" style="top: 100px; right: -15px;" id="collapseExample"><?php
                    include "../logicaviews/chat.php"; 
                    ?>
                </div>
            </div>

        </div>

        <?php
            include "../include/mensajeInfo.php";?>

    </main>

    <button class="btn btn-primary fs-4 position-fixed"
        style="border-radius: 40px; width: 1.5cm; height: 1.5cm; bottom: 35px; left: 35px;" type="button"
        data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i
            class="fa-regular fa-comments"></i>
    </button>
    <?php include "../include/footer.php" ?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.min.js"></script>

</body>

</html>