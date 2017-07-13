<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, user-scalable=no,
	     initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!--Solo para obtener unas imagenes en forma de txt-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!--Obtenemos una fuente desde google-->
        <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
        <!--Estilosbase y una fuente Roboto-->
        <link rel="stylesheet" type="text/css" href="CSS/base_home.css">
        <link rel="stylesheet" type="text/css" href="CSS/dinamic_presets.css">
        <link rel="stylesheet" type="text/css" href="CSS/css.css">
        <title><?php echo$pagetitle;?></title>
    </head>
    <body>
        <div id="warper">
              <!--top-->
              <div id="header">
                   <div class="posfixed">
                         <div id="TA"><!--Logo>SearchSection>AccountName-->
                              <figure id="Logosec">
                                  <img id="logo" src="img/logo/uniat.png">
                              </figure>
                              <!--Search-->
                              <div id="searchbar">
                                 <form id="SearchBrowser">
                                      <input type="text" placeholder="Search in our store" id="TextArea">
                                      <input type="submit" value="Search" class="submit" id="SubmitArea">
                                  </form> 
                              </div>
                              <!--ACC-->
                              <div id="accountname">
                                   <div id="NameandPick">
                                   
                                   <figure id="ProfilePic">
                                       <?php
                                       echo'<a href="#"><img src="img/profilepicks/'.$_SESSION["user"][0]["profilepic"].'"></a>'; /*Eureka !!!  esta muy grande el arreglo 3 dimencional*/
                                       ?>
                                       
                                   </figure>
                                   
                                   <div id="username">
                                       <?php echo'<p>'.$_SESSION["user"][0]["nombre"].'</p>'?>
                                       </div>

                                    </div>
                                    <div id="opcions">
                                        <ul>
                                        
                                            <li><a href="#"class="links">MyAccount</a></li>
                                            <li><a href="#"class="links">MyCart</a></li>
                                            <li><a href="index.php?logout=3%lg$va%us235"class="links">Log Out</a></li>
                                            
                                            
                                           
                                        </ul>
                                        
                                    </div>
                              </div>
                         </div>

                   </div>
                   <!--NavBar-->
                   <div id="nabvar">
                       <div class="posfixed" >
                         <div id="TB"><!--Navbar-->
                              
                              <ul id="navfix">

                               <?php
                                $index=1;
                                foreach ($Menu as $key => $value)
                                {
                                echo '<li><a href="index.php?page='.$index.'"><br><p>'.$value.'</p></a></li>';
                                $index++;
                                }
                                         
                                ?>
                                
                                
                              </ul>

                         </div>
                       </div>
                   </div>
              </div>
              <!--mid-->
              <div class="posfixed" id="mid">   
                <?php if(!empty($extra)):?>
                  
                  <!--Titulo-->
                   <?php
                   if(!empty($title))
                   {
                     echo '<div class="class'.$title[0].'"><h1>'.$title[1].'</h1></div>';
                   }
                    
                   ?>
                   <!--Descripcion-->
                   <?php
                   if(!empty($Description))
                   {
                     echo '<div id="dinamic_grid"><div class="class'.$Description[0].'"><dd>'.$Description[1].'</dd></div>';
                   }

                   ?>
<!--Imagen-->
                   <?php
                   if(!empty($Subbaner[0])&&!empty($Subbaner[1]))
                   {
                      
                     echo '<div class="class'.$Subbaner[0].'"><img src="img/subbaners/'.$Subbaner[1].'"></div></div>';
                   }else
                   {

                   }

                   ?>
                   <!--Extra-->
                   
                   

                <?php elseif(empty($extra)):?>
                   <!--Titulo-->
                   <?php
                   if(!empty($title))
                   {
                     echo '<div class="class'.$title[0].'"><h1>'.$title[1].'</h1></div>';
                   }
                    
                   ?>
                   <!--Descripcion-->
                   <?php
                   if(!empty($Description))
                   {
                     echo '<div id="dinamic_grid"><div class="class'.$Description[0].'"><dd>'.$Description[1].'</dd></div>';
                   }

                   ?>
                   <!--Imagen-->
                   <?php
                   if(!empty($Subbaner[0])&&!empty($Subbaner[1]))
                   {
                      
                     echo '<div class="class'.$Subbaner[0].'"><img src="img/subbaners/'.$Subbaner[1].'"></div></div>';
                   }

                   ?>
                   <!---->
                    <?php elseif(!empty($extra)):?>
                    

                <?php endif;?>
                      
                      <!---->
                      <div class="contenedor">
                     
                     <?php foreach($fotos as $foto):?>
				       <div class="thumb">
					      <a href="foto.php?id=<?php echo $foto['id']."&p="; echo $pagina_actual; echo"&page=".$_GET['page']; ?>">
					          <img src="img/fotos/<?php echo $foto['imagen'] ?>" alt="">
					      </a>
				       </div>
			         <?php endforeach;?>
                   
                       <div class="paginacion">
				           <?php if ($pagina_actual > 1): ?>
					          <a href="index.php?<?php echo "page=".$_GET['page']."&p="; echo $pagina_actual - 1;?>" class="izquierda"><i class="fa fa-long-arrow-left"></i> Pagina Anterior</a>
				           <?php endif ?>

				           <?php if ($total_paginas != $pagina_actual): ?>
                           
					          <a href="index.php?<?php echo "page=".$_GET['page']."&p=";echo $pagina_actual + 1;?>" class="derecha">Pagina Siguiente <i class="fa fa-long-arrow-right"></i></a>
				           <?php endif ?>
                        </div>
                    </div>
                      <!---->

               </div>
              </div>
              <!--bot-->

        <div id="footer" >
                   <div class="posfixed" id="bot">
                     <!-- Seecion de informacion -->
                     <!--Seccion de boletin informativo-->
                     <!--Seccion de patrocinadores-->  
                   </div>
              </div>
    </body>
</html>