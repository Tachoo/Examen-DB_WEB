<?php 

require "funciones.php";

$conexion = conexion('u720179037_3exam', 'root', '');
if (!$conexion) {
	die();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;
$page=isset($_GET['p']) ? (int)$_GET['p']:false;
if (!$id) {
	header('Location: index.php?page=4');
}

$statement = $conexion->prepare('SELECT * FROM galery_data WHERE id = :id');
$statement->execute(array(':id' => $id));

$foto = $statement->fetch();

if (!$foto) {
	header('Location: index.php?page=4');
}

require "foto.base.php";

?>