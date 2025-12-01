<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Charlar"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/chat.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link href="font/fontawesome/css/all.css" rel="stylesheet">
    <link href="font/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="../JS/js.js"></script>
    <script src="https://kit.fontawesome.com/b56decc6bc.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        //EVITAR EL REENVIO DE FORMULARIOS----------------------------------------------------------------------
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href, '../logicaviews/AdminLibro.php');
        }
    </script>
        <div class="contenedor_chat">
            <div id="contenedor_chat">
                <h1 class="text-black">Charlar</h1>
                <div id="caja-chat">
                    <div id="chat" onLoad="ajaxchat();">
                        <?php 
                    include_once '../include/conx_chat.php';
                    ?>
                    </div>
                </div>
            </div>
            <?php 
        require_once '../include/cajatxt.php';
        ?>
        </div>
        <br>
</body>

</html>