<header class="header-app">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
        <div class="container-fluid px-4">

            <!-- LOGO -->
            <a href="../index.php" class="navbar-brand d-flex align-items-center gap-2">
                <img src="../Img/logoIcon.png" style="border-radius: 10px;" height="42">
                <strong>Books Now!!</strong>
            </a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- CONTENIDO -->
            <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarCollapse">

                <!-- CARRITO -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center">

                    <li class="nav-item dropdown">

                        <img src="../img copy/cart.jpeg"
                            class="nav-link dropdown-toggle"
                            width="48"
                            height="48"
                            style="border-radius: 50%; cursor:pointer"
                            data-bs-toggle="dropdown">

                        <div id="carrito"
                            class="dropdown-menu dropdown-menu-start p-3 shadow"
                            style="min-width: 380px;">

                            <table id="lista-carrito" class="table table-sm">
                                <thead>
                                    <tr class="text-center border-bottom">
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require "../crud/conf/connection.php";
                                    if (isset($_SESSION['carrito'])) {
                                        foreach ($_SESSION['carrito'] as $x => $value) {
                                            $idCarrito = $_SESSION['carrito'][$x];
                                            $resultado = $conexion->prepare("SELECT * FROM articulo WHERE idarticulo = :id");
                                            $resultado->execute(array(':id' => $idCarrito));
                                            $contentCarrito = $resultado->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                            <tr class="text-center align-middle">
                                                <td>
                                                    <img src="<?php echo $contentCarrito['imagen']; ?>" width="60">
                                                </td>
                                                <td class="small"><?php echo $contentCarrito['nombre']; ?></td>
                                                <td class="fw-bold text-primary">$<?php echo $contentCarrito['precio_venta']; ?></td>
                                                <td>
                                                    <a class="borrar-producto text-danger"
                                                        href="<?php echo isset($_GET['a']) ? '?a=' . $_GET['a'] . '&el=' . $x : '?el=' . $x; ?>">
                                                        ✖
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>

                            <div class="d-grid gap-2">
                                <a id="vaciar-carrito" class="btn btn-danger btn-sm"
                                    href="<?php echo isset($_GET['a']) ? '?a=' . $_GET['a'] . '&vaciar=1' : '?vaciar=1'; ?>">
                                    Vaciar carrito
                                </a>

                                <a id="procesar-pedido"
                                    href="../view/carrito.view.php"
                                    class="btn btn-primary btn-sm">
                                    Procesar compra
                                </a>
                            </div>

                        </div>
                    </li>

                </ul>

                <!-- ZONA DERECHA -->
                <?php if (isset($_SESSION['idrol'])) { ?>

                    <div class="d-flex flex-column flex-lg-row gap-3 align-items-lg-center">

                        <!-- BUSCADOR -->
                        <form class="d-flex" role="search" method="POST" action="">
                            <input type="search" name="search"
                                class="form-control me-2"
                                placeholder="Buscar Libro">
                            <button class="btn btn-outline-light" type="submit" name="botonCrud">
                                Buscar
                            </button>
                        </form>

                        <!-- ADMIN -->
                        <?php if ($_SESSION['idrol'] == 1) { ?>
                            <button type="button"
                                onclick="location.href='./pageadmin.php'"
                                class="btn btn-outline-light">
                                Administrar
                            </button>
                        <?php } ?>

                        <!-- SALIR -->
                        <button type="button"
                            onclick="location.href='../crud/logout.php'"
                            class="btn btn-warning">
                            Salir
                        </button>

                    </div>

                <?php } ?>

            </div>
        </div>
    </nav>

</header>

<!-- ESPACIADO AUTOMÁTICO PARA QUE NO TAPE EL HERO -->
<div style="height: 100px;"></div>