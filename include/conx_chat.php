<?php if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
date_default_timezone_set("America/Bogota");
require '../crud/conf/connection.php';

function newfecha($fecha){
    if(date('j') == date('j', strtotime($fecha))){
        return "Hoy ".date('g:i a', strtotime($fecha));
    } else{
        return date('M j / g:i a', strtotime($fecha));
    }
    //return date('M j, g:i a', strtotime($fecha));
}

$url = "";

if (isset($_SESSION['idrol'])) {
    $resultado = $conexion->prepare("SELECT * FROM chat ORDER BY idmensaje DESC ");  
    $resultado->execute(); 
    $role = "Usuario";
    while($fila = $resultado->fetch(PDO::FETCH_ASSOC)):               
    $id = $fila['idmensaje'];
    $rol = $fila['idrol'];
    $idusuario = $fila['idusuario'];
    ?>
    <div id="datos-chat">
        <span style="color: midnightblue; font-size: 18px;"><?php echo $fila['nombre']; ?> </span>
        <?php if($rol == 1){?>
            <span style="color: darkblue; float: right; margin-right: 3%; font-size: 18px;">Administrador </span><?php
        }?>
        <br>
        <span style="color: #848484;"><?php echo $fila['mensaje']; ?> </span>
        <br>
        <span style="color: #252932;"><?php echo newfecha($fila['fecha']); ?></span>

        <?php if(isset($_SESSION['idrol']) && $idusuario == $_SESSION['iduser']){?>
        <a href="../logicaViews/eliminar.php?id=<?php echo $id; ?>" target="_blank" class="fas"
            onclick="window.open(this.href, this.target, 'width=320,height=420,top=200,left=300'); return false;"><i class="fas fa-trash-alt"></i></a>
                
        <span style="color: red; float: right; margin-right: 3%;"><?php echo $id; ?></span><?php
        }?>
    </div>
    <?php endwhile;  
}
?>

