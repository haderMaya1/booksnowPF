<?php

$databaseHost = 'localhost';
$databaseName = 'booksnow';
$databaseUsername = 'root';
$databasePassword = '';

try
{
    $conexion = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);      
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
    echo "La conexión ha fallado: " . $e->getMessage();
}
?>