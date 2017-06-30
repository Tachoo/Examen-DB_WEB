<?php 
//Documento de funciones  que podrian ser utiles 
/*Hacer funcion de conexion*/

function conexion($tabla, $usuario, $pass){
	try {
		$conexion = new PDO("mysql:host=localhost;dbname=$tabla", $usuario, $pass);
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}
//Funcion para debugear
function printArray($var)
{
	echo"<pre>";
	print_r($var);
	echo"</pre>";
}

//Funcion para determinar que lo que se busca en extra

function GetExtra($var)
{
  switch ($var)
   {
	  case 'Galery':
	  case 'galery':
	  
		  $var="galery";
		  return $var;
		  break;

	  case 'Contact':
	  case 'contact':
		  $var="Contact";
		  return $var;
		  break;

	  case 'Map':
	  case 'map':
		  $var="Map";
		  return $var;
		  break;
		  
	  default:
		  # code...
		  break;
  }
}

?>

