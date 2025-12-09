<?php
require '../crud/conf/connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Solo validamos que exista idusuario.
if (!isset($_SESSION['valid']) || !isset($_SESSION['iduser'])) {
    echo "<script>
        alert('Debes iniciar sesión para dejar una reseña.');
        window.location.href = '../crud/login.php';
    </script>";
    exit;
}

$idusuario = intval($_SESSION['iduser']);


if (!isset($_POST['idarticulo']) || !isset($_POST['calificacion']) || !isset($_POST['comentario'])) {
    echo "<script>
        alert('Faltan datos para registrar tu opinión.');
        window.history.back();
    </script>";
    exit;
}

$idarticulo     = intval($_POST['idarticulo']);
$calificacion   = intval($_POST['calificacion']);
$comentario     = trim($_POST['comentario']);

if ($calificacion < 1 || $calificacion > 5) {
    echo "<script>
        alert('La calificación debe estar entre 1 y 5 estrellas.');
        window.history.back();
    </script>";
    exit;
}

$consulta = $conexion->prepare("
    SELECT COUNT(*) FROM articulo_review 
    WHERE idarticulo = :idart AND idusuario = :iduser
");
$consulta->execute([
    ':idart' => $idarticulo,
    ':iduser' => $idusuario
]);

if ($consulta->fetchColumn() > 0) {
    echo "<script>
        alert('Ya has dejado una reseña para este libro.');
        window.history.back();
    </script>";
    exit;
}

$stmt = $conexion->prepare("
    INSERT INTO articulo_review (idarticulo, idusuario, calificacion, comentario, estado_review, fecha)
    VALUES (:idart, :iduser, :calificacion, :comentario, 'aprobado', NOW())
");

$success = $stmt->execute([
    ':idart'        => $idarticulo,
    ':iduser'       => $idusuario,
    ':calificacion' => $calificacion,
    ':comentario'   => $comentario
]);

if ($success) {
    echo "<script>
        alert('Tu reseña ha sido registrada correctamente.');
        window.location.href = 'detalles.php?a=$idarticulo';
    </script>";
} else {
    echo "<script>
        alert('Error al guardar la reseña. Intenta nuevamente.');
        window.history.back();
    </script>";
}
?>
