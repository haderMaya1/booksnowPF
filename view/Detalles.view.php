<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle del Libro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b56decc6bc.js" crossorigin="anonymous"></script>

    <!-- Estilos internos -->
    <link rel="stylesheet" href="../css/estilos.css">

    <style>
        .producto-img {
            max-height: 380px;
            object-fit: contain;
        }

        .precio {
            font-size: 1.8rem;
            font-weight: bold;
            color: #198754;
        }

        .stars {
            font-size: 1.3rem;
            color: gold;
        }

        .review-card {
            border-left: 5px solid #0d6efd;
        }
    </style>
</head>

<body class="bg-light">

    <?php
    include "../include/carrito.php";
    include "../include/header2Cc.php";
    ?>

    <!-- ✅ CONTENEDOR PRINCIPAL -->
    <main class="container py-5">

        <!-- ✅ DETALLE PRODUCTO -->
        <div class="row g-4 align-items-center mb-5">

            <!-- ✅ IMAGEN -->
            <div class="col-12 col-lg-5 text-center">
                <div class="card shadow-sm p-3">
                    <img src="<?php echo $content['imagen'] ?? ''; ?>" class="img-fluid producto-img">
                </div>
            </div>

            <!-- ✅ INFO -->
            <div class="col-12 col-lg-7">
                <div class="card shadow-sm p-4">

                    <span class="badge bg-success mb-2">EN DESCUENTO</span>

                    <h2 class="fw-bold"><?php echo $content['nombre'] ?? ''; ?></h2>
                    <p class="text-muted">Autor: <?php echo $content['autor'] ?? 'N/A'; ?></p>
                    <p class="text-muted">Editorial: <?php echo $content['editorial'] ?? 'N/A'; ?></p>
                    <p class="text-muted">Año: <?php echo $content['fecha_publicacion'] ?? 'N/A'; ?></p>

                    <div class="precio my-3">$<?php echo $content['precio_venta'] ?? ''; ?></div>

                    <div class="mb-3">
                        <strong>Introducción:</strong>
                        <p><?php echo $content['descripcion'] ?? ''; ?></p>
                    </div>

                    <!-- ✅ BOTONES -->
                    <div class="d-flex flex-wrap gap-3">

                        <a href="?va=<?php echo $content['idarticulo']; ?>&a=<?php echo $content['idarticulo']; ?>"
                            class="btn btn-primary btn-lg">
                            <i class="fa-solid fa-cart-shopping"></i> Agregar al carrito
                        </a>

                        <a href="../index.php" class="btn btn-outline-secondary btn-lg">
                            Volver
                        </a>

                    </div>

                </div>
            </div>
        </div>

        <?php include "../include/mensajeInfo.php"; ?>

        <!-- ✅ CALIFICACIÓN -->
        <div class="card shadow-sm p-4 mb-4">
            <h4>Calificación del público</h4>

            <h5><?php echo $promedio; ?> / 5 (<?php echo $totalReviews; ?> reseñas)</h5>

            <div class="stars">
                <?php
                $filled = round($promedio);
                for ($i = 1; $i <= 5; $i++) {
                    echo $i <= $filled ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                }
                ?>
            </div>
        </div>

        <!-- ✅ FORMULARIO REVIEW -->
        <div class="card shadow-sm p-4 mb-4">
            <h4>Escribe tu reseña</h4>

            <form action="guardarReview.php" method="POST">
                <input type="hidden" name="idarticulo" value="<?php echo $content['idarticulo']; ?>">

                <label class="mt-2">Tu calificación</label>
                <select name="calificacion" class="form-select w-25">
                    <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                    <option value="4">⭐⭐⭐⭐ (4)</option>
                    <option value="3">⭐⭐⭐ (3)</option>
                    <option value="2">⭐⭐ (2)</option>
                    <option value="1">⭐ (1)</option>
                </select>

                <label class="mt-3">Comentario</label>
                <textarea name="comentario" class="form-control" rows="3" required></textarea>

                <button class="btn btn-success mt-3">Enviar reseña</button>
            </form>
        </div>

        <!-- ✅ LISTADO REVIEWS -->
        <div class="mb-5">
            <h4>Opiniones de otros lectores</h4>

            <?php if (!isset($reviews) || count($reviews) == 0): ?>
                <p>No hay reseñas aún. Sé el primero en opinar.</p>
            <?php else: ?>
                <?php foreach ($reviews as $r): ?>

                    <div class="card shadow-sm p-3 mt-3 review-card">
                        <div class="d-flex justify-content-between">

                            <div>
                                <strong><?php echo htmlspecialchars($r['username'] ?? 'Usuario'); ?></strong>
                                <div class="stars ms-2 d-inline-block">
                                    <?php
                                    $cal = intval($r['calificacion'] ?? 0);
                                    for ($i = 1; $i <= 5; $i++) {
                                        echo $i <= $cal ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <?php if (isset($_SESSION['iduser']) && $_SESSION['iduser'] == $r['idusuario']): ?>
                                <form action="../logicaviews/eliminarReview.php" method="POST">
                                    <input type="hidden" name="idreview" value="<?php echo $r['idreview']; ?>">
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            <?php endif; ?>
                        </div>

                        <p class="mt-3"><?php echo nl2br(htmlspecialchars($r['comentario'] ?? '')); ?></p>

                        <small class="text-muted"><?php echo htmlspecialchars($r['fecha'] ?? ''); ?></small>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </main>

    <?php include "../include/footer.php"; ?>

</body>

</html>