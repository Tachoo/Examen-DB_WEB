<?php
$errores="";
//Primero veo si  la variable en post de submit existe 
// digamos que es para validar desde este mismo php los datos antes de enviar a otro php

if(isset($_POST['submit']))
{
    //Si se envio el formulario entonces
    // vamos a guardarlo en una variable tipo post para que no sea privada
   $user=$_POST['email'];
     
     //Tenemos algo pero no sabemos que es lo que tenemos... creo que es emomento de ver que es
     //estara vacio ?
     if(!empty($user))
     {
         //Pues ya sabemos que no esta vacio  es momento de limpear lo que tenga adentro
         $user=filter_var($user,FILTER_SANITIZE_EMAIL);
         if(!filter_var($user,FILTER_VALIDATE_EMAIL))
         {
             $errores.="porfavor agrega un correo valido <br\>";
         }
              //Testing only
   echo $user; 
     }else
     {
         $errores.="usuario invalido";
     }


}


?>
<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="warp">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                 <input type="text" class="form-control" name="email" placeholder="Email" value="">
                 <input type="submit" name="submit" class="form-control" value="Acceder">
            </form>
        </div>
    </body>
</html>