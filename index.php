<?php
$title="";
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
if(isset($_GET['page']))
 {
  $page=$_GET['page'];

 }

 $statement=$conexion->prepare('SELECT id,title  FROM page_data WHERE id=:page');
 $statement->execute(array(':page'=>$page));
 $result=$statement->fetch();
 //Si se hizo bien la coneexion deberemos de ver si hay resultados o no
 if($result>0)
 {
 if ($page==$result['id'])
 {
     //Lo igualamos
   $title=$result['title'];
 }


 }else
 {
  echo"La Qery salio mal";
 }
 //Test only
require "index.base.php"

?>