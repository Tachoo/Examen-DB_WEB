<?php
/*******************************************************************************************************************************/
//Debemos de hacer un filtro para cualquier posible accion de l "USUARIO"
/*******************************************************************************************************************************/
session_start();//Accedemos a la  session si es que hay una

//Si existe una session y esta vacia entonces debemos asumir que no esta logeado.
if(isset($_SESSION)) 
{
    if(empty($_SESSION))
    {
        header("refresh: 0; url = Login.php");
    }
}

//Si existe alguna variable en el logout entonces debemos de asumir que el usuario quiere salir de la web
if(isset($_GET["logout"]))
{
    //Cerramos la session por motivos de seguridad
    session_destroy();
    //Lo mandamos a la pagina de login para indicarle que su session fue cerrada
    header("refresh: 2; url = Login.php");
}

//Obtenemos el numero de la pagina
if(isset($_GET['page'])&&!empty($_SESSION))
 {
     //verificamos que la variable no este vacia
  if(!empty($_GET['page']))
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
   //sabemos que esta vacia la variable de page debemos de darle un index hacia la pagina prinicipal
   $page=1;
 }

}
else
{
   //Como sabemos el usuario termino haciendo algo que no preveimos ... debemos de arreglarlo 
   $page=1;
} 

/*******************************************************************************************************************************/
// Ya que sabemos que el usuario hasta el momento se porto bien o mas bien paso los filtros XD podemos continuar.
/*******************************************************************************************************************************/

//Realizamos la conexion a la base de datos
try  
{
// pc                                           db_web_4_test   
// lap                                          u720179037_3exam
 $conexion=new PDO('mysql:host=127.0.0.1;dbname=u720179037_3exam','root','');

}
//Cualquier cosa que salio mal en la base de datos nos lo va a decir  en el catch -->(Solo problemas de conexion);
catch(PDOException $e) 
{
echo "Error:".$e->getMessage();
}
//Variables que ocupamos en el flujo de datos de la primera Query

$pagetitle="";
$Menu=array();

/*
//-->Primera Query!
*/

//Preguntamos al la base de datos sobre las paginas existentes 
 $statement=$conexion->prepare('SELECT *  FROM page_data LIMIT 5 '); //Limitamos el numero de cosas por el especio en el css
 $statement->execute();
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
   
   $statement=$conexion->prepare('SELECT *  FROM content_data  where id=:page ');
   $statement->execute( array(':page'=>$page));
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

   }else
   {
       //Mensaje de debug despues se debe de cambiar por el error 404; (Literalmente no existe contenido en esa pagina y por consecuente no debemos de mostrar la pagina)
       echo" No  Existe Contenido En este Index";
   }
/*******************************************************************************************************************************/
/*
 Ya que tenemos tanto el contenido de la pagina como el titulo y otras cosas  hacemos el requerimiento de el template o la
 maqueta de la pagina.
*/
/*******************************************************************************************************************************/

require "index.base.php";

//Fin  del flujo de datos
?>