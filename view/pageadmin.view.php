<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <!-- ✅ HEADER ADMIN -->
    <header class="bg-dark shadow-sm py-3 mb-4">
        <div class="container-fluid px-4 d-flex flex-wrap align-items-center gap-3">

            <a href="../index.php" class="d-flex align-items-center text-white text-decoration-none me-auto">
                <img src="../Img/logoIcon.png" height="40" style="border-radius: 12px;">
                <strong class="ms-2">Books Now!!</strong>
            </a>

            <form class="d-flex" method="POST" action="../logicaviews/pageadmin.php">
                <input type="search" name="search" class="form-control me-2" placeholder="Buscar Libro">
                <button class="btn btn-outline-light" type="submit" name="botonCrud">Buscar</button>
            </form>

            <button onclick="location.href='../crud/logout.php'" class="btn btn-warning">Salir</button>
        </div>
    </header>

    <!-- ✅ CONTENEDOR PRINCIPAL -->
    <main class="container-fluid px-4">

        <div class="row g-4">

            <!-- ✅ TABLA -->
            <div class="col-12 col-xl-9">

                <div class="card shadow-sm">
                    <div class="card-header fw-semibold bg-white">
                        Listado de Libros
                    </div>

                    <div class="table-responsive" style="max-height: 70vh;">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Categoria</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Descripción</th>
                                    <th>Imagen</th>
                                    <th>Autor</th>
                                    <th>Editorial</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($content = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
                                    <tr class="text-center"
                                        style="cursor:pointer"
                                        onclick="location.href='../logicaviews/AdminLibro.php?a=<?php echo $content['idarticulo']; ?>'">

                                        <td><?php echo $content['idarticulo']; ?></td>
                                        <td><?php echo $content['categoria']; ?></td>
                                        <td><?php echo $content['codigo']; ?></td>
                                        <td><?php echo $content['nombre']; ?></td>
                                        <td>$<?php echo $content['precio_venta']; ?></td>
                                        <td><?php echo $content['stock']; ?></td>
                                        <td class="text-truncate" style="max-width: 180px;"><?php echo $content['descripcion']; ?></td>
                                        <td class="text-truncate" style="max-width: 180px;"><?php echo $content['imagen']; ?></td>
                                        <td><?php echo $content['autor']; ?></td>
                                        <td><?php echo $content['editorial']; ?></td>
                                        <td><?php echo $content['fecha_publicacion']; ?></td>
                                        <td>
                                            <?php echo $content['estado'] == 1 ?
                                                "<span class='badge bg-success'>Activo</span>" :
                                                "<span class='badge bg-danger'>Inactivo</span>"; ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- ✅ PANEL LATERAL -->
            <div class="col-12 col-xl-3">

                <div class="card shadow-sm">
                    <div class="card-body text-center">

                        <h4 class="mb-4">Gestión de Libros</h4>

                        <form action="../logicaviews/AdminLibro.php" method="post">
                            <button class="btn btn-dark w-100 py-3 fs-5" type="submit" name="botonCrud" value="Insertar">
                                ➕ Ingresar nuevo libro
                            </button>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </main>

</body>

</html>