<?php if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
Global $usuario, $psicologo;
require '../crud/conf/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'];
    $mensaje = $_POST['mensaje'];
    if ($usuario && $mensaje != false){
        try {
            $resultado = $conexion->prepare("SELECT pe.idpersona, pe.nombre, pe.apellido, pe.email, pe.telefono, pe.direccion FROM usuario us INNER JOIN persona pe ON us.idusuario = pe.idpersona WHERE us.idusuario = :idUsuario");  
            $resultado->execute(array(':idUsuario' => $_SESSION['iduser']));   
            $content = $resultado->fetch(PDO::FETCH_ASSOC);

            date_default_timezone_set('America/Bogota');
            $DateAndTime = date("Y-m-d H:i:s",time());

            $insertar = $conexion->prepare("INSERT INTO chat (idmensaje, idusuario, idrol, nombre, mensaje, fecha) VALUES (null, :idusuario, :idrol, :nombre, :mensaje, :fecha)");  
            $insertar->execute(array(':idusuario' => $_SESSION['iduser'], ':idrol' => $_SESSION['idrol'], ':nombre' => $usuario, ':mensaje' => $mensaje, ':fecha' => $DateAndTime));
        
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}


include "../view/chat.view.php";
?>
