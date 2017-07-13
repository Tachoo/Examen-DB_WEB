<?php
/*******************************************************************************************************************************/
// Revison 13/7/2017. Version 1.2 completada
/*******************************************************************************************************************************/

session_start();//Accedemos a la  session si es que hay una

//Si existe una session y esta vacia entonces debemos asumir que no esta logeado.
if(isset($_SESSION)) 
{
    if(empty($_SESSION))
    {
        header("refresh: 1;url = Login.php");
    }
}

//Si existe alguna variable en el logout entonces debemos de asumir que el usuario quiere salir de la web
if(isset($_GET["logout"]))
{
  /*-->Deberemos de enviarlo a la pagina donde se encontraba y aparte enviar los valores de logout*/
    session_destroy();
    //Lo mandamos a la pagina de login para indicarle que su session fue cerrada correctamente
    header("refresh: 1; url = Login.php");
}

//Obtenemos el numero de la pagina
if(isset($_GET['page']))
 {
     //verificamos que la variable no este vacia
  if(!empty($_GET['page'])&&!empty($_SESSION))
  {
    // solo verificamos page sea algo valido
    if($_GET['page']<0||$_GET['page']==0)
      {
    //Si es <=0 entonces asumimos que esta drogrado el usuario e imponemos nuestra autoridad mandandolo a la pagina de home de todos modos.    
      $page=1;
      }
    // si page es cualquier otra cosa  pues se lo asignamos a la variable  $page;
    else
      {
       $page=$_GET['page'];
      }

 }
 else
 {
   //Si no esta creado o esta vacio el la variable Get de page solo la creamos y la igualamos a page;

    $_GET['page']=1;
    $page=$_GET['page'];

 }

}
else
{
   //Si no esta creado o esta vacio el la variable Get de page solo la creamos y la igualamos a page;
  $_GET['page']=1;
  $page=$_GET['page'];

} 

/*******************************************************************************************************************************/
// Ya que sabemos que el usuario hasta el momento se porto bien o mas bien paso todos los filtros podemos continuar.
/*******************************************************************************************************************************/

//Requerimos parte del archivo 'Funciones.php' para poder hacer uso de ellas
require 'funciones.php';
//Realizamos la conexion a la base de datos
$conexion = conexion('u720179037_3exam', 'root', '');
//Solo si algo salio mal hay que cortar el flujo de datos
if (!$conexion) 
{
	die();
}
//Variables que ocupamos en el flujo de datos de la primera Query

$pagetitle="";
$Menu=array();
$contenido=0;

//-->Primera Query!

//Preguntamos al la base de datos sobre las paginas existentes 
 $statement=$conexion->prepare('SELECT *  FROM page_data');
 $statement->execute();
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  $result=$statement->fetchAll();
  
//Comprobamos y efectuamos cambios
 if($result>0)
 {
     foreach ($result as $key => $value)
      {
        //obtenemos todos los titulos del la base de datos y los ponemos en un arreglo
        array_push($Menu,$value['title']);

        //comparamos si el id de la base de datos  es la misma del id que el usuario quiere ver
         if($value['id']==$page)
         {
        //Si es asi pues el title de la pesta;a debe de cambiar
           $pagetitle=$value['title'];
         }
      }
     
 }
 else
 {
   //Mensaje de debug  despues se debe de cambiar por el error 404; (Literalmente no se encontro la pagina)
   echo"Algo fallo al tratar de traer todos los menus posibles y ligas";
 }
 
/*
//-->Segunda Query!
*/
//preguntamos a la base de datos sobre el contenido de la pagina ya validada
  $statement=$conexion->prepare('SELECT *  FROM content_data  where page_id=:page '); 
  $statement->execute( array(':page'=>$page));
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  $result=$statement->fetch();
   
   if($result>0)
   {
       /* 
       Agurpamos los resultados de el Query en Arreglos:
       el lugar numero 0  sea la classe
       el lugar numero 1  sea el contenido
       */ 
    
    //Titulo
    $title=array();
    array_push($title,$result['titleclass']);
    array_push($title,$result['title']);

    //Description 
    $Description=array();
    array_push($Description,$result['descclass']);
    array_push($Description,$result['description']);

    // Subbaner
    $Subbaner=array();
    array_push($Subbaner,$result['subbanerclass']);
    array_push($Subbaner,$result['subbaner']);

    $contenido=1;
   }
   else
   {
      //No se encontro contenido primario en el index
   }
   
//Ultima Query para la galeria de imagenes...
          
          //Verificar que realmente exista por lomenos 1 imagen  en dicha pagina.
     $statement=$conexion->prepare('SELECT * FROM galery_data  WHERE page_id=:page');
     $statement->execute( array(':page'=>$page) );
     $statement->setFetchMode(PDO::FETCH_ASSOC);
     $result=$statement->fetchAll();
     if($result>0)
      {

        $fotos_por_pagina = 4;
       
        $pagina_actual = (isset($_GET['p']) ? (int)$_GET['p'] : 1);
        $inicio = ($pagina_actual > 1) ? $pagina_actual * $fotos_por_pagina - $fotos_por_pagina : 0;

     $statement=$conexion->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM galery_data  WHERE page_id=:page LIMIT '.$inicio.', '.$fotos_por_pagina.'');
     $statement->execute( array(':page'=>$page) );
     $fotos = $statement->fetchAll();
     if (!$fotos) 
     {
    // header('refresh: 0; url = index.php?page=1');
     } 
     

     $statement = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");
     $statement->execute();
     $total_post = $statement->fetch()['total_filas'];

     $total_paginas = ceil($total_post / $fotos_por_pagina);
        

      }
      else
      {

      }


    
   /*Debemos de ver si relmente existe una galeria en la pagina*/


/*******************************************************************************************************************************/
/*
 Ya que tenemos tanto el contenido de la pagina como el titulo y otras cosas  hacemos el requerimiento de el template o la
 maqueta de la pagina.
*/
/*******************************************************************************************************************************/

require "index.base.php";

//Fin  del flujo de datos
?>