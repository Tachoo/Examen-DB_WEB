<?php 

require 'funciones.php';

$conexion = conexion('galery_data', 'root', '');
if (!$conexion) {
	die();
}
echo"Estamos en foto";
$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {
	header('Location: index.php');
}

$statement = $conexion->prepare('SELECT * FROM fotos WHERE id = :id');
$statement->execute(array(':id' => $id));

$foto = $statement->fetch();

if (!$foto) {
	header('Location: index.php');
}

require 'index.php';

?>