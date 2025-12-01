<?php
    require '../crud/conf/connection.php';
    $resultado = $conexion->query("SELECT * FROM categoria ORDER BY idcategoria ASC"); 
    if(isset($botonCrud)){
        while($categoria = $resultado->fetch_array()):
        ?>
            <option value="<?php echo $categoria['idcategoria']; ?>"><?php echo $categoria['nombre']; ?></option>
        <?php 
        endwhile; 
    }else{
        while($categoria = $resultado->fetch_array()):  
            if($categoria['idcategoria'] == $content['idcategoria']){
                ?>
                <option value="<?php echo $categoria['idcategoria']; ?>" selected><?php echo $categoria['nombre']; ?></option>
                <?php 
            }else{
                ?>
                <option value="<?php echo $categoria['idcategoria']; ?>"><?php echo $categoria['nombre']; ?></option>
                <?php 
            }
        endwhile;  
    }
?>