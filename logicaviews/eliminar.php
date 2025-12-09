<?php
require '../crud/conf/connection.php';
    if(isset($_GET['id']) && isset($_GET['respuesta'])){
        if($_GET['respuesta'] == 'Eliminar'){
            $idchat = $_GET['id'];
            $statement = $conexion->prepare('DELETE FROM chat WHERE idmensaje = :id');
            $statement->execute(array(':id' => $idchat));
            ?><script languaje='javascript' type='text/javascript'>window.close();</script><?php
        }
    }

require '../view/eliminar.view.php';
?>