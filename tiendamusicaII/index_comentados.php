<!doctype html>
<html lang="es">
<body>
  <?php 
  require_once("Classes/creador.php");
  $principio = new creador();
  $principio->set_titulo('Tienda de Música -- Principal');
  echo '<link rel="shortcut icon" href="images/icono_pagina.jpg" type="images/jpg"/>';
  $principio->crear();
//Pongo una variable para ver que cuepo tengo que cargar
//Contenedores
  ?>
  <section id="contenedor">
   <section id="publicidadder">
    <img name="slide" alt="logo patrocinadores" />
    <script type="text/javascript" src="slider.js"></script>
  </section>
  <section id="contenedorcentral">
    <section id="margen"></section>
    <?php

    require_once("cabecera.php");

    ?>

    <br> <br> <br>

    <section id="bloquenovedades">

      <section id="row">

        <!--<section id="margen"></section>-->

        <section id="bloqueizq">
          <section id="bloquenovedades">

            <?php
            /*Cuerpo de la pagina, tengo q separarlo mas*/ 
            $disco = new Disco(NULL);
            $conexion = crearConexion();
        //Primero consigo el id del comprador
            $sql = 'SELECT MAX(`idDisco`) FROM `Disco` WHERE `tipo` = 1';
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();
            $discos1 = $sentencia->fetch();
            
            $sql2 = 'SELECT * FROM `Disco` WHERE `idDisco` = '.$discos1[0].'';
            $sentencia = $conexion->prepare($sql2);
            $sentencia->execute();
            $discos1 = $sentencia->fetch();

            cierraConexion($conexion);
            /*Posicion 1 es igual a la izquierda*/
            ?>

            <section id="row">
              <!--<section id="margen"></section>-->

              <section id="bloqueizq">
                <section class="novedades">
                  <a href="disco.php?idDisco=<?=$discos1[0]?>" ><img src="<?=$discos1[6]?>" alt="estopa" class="CentrarNovedades" /></a>
                  <br><br>
                  <marquee><?=$discos1[1]?> - <?=$discos1[7]?></marquee>
                  <section id="row">
                    <section id="bloquesubizq">
                      <article class="comentarios"> <p><?=$disco->contadorComentarios($discos1[0])?></p> </alticle>
                      </section>
                      <section id = "bloquesubder">
                        <audio id = "izquierda" controls>
                          <source src= "musica/Pastillas_para_dormir.mp3">
                          </audio>
                        </section>
                      </section>
                    </section>
                  </section>



                  <?php
                  /*Cuerpo de la pagina, tengo q separarlo mas*/ 

                  $conexion = crearConexion();
        //Primero consigo el id del comprador
                  $sql = 'SELECT MAX(`idDisco`) FROM `Disco` WHERE `tipo` = 2';
                  $sentencia = $conexion->prepare($sql);
                  $sentencia->execute();
                  $discos2 = $sentencia->fetch();
                  
                  $sql2 = 'SELECT * FROM `Disco` WHERE `idDisco` = '.$discos2[0].'';
                  $sentencia = $conexion->prepare($sql2);
                  $sentencia->execute();
                  $discos2 = $sentencia->fetch();

                  cierraConexion($conexion);
                  /*Posicion 1 es igual a la izquierda*/
                  ?>

                  <section id="margen"></section>
                  <section id="bloquecentral">
                    <section class="novedades">
                      <a href="disco.php?idDisco=<?=$discos2[0]?>" ><img src="<?=$discos2[6]?>" alt="Cage the elephant" class="CentrarNovedades"/></a>
                      <br><br>
                      <marquee><?=$discos2[1]?> - <?=$discos2[7]?></marquee>
                      <section id="row">
                        <section id="bloquesubizq">
                          <article class="comentarios"> <p><?=$disco->contadorComentarios($discos2[0])?></p> </alticle>
                          </section>
                          <section id = "bloquesubder">
                            <audio id = "izquierda" controls>
                              <source src= "musica/Pastillas_para_dormir.mp3">
                              </audio>
                            </section>
                          </section>
                        </section>
                      </section>

                      <?php
                      /*Cuerpo de la pagina, tengo q separarlo mas*/ 

                      $conexion = crearConexion();
        //Primero consigo el id del comprador
                      $sql = 'SELECT MAX(`idDisco`) FROM `Disco` WHERE `tipo` = 3';
                      $sentencia = $conexion->prepare($sql);
                      $sentencia->execute();
                      $discos3 = $sentencia->fetch();
                      
                      $sql2 = 'SELECT * FROM `Disco` WHERE `idDisco` = '.$discos3[0].'';
                      $sentencia = $conexion->prepare($sql2);
                      $sentencia->execute();
                      $discos3 = $sentencia->fetch();

                      cierraConexion($conexion);
                      /*Posicion 1 es igual a la izquierda*/
                      ?>

                      <section id="margen"></section>
                      <section id="bloqueder">
                        <section class="novedades">
                          <a href="disco.php?idDisco=<?=$discos3[0]?>" ><img src="<?=$discos3[6]?>" alt="Andrew Manze" class="CentrarNovedades"/></a>
                          <br><br>
                          <marquee><?=$discos3[1]?> - <?=$discos3[7]?></marquee>
                          <section id="row">
                            <section id="bloquesubizq">
                              <article class="comentarios"> <p><?=$disco->contadorComentarios($discos3[0])?></p> </alticle>
                              </section>
                              <section id = "bloquesubder">
                                <audio id = "izquierda" controls>
                                  <source src= "musica/Pastillas_para_dormir.mp3">
                                  </audio>
                                </section>
                              </section>
                            </section>
                          </section>

                          <section id="margen"></section>

                        </section>

                      </section>  <!--BLoque novedades-->

                      <br> 

                      <section id = "menucentral">

                        <section id = "margencentral"><br></section>

                        <section id = "parteizq"> 

                         <br> <br> <br> <br>

                         <article id = "izquierda">
                          <p>Últimas noticias:</p>
                          <section id="ultimasnoticias"> 
                            <ul id = "menu">
                              <li><a href="http://www.lahiguera.net/musicalia/notidesc.php?noticia=24745" > -Nueva gira española de Andrés Calamaro.</a></li>
                              <li><a href="http://www.kissfm.es/2016/03/14/alejandro-sanz-eros-ramazzotti-cantan-canciones-disney/" > -Alejandro Sanz y Eros Ramazzotti cantan canciones Disney.</a></li> 
                              <li><a href="http://www.kissfm.es/2016/03/13/rihanna-arranca-nueva-gira-anti-world-tour/" > -Rihanna arranca nueva gira: ‘Anti World Tour’.</a></li>  
                              <li><a href="http://los40.com/los40/2016/03/17/fotorrelato/1458235957_511709.html#1458235957_511709_1458237198" > -Los 5 hitos que marcaron la carrera de Adam Levine.</a></li>
                              <li><a href="http://los40.com/los40/2016/03/16/musica/1458152622_872820.html" > -Redfoo y Gwen Stefani parten la pana con sus nuevos discos.</a></li>
                              <li><a href="http://los40.com/los40/2016/03/16/actualidad/1458127634_332960.html" > -Madonna aclara si actuó borracha o no.</a></li>
                              <li><a href="http://los40.com/los40/2016/03/16/actualidad/1458127634_332960.html" > -Madonna aclara si actuó borracha o no.</a></li>
                            </ul>
                          </section>

                          <p>Disco más comentado:</p>

                          <article class = "clasica">
                            <table class="tabla" >
                              <tr>
                                <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="140px" height = "140px"/></a> </td>
                                <td id = "tama" width="70%">Mozart night Music.</td>
                              </tr>
                              <tr>
                                <td>Andrew Manze.</td>
                              </tr>
                              <tr>
                                <td>
                                  <audio id = "izquierda2" controls>
                                    <source src= "musica/Pastillas_para_dormir.mp3">
                                    </audio>
                                  </td>
                                </tr>
                              </table>
                            </article> 

                          </article>

                          <section id = "margencentral"><br></section>

                          <article id = "derecha">
                            <p>Discos más comentados:</p>

                            <table class="tabla2" >
                              <tr>
                                <td id = "num" width = "5%">1.</td>
                                <td width = "20%"><img src="Discos/disco3.jpg" width="60px" height = "60px"/></a></td>
                                <td id = "tit" width = "75%">Mozart night Music.</td>
                              </tr>
                            </table>
                            
                            <hr>

                            <table class="tabla2" >
                              <tr>
                                <td id = "num" width = "5%">2.</td>
                                <td width = "20%"><img src="Discos/disco2.jpg" width="60px" height = "60px" /></a></td>
                                <td id = "tit" width = "75%">Rumba a lo desconocido.</td>
                              </tr>
                            </table>

                            <hr>
                            
                            <table class="tabla2" >
                              <tr>
                                <td id = "num" width = "5%">4.</td>
                                <td width = "20%"><img src="Discos/disco1.jpg" width="60px" height = "60px"/></a></td>
                                <td id = "tit">Tell me I'm pretty.</td>
                              </tr>
                            </table>
                            <hr>

                            <table class="tabla2" >
                              <tr>
                                <td id = "num" width = "5%">3.</td>
                                <td width = "20%"><img src="Discos/disco4.jpg" width="60px" height = "60px"/></a></td>
                                <td id = "tit">The pale emperor.</td>
                              </tr>
                            </table>

                            <hr>

                            <table class="tabla2" >
                              <tr>
                                <td id = "num" width = "5%">5.</td>
                                <td width = "20%"><img src="Discos/disco3.jpg" width="60px" height = "60px"/></a></td>
                                <td id = "tit" width = "75%">Mozart night Music.</td>
                              </tr>
                            </table>

                          </article>

                          

                          <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
                          <script type="text/javascript">
                          jQuery(document).ready(function(){
                            $(".oculto").hide();               
                            $(".inf").click(function(){
                              var nodo = $(this).attr("href");  
                              
                              if ($(nodo).is(":visible")){
                               return false;
                             }else{
                              $(".oculto").hide("slow"); 
                              $(".visible").hide("slow");                            
                              $(nodo).fadeToggle("fast");
                              return false;
                            }

                            if ($(nodo).is(":visible")){
                              return false;
                            }else{
                              $(".visible").hide("slow");                             
                              $(nodo).fadeToggle("fast");
                              return false;
                            }
                          }); 

                          }); 
</script>


<article id="abajo2">
  <section id = "Nomostrar">
    <p id ="left2" >Últimos discos por género:</p>  
    
    <section id="seccionestienda">
      <a href="#texto1" class="inf">Rock</a>
      <article class="barramenu"><img src="images/separador_menu.png" alt="Separador" border="0" /></article>
      <a href="#texto2" class="inf">Pop</a>
      <article class="barramenu"><img src="images/separador_menu.png" alt="Separador" border="0" /></article>
      <a href="#texto3" class="inf">Clásica</a>
      <article class="barramenu"><img src="images/separador_menu.png" alt="Separador" border="0" /></article>
      <a href="#texto4" class="inf">Metal</a>
    </section>

    <br>
    
    
    <div id="texto1" class="col-xs-12 well visible"> 
     <article id="iz">
       <section class="rock">
         <table class="tabla" >
           <tr>
             <td width="30%" rowspan="3"><img src="Discos/disco1.jpg" width="80px" height = "80px"/></a></td>
             <td id = "tama" width="70%">Tell me I'm pretty.</td>
           </tr>
           <tr>
             <td id = "tama2">Cage the Elephant.</td>
           </tr>
           <tr>
             <td id="right"><img src="images/play.png" > <img src="images/pause.png"></td>
           </tr>
         </table>
       </section>
     </article>

     <article id="sep"> <br> </article>

     <article id="cen">
       <section class="rock">
         <table class="tabla" >
           <tr>
             <td width="30%" rowspan="3"><img src="Discos/disco1.jpg" width="80px" height = "80px"/></a></td>
             <td id = "tama" width="70%">Tell me I'm pretty.</td>
           </tr>
           <tr>
             <td id = "tama2">Cage the Elephant.</td>
           </tr>
           <tr>
             <td id="right"><img src="images/play.png" > <img src="images/pause.png"></td>
           </tr>
         </table>
       </section>
     </article>

     <article id="sep"> <br> </article>

     <article id="der">
       <section class="rock">
         <table class="tabla" >
           <tr>
             <td width="30%" rowspan="3"><img src="Discos/disco1.jpg" width="80px" height = "80px"/></a></td>
             <td id = "tama" width="70%">Tell me I'm pretty.</td>
           </tr>
           <tr>
             <td id = "tama2">Cage the Elephant.</td>
           </tr>
           <tr>
             <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
           </tr>
         </table>
       </section>
     </article>
   </div>

   <div class="col-xs-12 well oculto" id="texto2">
    <article id="iz">
     <section class="pop">
       <table class="tabla">
         <tr>
           <td width="30%" rowspan="3"><img src="Discos/disco2.jpg" width="80px" height = "80px"/></a></td>
           <td id = "tama" width="70%">Rumba a lo desconocido.</td>
         </tr>
         <tr>
           <td id = "tama2">Estopa.</td>
         </tr>
         <tr>
           <td id="right"><img src="images/play.png" > <img src="images/pause.png"></td>
         </tr>
       </table>
     </section>
   </article>

   <article id="sep"> <br> </article>

   <article id="cen">
     <section class="pop">
       <table class="tabla">
         <tr>
           <td width="30%" rowspan="3"><img src="Discos/disco2.jpg" width="80px" height = "80px"/></a></td>
           <td id = "tama" width="70%">Rumba a lo desconocido.</td>
         </tr>
         <tr>
           <td id = "tama2">Estopa.</td>
         </tr>
         <tr>
           <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
         </tr>
       </table>
     </section>
   </article>

   <article id="sep"> <br> </article>

   <article id="der">
     <section class="pop">
       <table class="tabla">
         <tr>
           <td width="30%" rowspan="3"><img src="Discos/disco2.jpg" width="80px" height = "80px"/></a></td>
           <td id = "tama" width="70%">Rumba a lo desconocido.</td>
         </tr>
         <tr>
           <td id = "tama2">Estopa.</td>
         </tr>
         <tr>
           <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
         </tr>
       </table>
     </section>
   </article>
 </div>

 <div class="col-xs-12 well oculto" id="texto3">
  <article id="iz">
    <section class="clasica">
      <table class="tabla" >
        <tr>
          <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="80px" height = "80px"/></a></td>
          <td id = "tama" width="70%">Mozart Night Music.</td>
        </tr>
        <tr>
          <td id = "tama2">Andrew Manze.</td>
        </tr>
        <tr>
          <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
        </tr>
      </table>
    </section>
  </article>

  <article id="sep"> <br> </article>

  <article id="cen">
    <section class="clasica">
      <table class="tabla" >
        <tr>
          <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="80px" height = "80px"/></a></td>
          <td id = "tama" width="70%">Mozart Night Music.</td>
        </tr>
        <tr>
          <td id = "tama2">Andrew Manze.</td>
        </tr>
        <tr>
          <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
        </tr>
      </table>
    </section>
  </article>

  <article id="sep"> <br> </article>

  <article id="der">
    <section class="clasica">
      <table class="tabla" >
        <tr>
          <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="80px" height = "80px"/></a></td>
          <td id = "tama" width="70%">Mozart Night Music.</td>
        </tr>
        <tr>
          <td id = "tama2">Andrew Manze.</td>
        </tr>
        <tr>
          <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
        </tr>
      </table>
    </section>
  </article>
</div>

<div class="col-xs-12 well oculto" id="texto4">
  <article id="iz">
    <section class="metal">
      <table class="tabla" >
        <tr>
          <td width="30%" rowspan="3"><img src="Discos/disco4.jpg" width="80px" height = "80px"/></a></td>
          <td id = "tama" width="70%">The pale emperor.</td>
        </tr>
        <tr>
          <td id = "tama2">Marilyn Manson.</td>
        </tr>
        <tr>
          <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
        </tr>
      </table>
    </section>
  </article>

  <article id="sep"> <br> </article>

  <article id="cen">
    <section class="metal">
      <table class="tabla" >
        <tr>
          <td width="30%" rowspan="3"><img src="Discos/disco4.jpg" width="80px" height = "80px"/></a></td>
          <td id = "tama" width="70%">The pale emperor.</td>
        </tr>
        <tr>
          <td id = "tama2">Marilyn Manson.</td>
        </tr>
        <tr>
          <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
        </tr>
      </table>
    </section>
  </article>

  <article id="sep"> <br> </article>

  <article id="der">
    <section class="metal">
      <table class="tabla" >
        <tr>
          <td width="30%" rowspan="3"><img src="Discos/disco4.jpg" width="80px" height = "80px"/></a></td>
          <td id = "tama" width="70%">The pale emperor.</td>
        </tr>
        <tr>
          <td id = "tama2">Marilyn Manson.</td>
        </tr>
        <tr>
          <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
        </tr>
      </table>
    </section>
  </article>
</div>

</section>
</article>

</section> <!--parte izquierda-->


<script src="http://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
 $(".oculto2").hide();               
 $(".inf2").click(function(){
  var nodo2 = $(this).attr("href");  
  
  if ($(nodo2).is(":visible")){
   return false;
 }else{
  $(".oculto2").hide("slow"); 
  $(".visible2").hide("slow");                            
  $(nodo2).fadeToggle("fast");
  return false;
}

if ($(nodo2).is(":visible")){
  return false;
}else{
  $(".visible2").hide("slow");                             
  $(nodo2).fadeToggle("fast");
  return false;
}
}); 

}); 
</script>

<section id = "margencentral"><br></section>

<section id = "parteder">

  <p>Novedades por género:<p>
    
    <section id="seccionestienda" width = "30px">
      <article class="secDer">
        <a href="#texto5" class="inf2">Rock</a>
        <article class="barramenu"><img src="images/separador_menu.png" alt="Separador" border="0" /></article>
        <a href="#texto6" class="inf2">Pop</a>
        <article class="barramenu"><img src="images/separador_menu.png" alt="Separador" border="0" /></article>
        <a href="#texto7" class="inf2">Clásica</a>
        <article class="barramenu"><img src="images/separador_menu.png" alt="Separador" border="0" /></article>
        <a href="#texto8" class="inf2">Metal</a>
      </article>
    </section>

    <br>

    <div id="texto5" class="col-xs-12 well visible2"> 
      <section class="rock" >

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco1.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Tell me I'm pretty.</td>
          </tr>
          <tr>
            <td id = "tama2">Cage the Elephant.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco1.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Tell me I'm pretty.</td>
          </tr>
          <tr>
            <td id = "tama2">Cage the Elephant.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco1.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Tell me I'm pretty.</td>
          </tr>
          <tr>
            <td id = "tama2">Cage the Elephant.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco1.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Tell me I'm pretty.</td>
          </tr>
          <tr>
            <td id = "tama2">Cage the Elephant.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco1.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Tell me I'm pretty.</td>
          </tr>
          <tr>
            <td id = "tama2">Cage the Elephant.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco1.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Tell me I'm pretty.</td>
          </tr>
          <tr>
            <td id = "tama2">Cage the Elephant.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

      </section>  <!--rock-->
    </div>

    <div id="texto6" class="col-xs-12 well oculto2">
      <section class="pop" >

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco2.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Rumba a lo desconocido.</td>
          </tr>
          <tr>
            <td id = "tama2">Estopa.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla">
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco2.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Rumba a lo desconocido.</td>
          </tr>
          <tr>
            <td id = "tama2">Estopa.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla">
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco2.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Rumba a lo desconocido.</td>
          </tr>
          <tr>
            <td id = "tama2">Estopa.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla">
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco2.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Rumba a lo desconocido.</td>
          </tr>
          <tr>
            <td id = "tama2">Estopa.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla">
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco2.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Rumba a lo desconocido.</td>
          </tr>
          <tr>
            <td id = "tama2">Estopa.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla">
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco2.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Rumba a lo desconocido.</td>
          </tr>
          <tr>
            <td id = "tama2">Estopa.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

      </section>  <!--Pop-->
    </div>


    <div id="texto7" class="col-xs-12 well oculto2">
      <section class="clasica" >

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Mozart Night Music.</td>
          </tr>
          <tr>
            <td id = "tama2">Andrew Manze.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Mozart Night Music.</td>
          </tr>
          <tr>
            <td id = "tama2">Andrew Manze.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Mozart Night Music.</td>
          </tr>
          <tr>
            <td id = "tama2">Andrew Manze.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Mozart Night Music.</td>
          </tr>
          <tr>
            <td id = "tama2">Andrew Manze.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Mozart Night Music.</td>
          </tr>
          <tr>
            <td id = "tama2">Andrew Manze.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco3.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">Mozart Night Music.</td>
          </tr>
          <tr>
            <td id = "tama2">Andrew Manze.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

      </section>  <!--clasica-->
    </div>


    <div id="texto8" class="col-xs-12 well oculto2">
      <section class="metal" >

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco4.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">The pale emperor.</td>
          </tr>
          <tr>
            <td id = "tama2">Marilyn Manson.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco4.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">The pale emperor.</td>
          </tr>
          <tr>
            <td id = "tama2">Marilyn Manson.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco4.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">The pale emperor.</td>
          </tr>
          <tr>
            <td id = "tama2">Marilyn Manson.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco4.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">The pale emperor.</td>
          </tr>
          <tr>
            <td id = "tama2">Marilyn Manson.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco4.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">The pale emperor.</td>
          </tr>
          <tr>
            <td id = "tama2">Marilyn Manson.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

        <hr>

        <table class="tabla" >
          <tr>
            <td width="30%" rowspan="3"><img src="Discos/disco4.jpg" width="90px" height = "90px"/></a></td>
            <td id = "tama" width="70%">The pale emperor.</td>
          </tr>
          <tr>
            <td id = "tama2">Marilyn Manson.</td>
          </tr>
          <tr>
            <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
          </tr>
        </table>

      </section>  <!--metal-->
    </div>

    <br>

  </section> <!--parte derecha-->

  <section id = "margencentral"><br></section>

</section> <!--Menu central-->

<?php
//Esto es lo unico que cambia dentro de cada pagina
//require_once("novedades.php");
//El creador crea la cabecera HTML con todos los includes, lo he creado asi para facilitar las distintas página
require_once("piepagina.php");
?> 
</section>

</section>
</body>

</html>