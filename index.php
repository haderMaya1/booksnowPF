<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['valid'])) {
    header('Location: crud/login.php');
}else{
    header('Location: logicaviews/home.php');
}
?>
