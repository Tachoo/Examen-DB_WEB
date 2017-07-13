<?php 

require "funciones.php";
$Back=$_GET['page'];
$RedirecionAutomatica="Location: index.php?page=.$Back";
$conexion = conexion('u720179037_3exam', 'root', '');
if (!$conexion) {
	die();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;
$page=isset($_GET['p']) ? (int)$_GET['p']:false;
if (!$id) {
	header($RedirecionAutomatica);
}

$statement = $conexion->prepare('SELECT * FROM galery_data WHERE id = :id');
$statement->execute(array(':id' => $id));

$foto = $statement->fetch();

if (!$foto) {
	header($RedirecionAutomatica);
}

require "foto.base.php";

?>