<div class="card mb-4 shadow-sm text-center text-black position-relative z-index-n1" id="lista-productos">
    <div class="card-header">
        <h4 style="text-transform: uppercase;" id="titulo" class="my-0 font-weight-bold"><?php echo $content['nombre']; ?></h4>
    </div>
    <div class="card-body" style="width: fit-content; height: 225px; margin: auto; cursor: pointer;" onclick="location.href='./detalles.php?a=<?php echo $content['idarticulo']; ?>'">
        <img src="<?php echo $content['imagen']; ?>" style="max-height: 225px; display: block; margin: auto;" class="card-img-top">
    </div>
    <div class="card-body">
        <h1 style="text-transform: uppercase;" class="card-title pricing-card-title precio">$ <span><?php echo $content['precio_venta']; ?></span></h1>
        <ul class="list-unstyled mt-3 mb-4">
            <li style="height: 90px; overflow: hidden"><?php echo $content['descripcion']; ?></li>
        </ul>
        <button class="btn btn-block btn-dark text-white agregar-carrito" id="codigo" onclick="location.href='?va=<?php echo $content['idarticulo']; ?>'" data-id="">Agregar</button><br>
        <?php
        if($content['estado'] == 1){
            ?>
        <div><small class="text-muted"><strong class="d-inline-block mb-2 text-primary">EN DESCUENTO</strong></small></div>
        <?php
        }?>

    </div>
</div>


