<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../crud/conf/connection.php';

if (!isset($_SESSION['valid']) || !isset($_SESSION['iduser'])) {
    header("Location: ../crud/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idreview"])) {

    $idreview = intval($_POST["idreview"]);
    $iduser = intval($_SESSION['iduser']);

    // Verificar que la review pertenece al usuario
    $query = $conexion->prepare("SELECT idusuario FROM articulo_review WHERE idreview = :idreview");
    $query->execute([':idreview' => $idreview]);
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if (!$row || $row['idusuario'] != $iduser) {
        echo "<script>alert('No tienes permiso para eliminar esta review'); history.back();</script>";
        exit;
    }

    // Eliminar
    $delete = $conexion->prepare("DELETE FROM articulo_review WHERE idreview = :idreview");
    $delete->execute([':idreview' => $idreview]);

    echo "<script>alert('Review eliminada'); history.back();</script>";
    exit;
}

echo "Acceso no permitido.";
?>
