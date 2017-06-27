
<?php
//Punto de Acceso
try
{                   /*         10.1.2.121        u720179037_3exam u720179037_ana  SergioAnastacio20*/
                    /*         127.0.0.1        db_web_4_test        root                         */
 $conexion=new PDO('mysql:host=127.0.0.1;dbname=u720179037_3exam','u720179037_ana','SergioAnastacio20');

}catch(PDOException $e)
{
echo "Error:".$e->getMessage();
}

$id="";
$name="";
$errores="";
$enviado="";
$login=false;
//Primero veo si  la variable en post de submit existe 
// digamos que es para validar desde este mismo php los datos antes de enviar a otro php

if(isset($_POST['submit']))
{
    //Si se envio el formulario entonces
    // vamos a guardarlo en una variable tipo post para que no sea privada
   $user=$_POST['email'];
   $password=$_POST['password'];
     
     //Tenemos algo pero no sabemos que es lo que tenemos... creo que es emomento de ver que es
     //estara vacio ?
     if(!empty($user))
     {
         //Pues ya sabemos que no esta vacio  es momento de limpear lo que tenga adentro
         $user=trim($user);
         $user=filter_var($user,FILTER_SANITIZE_EMAIL);
         if(!filter_var($user,FILTER_VALIDATE_EMAIL))
         {
             $errores.="Ingresa un correo valido <br\>";
         }
     
     }else
     {
         $errores.="";
     }
    
         if(!empty($password))
     {
         //Pues ya sabemos que no esta vacio  es momento de limpear lo que tenga adentro
         $password=trim($password);
         $password=filter_var($password,FILTER_SANITIZE_STRING);
     }else
     {
         $errores.=" Rellene todos los campos de el Formulario";
     }


/*Si no encuentra errores quiere decir que todo esta bien y listo para  hacer la query*/
    if(!$errores)
     {
     
     //Preparamos  la Query
     $statement=$conexion->prepare('SELECT id,nombre  FROM users_data WHERE email=:user');
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute( array(':user'=>$user) );

     $result=$statement->fetch();
     //Debemos de ver si el arreglo es mayor a 0 de ser asi es que se lanzo la Query Bien y por consecuente si existe el correo en la base de datos
     if($result>0)
     {
        /*Sacamos algunos datos que ocuparemos despues*/
         $id=$result['id'];
         $name=$result['nombre'];
         /*Sacamos algunos datos que ocuparemos despues*/

         $statement=$conexion->prepare("SELECT password_data.password FROM password_data JOIN users_data ON password_data.id_user = users_data.id WHERE password_data.id_user=:id");
         $statement->execute( array(':id'=>$id) );
         //Obtenemos todos los Resultados
         $result=$statement->fetchAll();

         if($result>0)
         {
           //Sabemos que el resultado es mayor a 0  entonces  ya sabemos que tenemos todas las contrase;as
           foreach ($result as $result => $value)
            {
              //Recorremos hasta saber cual es el correcto ( problema al tener 2 contrase;as iguales en una misma persona)
              if($value['password']==$password)
              {
                  //Mucha mas seguridad
                     $enviado="Bienvenido De Nuevo Ing.".$name; 
                     $login==true;
                     break;
              }
           }
           //Solo cuando enviado sea diferente de "" y login sige siendo falso
          if(!$enviado&&$login==false)
          {
           $errores.="Usuario y/o Password incorrecto";   
          }
           
         }else
         {
             
         }

        
     }else
     {
         //de lo contrario  sabemos que no hay nada en la base de datos.  y lo 
        $enviado="";
        //por motivos de seguridad deberiamos  de mantener en anonimato que el correo es el que esta mal. 
        $errores.="Usuario y/o Password incorrecto";
     }
     
     }
     
     
}

//Inportamos el test.php
require 'login.base.php';

?>