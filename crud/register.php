<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("conf/connection.php");

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$tipoDocumento = $_POST['tipoDocumento'];
	$numeroDocumento = $_POST['numeroDocumento'];
	$email = $_POST['email'];
	$direccion = $_POST['direccion'];
	$celular = $_POST['celular'];
	$userName = $_POST['userName'];
	$password = $_POST['password'];
	$validarPassword = $_POST['validarPassword'];

	if (empty($nombre) or empty($apellido) or empty($tipoDocumento) or empty($numeroDocumento) or empty($email) or empty($userName) or empty($password) or empty($validarPassword)) {
        $errores = "Por favor rellena todos los datos correctamente";
	} elseif ($validarPassword != $password) {
		$errores = "Las contraseñas no coinciden";
	} else {
		$password = hash('sha512', $password);

		$statement = $conexion->prepare("SELECT * FROM usuario WHERE nombre = :user")
		or die("Could not execute the select query.");
		$statement->execute(array(':user' => $userName));
		$tablaUsuario = $statement->fetch(PDO::FETCH_ASSOC);

		$statement = $conexion->prepare("SELECT * FROM persona WHERE num_documento = :numeroDocumento")
		or die("Could not execute the select query.");
		$statement->execute(array(':numeroDocumento' => $numeroDocumento));
		$tablaPersona = $statement->fetch(PDO::FETCH_ASSOC);

		if(isset($tablaUsuario['nombre']) or isset($tablaPersona['num_documento'])){
			$errores = "Este nombre de usuario o la persona ya existe";
		}else{
			$statement = $conexion->prepare("INSERT INTO persona(idpersona, nombre, apellido, tipo_documento, num_documento, email, direccion, telefono) VALUES (null, :nombre, :apellido, :tipo_documento, :num_documento, :email, :direccion, :telefono)")
			or die("Could not execute the select query.");
			$statement->execute(array(':nombre' => $nombre, ':apellido' => $apellido, ':tipo_documento' => $tipoDocumento, ':num_documento' => $numeroDocumento, ':email' => $email, ':direccion' => $direccion, ':telefono' => $celular));

			$statement = $conexion->prepare("SELECT * FROM persona WHERE num_documento = :numeroDocumento")
			or die("Could not execute the select query.");
			$statement->execute(array(':numeroDocumento' => $numeroDocumento));
			$tablaPersona = $statement->fetch(PDO::FETCH_ASSOC);

			$statement = $conexion->prepare("INSERT INTO usuario(idusuario, idpersona, idrol, nombre, password, estado) VALUES (null, :idpersona, 2, :nombre, :password, 1)")
			or die("Could not execute the select query.");
			$statement->execute(array(':idpersona' => $tablaPersona['idpersona'], ':nombre' => $userName, ':password' => $password));

			header('Location: ../index.php');		
		}
	}
} 
require '../view/registro.view.html';
?>