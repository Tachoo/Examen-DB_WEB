<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/base_home.css">
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
                                      <input type="submit" value="Search" id="SubmitArea">
                                  </form> 
                              </div>
                              <!--ACC-->
                              <div id="accountname">
                                   <div id="NameandPick">
                                   
                                   <figure id="ProfilePic">
                                       <a href="#"><img src="img/profilepicks/Uzumaki.jpg"></a>
                                   </figure>
                                   
                                   <div id="username">
                                       <p>Uzumaki</p>
                                       </div>

                                    </div>
                                    <div id="opcions">
                                        <ul>
                                        
                                            <li><a href="#"class="links">MyAccount</a></li>
                                            <li><a href="#"class="links">MyCart</a></li>
                                            <li><a href="#"class="links">Log Out</a></li>
                                            
                                            
                                           
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
                <?php
                
                ?>



              </div>
              <!--bot-->
              <div id="footer" >
                   <div class="posfixed" id="bot">
                     <!-- Seecion de informacion -->
                     <!--Seccion de boletin informativo-->
                     <!--Seccion de patrocinadores-->  
                   </div>
              </div>
        </div>
    </body>
</html>