<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="icon" href="../IMG/icono.png">
    <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/chat.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script src="https://kit.fontawesome.com/b56decc6bc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <script>
    </script>
    <?php
    require '../crud/conf/connection.php';
    if(isset($_GET['id'])){
        Global $idchat;
        $idchat = $_GET['id'];
        $statement = $conexion->prepare('SELECT * FROM chat WHERE idmensaje = :id');  
        $statement->execute(array(':id' => $idchat));
        $resultado = $statement->fetch();
        if(isset($resultado['nombre'])){?>
        <br>
            <div class="delete1">
                <div class="delete2">
                    <h1>¡Cuidado!</h1>
                    <p>¿Realmente quiere eliminar su mensaje numero <b><?php echo $_GET['id'] . "</b>, <b>" . $resultado['nombre'] . "</b>?";?></p>
                    <a class="enlaceDelete bg-warning" id="enlacedelete" href="eliminar.php?id=<?php echo $idchat; ?>&type=private&respuesta=Eliminar">Eliminar</a>
                    <a class="enlaceDelete bg-warning" id="enlacecancelar" href="eliminar.php?respuesta=Cancelar">Cancelar</a>
                    <img src="../img/logo.png" alt="Books Now"> 
                </div>
            </div>  
        <?php
        }else{
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
        }
    }else if(isset($_GET['respuesta']) && $_GET['respuesta'] == 'Cancelar'){?>
    <br>
        <div class="delete1">
            <div class="delete2">
                <h1>¡Cerrando!</h1>
                <P>Tarea Cancelada</P> 
                <script languaje='javascript' type='text/javascript'>setInterval('window.close()',2000);</script>
                <img src="../img/logo.png" alt="Books Now"> 
            </div>
        </div><?php  
    }else{?>
    <br>
        <div class="delete1">
            <div class="delete2">
                <h1>¡Perdon!</h1>
                <P><b>Error: </b>Tuvimos un problema al tratar de elminar el mensaje, pronto lo solucionaremos.</P> 
                <script languaje='javascript' type='text/javascript'>setInterval('window.close()',5000);</script>
                <img src="../img/logo.png" alt="Books Now"> 
            </div>
        </div><?php
    }?>
    
</body>
</html>