<?php


$pagetitle="";
$Menu=array();

//Conexion a la base de datos
try //-->Intentar 
{
// pc                                           db_web_4_test   
// lap                                          u720179037_3exam
 $conexion=new PDO('mysql:host=127.0.0.1;dbname=u720179037_3exam','root','');

}catch(PDOException $e) //--> Mostrar errores de conexion y otras cosas
{
echo "Error:".$e->getMessage();
}
//Sacamos el numero de la pagina
if(isset($_GET['page']))
 {
     
  $page=$_GET['page'];
  if($page<1)
  {
      $page=1;
  }
 }else
 {
     $page=1;
 }
//Preguntamos al la db
 $statement=$conexion->prepare('SELECT *  FROM page_data LIMIT 5 '); //Limitamos el numero de cosas por el especio en el css
 $statement->execute();
 $result=$statement->fetchAll();
//Comprobamos y efectuamos cambios
 if($result>0)
 {
     foreach ($result as $key => $value)
      {
          //Sacamos todos los titulos del la base de datos y los ponemos en un arreglo
        array_push($Menu,$value['title']);

         //Sacamos el titulo del id  de la variable Get
        if($value['id']==$page)
        {
        $pagetitle=$value['title'];
        }
 }
 }
 else
 {
  echo"Algo fallo al tratar de traer todos los menus posibles y ligas";
 }
 //Segunda Qery
  
  //$statement=$conexion->prepare('SELECT name,profpic  FROM users_data where '); //Limitamos el numero de cosas por el especio en el css
 
 //Tercera Qery
   
   $statement=$conexion->prepare('SELECT *  FROM content_data  where id=:page ');
   $statement->execute( array(':page'=>$page));
   $result=$statement->fetch();
   echo"<pre>";
   print_r($result);
   echo"</pre>";
   if($result>0)
   {
       //Creamos 3 Arreglos donde en el lugar numero 0  sea la classe
       // y  el lugar numero 1  sea el contenido

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

   }else
   {
       echo" No  Existe Contenido En este Index";
   }
 //
require "index.base.php"

?>