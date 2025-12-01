<?php if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
   
if (isset($_SESSION['valid'])) {
    ?>
    <div id="caja_txt">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="text" id="usuario" name="usuario" placeholder="Tu nombre" value="<?php echo $_SESSION['valid'];?>"><br>
            <textarea name="mensaje" id="mensaje" placeholder="Mensaje" cols="30" rows="10"></textarea><br>
            <input class="col col-12" type="submit" id="submit" name="enviar" value="Enviar"><br>
        </form>
    </div>
    <?php
}
?>