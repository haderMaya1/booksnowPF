<?php
    try {
        $conexion = new mysqli("localhost", "root", "", "booksnow");
        $resultado = $conexion->query("SELECT * FROM articulo WHERE idarticulo = 1");
    } catch (PDOException $e) {
        echo "Error de Conexion:" . $e->getMessage();
    }
    $content = $resultado->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Descuentos</title>
</head>

<body>
    <?php include "include/header2Cc.php" ?>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 class="display-4 mt-4">Lista de Productos</h1>

            <p class="lead">Selecciona uno de nuestros productos y accede a un descuento</p>
        </div>

        <div class="container" id="lista-productos">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold" id="titulo">ESCRITO EN EL AGUA</h4>
                    </div>
                    <div class="card-body" style="width: fit-content; height: 225px;  margin: auto">
                        <img src="img/Escrito_En_El_Agua.jpg" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title precio">$/. <span class="">4000</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>4 GB RAM</li>
                            <li>COLOR PLATEADO</li>
                            <li>1 TB DD</li><br>
                        </ul>
                        <button class="btn btn-block btn-primary agregar-carrito" id="codigo" data-id="3">Agregar</button><br>
                        <small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold" id="titulo">EL SOL DE LOS VENADOS </h4>
                    </div>
                    <div class="card-body" style="width: fit-content; height: 225px;  margin: auto">
                        <img src="img/El-sol-de-los-venados.jpg" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">4000</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>4 GB RAM</li>
                            <li>COLOR PLATEADO</li>
                            <li>1 TB DD</li><br>
                        </ul>
                        <button class="btn btn-block btn-primary agregar-carrito" id="codigo" data-id="3">Agregar</button><br>
                        <small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small>
                    </div>
                </div>


                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 style="text-transform: uppercase;" id="titulo" class="my-0 font-weight-bold"><?php echo $content['nombre']; ?></h4>
                    </div>
                    <div class="card-body" style="width: fit-content; height: 225px;  margin: auto">
                        <img src="<?php echo $content['imagen']; ?>" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h1 style="text-transform: uppercase;" class="card-title pricing-card-title precio">$ <span><?php echo $content['precio_venta']; ?></span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li style="height: 90px; overflow: hidden"><?php echo $content['descripcion']; ?></li>
                        </ul>
                        <button class="btn btn-block btn-primary agregar-carrito" id="codigo" data-id="<?php echo $content['idarticulo']; ?>">Agregar</button><br>
                        <a href="./Descuentos.html"><small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small></a>
                    </div>
                </div>
            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">LOS CHICOS MALOS</h4>
                    </div>
                    <div class="card-body" style="width: fit-content; height: 225px;  margin: auto">
                        <img src="img/Los_Chicos_malos.jpg" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">4000</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>4 GB edddede</li>
                            <li>COLOR PLATEADO</li>
                            <li>1 TB DD</li><br>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Agregar</a><br>
                        <small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">WIGETTA EN EL INFIERNO</h4>
                    </div>
                    <div class="card-body" style="width: fit-content; height: 225px;  margin: auto">
                        <img src="img/wigetta_En_el_Infierno.jpg" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">4000</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>4 GB RAM</li>
                            <li>COLOR PLATEADO</li>
                            <li>1 TB DD</li><br>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Agregar</a><br>
                        <small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">WIGETTA</h4>
                    </div>
                    <div class="card-body" style="width: fit-content; height: 225px;  margin: auto">
                        <img src="img/Wigetta.jpg" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">4000</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>4 GB RAM</li>
                            <li>COLOR PLATEADO</li>
                            <li>1 TB DD</li><br>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Agregar</a><br>
                        <small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">¿PORQUE A MI?</h4>
                    </div>
                    <div class="card-body" style="width: fit-content; height: 225px;  margin: auto">
                        <img src="img/Porque_a_mi.jpg" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">4000</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>4 GB RAM</li>
                            <li>COLOR PLATEADO</li>
                            <li>1 TB DD</li><br>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Agregar</a><br>
                        <small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">PSCOANALISTA</h4>
                    </div>
                    <div class="card-body" style="width: fit-content; height: 225px;  margin: auto">
                        <img src="img/Pscoanalista.png" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">4000</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>4 GB RAM</li>
                            <li>COLOR PLATEADO</li>
                            <li>1 TB DD</li><br>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Agregar</a><br>
                        <small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">EL CABALLERO</h4>
                    </div>
                    <div class="card-body" style="width: fit-content; height: 225px;  margin: auto">
                        <img src="img/El_Caballero.jpg" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
                    </div>

                    <div class="card-body">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">4000</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>4 GB RAM</li>
                            <li>COLOR PLATEADO</li>
                            <li>1 TB DD</li><br>
                        </ul>
                        <button onclick="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Agregar</button><br>
                        <a href="../view/Descuentos.view.html"><small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "include/footer.php" ?>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/pedido.js"></script>
</body>

</html>