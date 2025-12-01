<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
<script>
        //EVITAR EL REENVIO DE FORMULARIOS----------------------------------------------------------------------
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href, '../logicaviews/AdminLibro.php');
        }
    </script>
    <div class="row text-center m-lg-0">
        <div class="col-6 col-md-4 vh-100" style="padding-top: 5%;">
        <h1>Ingresar</h1>
            <div class="container overflow-hidden text-center m-0 row justify-content-center">
                <div class="row row-cols-auto">
                    <form method="POST" action="../crud/login.php">
                        <div class="row row-cols-auto mb-4">
                            <label class="fs-5 p-2">Ingrese su Usuario</label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user fs-5 p-2"></i></span>
                                </div>
                                <input class="form-control fs-5 p-2" type="text" name="username" placeholder="Nombre de Usuario">
                            </div>
                        </div>

                        <div class="row row-cols-auto mb-4">
                            <label class="fs-5 p-2">Ingrese su Contraseña</label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key fs-5 p-2"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control fs-5 p-2"
                                    placeholder="Contraseña">
                            </div>
                        </div>

                        <div class="row justify-content-center align-content-center">
                            <?php include '../include/ToolTipError.php'; ?>
                            <button type="submit" name="submit"
                                class="p-2 col-5 border fs-5 btn btn-primary">Ingreso</button>
                            <a href="../crud/register.php" type="submit" class="p-2 col-5 border fs-5 btn btn-dark">Registro</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-8 vh-100 text-light"
            style="padding-top: 5%; background-image: url('https://img.freepik.com/vector-premium/formas-abstractas-colores-fondo_559819-657.jpg'); background-size: cover; background-repeat: no-repeat;">
            <h1>Books Now!!</h1>
            <h1 class="p-3 fs-3">Ingresa o registrate para tener acceso a todo el contenido <br> que tenemos para
                ofrecerte.</h1>
        </div>
    </div>
</body>

</html>