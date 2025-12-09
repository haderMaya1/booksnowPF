<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Administrar Libros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/b56decc6bc.js" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="../js/AdminLibro.js"></script>
</head>

<body class="bg-light">

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <!-- ✅ HEADER -->
    <header class="bg-dark py-3 shadow-sm mb-4">
        <div class="container-fluid px-4 d-flex align-items-center gap-3">
            <a href="../index.php" class="d-flex align-items-center text-white text-decoration-none me-auto">
                <img src="../Img/logoIcon.png" height="40" style="border-radius:12px;">
                <strong class="ms-2">Books Now!!</strong>
            </a>

            <button onclick="location.href='../logicaviews/pageadmin.php'" class="btn btn-outline-light">
                Lista
            </button>

            <button onclick="location.href='../crud/logout.php'" class="btn btn-warning">
                Salir
            </button>
        </div>
    </header>

    <form action="../logicaviews/AdminLibro.php" method="post">

        <!-- ✅ MODAL CONFIRMACIÓN -->
        <div id="AdvertenciaEliminar" class="position-fixed top-0 start-0 w-100 h-100 d-none"
            style="background: rgba(0,0,0,0.6); z-index: 1050;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="bg-white p-4 rounded shadow text-center" style="max-width:400px;">
                    <h4>Advertencia</h4>
                    <p class="mt-3">¿Realmente desea <strong id="ValueTextoBoton"></strong> el libro
                        <strong><?php echo $content['nombre']; ?></strong>?
                    </p>

                    <div class="d-flex gap-3 mt-4">
                        <button class="btn btn-dark w-50" id="botonCrud" type="submit" name="botonCrud"></button>
                        <button type="button" class="btn btn-warning w-50" id="btnCerrarVerificacion">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ✅ CONTENEDOR PRINCIPAL -->
        <main class="container-fluid px-4">

            <div class="row g-4">

                <!-- ✅ IMAGEN -->
                <div class="col-12 col-lg-3">
                    <div class="card shadow-sm text-center p-3">
                        <img class="img-fluid rounded"
                            src="<?php if (isset($content)) {
                                        echo $content['imagen'];
                                    } ?>"
                            alt="Imagen Libro">
                    </div>
                </div>

                <!-- ✅ FORMULARIO -->
                <div class="col-12 col-lg-7">

                    <div class="card shadow-sm p-4">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">

                            <?php
                            function campo($label, $name, $value = '', $type = 'text', $readonly = false)
                            {
                                echo "
                    <div>
                        <label class='form-label fw-semibold'>$label</label>
                        <input type='$type' name='$name' value='$value'
                            class='form-control'
                            " . ($readonly ? 'readonly' : '') . ">
                    </div>";
                            }

                            campo("ID", "idarticulo", $content['idarticulo'] ?? "", "text", true);
                            campo("Nombre", "nombre", $content['nombre'] ?? "");
                            campo("Código", "codigo", $content['codigo'] ?? "");
                            campo("Precio", "precio", $content['precio_venta'] ?? "", "number");
                            campo("Stock", "stock", $content['stock'] ?? "", "number");
                            campo("Imagen URL", "imagen", $content['imagen'] ?? "");
                            campo("Autor", "autor", $content['autor'] ?? "");
                            campo("Editorial", "editorial", $content['editorial'] ?? "");
                            campo("Año Publicación", "fecha", $content['fecha_publicacion'] ?? "");

                            ?>

                            <div>
                                <label class="form-label fw-semibold">Categoría</label>
                                <select class="form-select" name="categoria">
                                    <?php
                                    $resultado = $conexion->prepare("SELECT * FROM categoria ORDER BY idcategoria ASC");
                                    $resultado->execute();
                                    while ($categoria = $resultado->fetch(PDO::FETCH_ASSOC)):
                                    ?>
                                        <option value="<?php echo $categoria['idcategoria']; ?>"
                                            <?php if ($categoria['idcategoria'] == $content['idcategoria']) echo "selected"; ?>>
                                            <?php echo $categoria['nombre']; ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div>
                                <label class="form-label fw-semibold">Estado</label>
                                <select class="form-select" name="estado">
                                    <option value="1" <?php if ($content['estado'] == "1") echo "selected"; ?>>Habilitado</option>
                                    <option value="0" <?php if ($content['estado'] == "0") echo "selected"; ?>>Deshabilitado</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="3"><?php echo $content['descripcion'] ?? ""; ?></textarea>
                            </div>

                        </div>

                        <div class="mt-4">
                            <?php include '../include/ToolTipError.php'; ?>
                        </div>
                    </div>

                </div>

                <!-- ✅ PANEL ACCIONES -->
                <div class="col-12 col-lg-2">

                    <div class="card shadow-sm p-3 text-center">
                        <div class="d-grid gap-3">

                            <button class="btn btn-dark" type="submit" name="botonCrud"
                                style="display:<?php echo desactivarInsertar(); ?>">
                                Insertar
                            </button>

                            <button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
                            <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>

                        </div>
                    </div>

                </div>

            </div>
        </main>
    </form>

    <script>
        const modal = document.getElementById("AdvertenciaEliminar");

        document.getElementById("btnEliminar").onclick = () => {
            modal.classList.remove("d-none");
            document.getElementById("ValueTextoBoton").innerHTML = "eliminar";
            document.getElementById("botonCrud").value = "Eliminar";
        };

        document.getElementById("btnActualizar").onclick = () => {
            modal.classList.remove("d-none");
            document.getElementById("ValueTextoBoton").innerHTML = "actualizar";
            document.getElementById("botonCrud").value = "Actualizar";
        };

        document.getElementById("btnCerrarVerificacion").onclick = () => {
            modal.classList.add("d-none");
        };
    </script>

</body>

</html>