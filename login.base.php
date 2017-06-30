
<!DOCTYPE>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="CSS/css.css">
        <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
       
    </head>
    <body>
        <div class="warp">
            <div id="Title">
                <h1>Log in to Continue</h1>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                 <!--Email-->
                 <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if(!$enviado && isset($user)){echo $user;} ?>">
                 <!--Password-->
                 <input type="password" class="form-control" name="password" placeholder="password" value="">
                 <!--Elementos Dinamicos-->
                 <?php if(!empty($errores)): ?>
                 <div class="alert error"><?php echo $errores;?></div>
                 <?php elseif($enviado):?>
                 <?php
                       $statement=$conexion->prepare('SELECT nombre,profilepic  FROM users_data WHERE id=:id');
                       $statement->execute(array(':id'=>$id));
                       $result=$statement->fetchAll();
                            echo "<pre>";
                            print_r($result);
                            echo "</pre>";
                              session_start();
                        	$_SESSION['user'] = $result; 

                             

                       

                   ?>
                 <div class="alert success"><?php ob_start();  /*header("refresh: 4; url = index.php");*/ echo $enviado; ob_end_flush(); ?></div>
                
                 <?php endif;?>

                 <input type="submit" name="submit" class="submit" value="Acceder">
            </form>
        </div>
    </body>
</html>