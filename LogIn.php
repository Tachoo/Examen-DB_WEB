
<?php
/*******************************************************************************************************************************/
// Revison 13/7/2017. Version 1.2 completada
/*******************************************************************************************************************************/
//Requerimos de las funciones y en especifico la conexcion.
require 'funciones.php';
//Hacemos la conexion desde el inicio
$conexion = conexion('u720179037_3exam', 'root', '');
if (!$conexion) 
{
	die();
}
//Seccion de variables elementales en el flujo de datos.
$id="";
$name="";
$errores="";
$enviado="";
$login=false;
//Seccion de variables elementales en el flujo de datos.

//la variable en post de submit existe
if(isset($_POST['submit']))
{
//Recolectamos los datos del $_POST;
   $user=$_POST['email'];
   $password=$_POST['password'];
     
     //estara vacio ?
     if(!empty($user))
     {
         //Limpeamos el dato de usuario
         $user=trim($user);
         $user=filter_var($user,FILTER_SANITIZE_EMAIL);
         if(!filter_var($user,FILTER_VALIDATE_EMAIL))
         {
             $errores.="Ingresa un correo valido <br\>";
         }
      }
       else
        {
         $errores.="";
        }

    //estara vacio ?
         if(!empty($password))
        {
             // Lmipeamos el dato de password
             $password=trim($password);
             $password=filter_var($password,FILTER_SANITIZE_STRING);
        }
        else
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

//Inportamos el docuemnteo de etiquetado
require 'login.base.php';

/*******************************************************************************************************************************/
// Revison 13/7/2017. Version 1.2 completada
/*******************************************************************************************************************************/
?>