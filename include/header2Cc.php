<header>
    <div class="container bg-black text-white">
        <div class="row align-items-stretch justify-content-between">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="navbar navbar-dark bg-dark shadow-sm">
                    <div class="container">
                        <a href="../index.php" class="navbar-brand d-flex align-items-center">
                            <img src="../Img/logoIcon.png" style="border-radius: 20px;" height="40px"></img>
                            <strong>Books Now!!</strong>
                        </a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item dropdown">
                            <img src="../img copy/cart.jpeg" class="nav-link dropdown-toggle img-fluid"
                                max-height="60px" width="60px" id="dropdown01" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"></img>
                            <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                <div id='carritoHeader' class='p-3 text-center'>
                                    <table id="lista-carrito" class="table">
                                        <thead>
                                            <tr style='max-width: 400px; border-bottom: solid 3px rgb(160, 160, 160);'>
                                                <th class='p-1' style='max-width: 130px;'>Imagen</th>
                                                <th class='p-1' style='max-width: 130px;'>Nombre</th>
                                                <th class='p-1' style='max-width: 130px;'>Precio</th>
                                                <th class='p-2' style='min-width: 30px;'></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require "../crud/conf/connection.php";
                                        if(isset($_SESSION['carrito'])){
                                            foreach($_SESSION['carrito'] as $x=>$value){
                                                $idCarrito = $_SESSION['carrito'][$x];
                                                $resultado = $conexion->prepare("SELECT * FROM articulo WHERE idarticulo = :id"); 
                                                $resultado->execute(array(':id' => $idCarrito));
                                                $contentCarrito = $resultado->fetch(PDO::FETCH_ASSOC); 
                                                ?>
                                            <tr>

                                                <td class='p-1' style='max-width: 130px;'><img
                                                        src="<?php echo $contentCarrito['imagen']; ?>" width=100></td>
                                                <td class='p-1' style='max-width: 130px; overflow: hidden;'>
                                                <?php echo $contentCarrito['nombre']; ?></td>
                                                <td class='p-1' style='max-width: 130px;'><?php echo $contentCarrito['precio_venta']; ?></td>
                                                <td class='p-2' style='min-width: 30px;'>
                                    
                                                    <a class="borrar-producto fas fa-times-circle" style="font-size:15px; text-decoration: none; color: red;" href="
                                                        <?php if(isset($_GET['a'])){
                                                            echo '?a='.$_GET['a'] . '&el='.$x;
                                                        }else{
                                                            echo '?el='.$x; 
                                                        } ?>
                                                    "></a>
                                                </td>
                                            </tr> <?php
                                            } 
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a id="vaciar-carrito" class="btn btn-danger btn-block" href="
                                    <?php 
                                    if(isset($_GET['a'])){
                                        echo '?a='.$_GET['a'] . '&vaciar=1';
                                    }else{
                                        echo '?vaciar=1'; 
                                    } ?>
                                    ">Vaciar Carrito
                                </a>
                                
                                <a id="procesar-pedido" href="../view/carrito.view.php" class="btn btn-primary btn-block">Procesar
                                    Compra</a>
                                
                            </div>

                        </li>
                    </ul>
                </div>
                <?php if(isset($_SESSION['idrol'])){?>
                <div class="text-end navbar-brand d-flex">
                    <div class="nav me-lg-3 ">
                        <form class="input-group " role="search" method="POST" action="">
                            <input type="search" name="search" class="col-8 form-control" placeholder="Buscar Libro"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-light" type="submit" id="button-addon2" name="botonCrud"
                                value="Buscar">
                                Buscar
                            </button>
                        </form>
                    </div>
                    <?php if($_SESSION['idrol'] == 1){?>
                    <button type="button" onclick="location.href='./pageadmin.php'"
                        class="btn btn-outline-light me-2">Administrar</button>
                    <?php } ?>
                    <button type="button" onclick="location.href='../crud/logout.php'"
                        class="btn btn-warning">Salir</button>
                </div>
                <?php } ?>
            </nav>
        </div>
    </div>
</header>
