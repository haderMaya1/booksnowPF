<?php
require '../crud/conf/connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['valid'])) {
    header('Location: ../crud/login.php');
}

$idArticuloCargado = null;

if (isset($_GET['a'])) {
    $idArticuloCargado = $_GET['a'];
}

if (isset($idArticuloCargado)) {
    $idarticulo = $idArticuloCargado;

    // Obtener detalles del artículo
    $resultado = $conexion->prepare("SELECT ar.idarticulo, ar.nombre, ca.nombre AS categoria, ar.idcategoria, 
        ar.codigo, ar.precio_venta, ar.stock, ar.descripcion, ar.imagen, ar.estado, ar.autor, ar.editorial, 
        ar.fecha_publicacion 
        FROM articulo ar 
        INNER JOIN categoria ca ON ca.idcategoria = ar.idcategoria 
        WHERE idarticulo = :id");
    $resultado->execute(array(':id' => $idarticulo));
    $content = $resultado->fetch(PDO::FETCH_ASSOC);

    // ======================================
    // Obtener promedio de calificación
    // ======================================
    $stmt = $conexion->prepare("SELECT AVG(calificacion) AS promedio, COUNT(*) AS total 
                                FROM articulo_review 
                                WHERE idarticulo = :id AND estado_review = 'aprobado'");
    $stmt->execute([':id' => $idarticulo]);
    $ratingData = $stmt->fetch(PDO::FETCH_ASSOC);

    $promedio = $ratingData['promedio'] ? round($ratingData['promedio'], 1) : 0;
    $totalReviews = $ratingData['total'];

    // ======================================
    // Obtener lista de reviews aprobadas
    // ======================================
    $stmt2 = $conexion->prepare("
    SELECT 
        r.idreview,
        r.idusuario,
        r.calificacion,
        r.comentario,
        r.fecha,
        u.nombre AS username
    FROM articulo_review r
    INNER JOIN usuario u ON u.idusuario = r.idusuario
    WHERE r.idarticulo = :id
      AND r.estado_review = 'aprobado'
    ORDER BY r.fecha DESC
");

    $stmt2->execute([':id' => $idarticulo]);
    $reviews = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}

require "../view/Detalles.view.php";
