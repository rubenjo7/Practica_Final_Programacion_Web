<!doctype html>
<html lang="es">

<head>
  <?php 
  require_once("Classes/creador.php");
  $principio = new creador();
  $principio->set_titulo('Tienda de Música -- Sección');
  echo '<link rel="shortcut icon" href="images/icono_pagina.jpg" type="images/jpg"/>';
  $principio->crear();
        //Pongo una variable para ver que cuepo tengo que cargar
        //Contenedores
  ?>
</head>

<body>
  <section id="contenedor">

    <section id="publicidadder">
      <img name="slide" alt="logo patrocinadores" />
      <script type="text/javascript" src="slider.js"></script>
    </section>

    <section id="contenedorcentral">

      <?php
      require_once("cabecera.php");
      ?> 

      <section id = "izquierdaSeccion"><br></section>

      <section id = "centroSeccion">

        <?php
        /*Cuerpo de la pagina, tengo q separarlo mas*/ 
        $disco = new Disco(null);
        $numDisco = 0;
        /*Posicion 1 es igual a la izquierda*/
        $discos = $disco->discosTipo($_GET["tipo"]);

        echo '<h1><img src="images/'.$disco->devuelveFormato($_GET["tipo"]).'.jpg" width="60px" height = "60px"> Sección '  .$disco->devuelveTipo($_GET["tipo"]).'.</h1>';
        ?>

      </section>

      <section id = "menucentral">

        <section id = "margencentral"><br></section>

        <section id = "parteizq"> 

          <?php
          $variable = 0;
          if (count($discos) == 0) {
            echo "<p>No hay discos en este género, pongase en contacto con el administrador para poder solución al problema.</p>";
          } else {
            ?>

            <section class ="<?=$disco->devuelveFormato($_GET["tipo"])?>">
              <table class="tabla" >
                <tr>
                  <td width="30%" rowspan="3"><a href="disco.php?idDisco=<?=$discos[0]->datos["idDisco"]?>"><img src="<?=$discos[0]->datos["imagen_url"]?>" alt="imagendest" width="200px" height = "200px"/></a></td>
                  <td id = "discodestacado" width="70%" colspan="2"><?=$discos[0]->datos["titulo"]?>  <?php if($variable == 1) echo' <img src="images/borrar.png"/>'; ?></td>
                </tr>
                <tr>
                  <td id = "discodestacadosub" colspan="2"><?=$discos[0]->datos["artista"]?></td>
                </tr>
                <tr>
                  <td id="left" width="60%"><audio id = "izquierda" controls><source src= "musica/Pastillas_para_dormir.mp3"></audio></td>
                  <td width="40%"><article class="comentarios" id="right"> <p><?=$discos[0]->contadorComentarios($discos[0]->datos["idDisco"])?></p> </alticle></td>
                </tr>
              </table>
            </section>  


            <br>


            <article id = "izquierda" >
              <?php
              $numDisco = 1;
              for($i=1; $i<count($discos); $i++){
                $disco = $discos[$i];
                          if ($disco->datos["pos"] % 2 == 1) { //Izquierda
                            ?>
                            <section class ="<?=$disco->devuelveFormato($_GET["tipo"])?>">
                              <table class="tabla" >
                                <tr>

                                  <td width="30%" rowspan="2"><a href="disco.php?idDisco=<?=$disco->datos["idDisco"]?>"><img src="<?=$disco->datos["imagen_url"]?>" alt="imagenizq<?=$i?>" width="100px" height = "100px"/></a></td>
                                  <td id = "seccion" width="70%"><?=$disco->datos["titulo"]?></td>
                                </tr>
                                <tr>
                                  <td id = "seccionsub"><?=$disco->datos["artista"]?></td>
                                </tr>
                                <tr>
                                  <td id="right"><article class="comentarios"> <p><?=$disco->contadorComentarios($disco->datos["idDisco"])?></p> </alticle></td>
                                  <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
                                </tr>
                              </table>

                            </section>
                            <?php  
                          }
                        }
                        ?>
                      </article>

                      <section id = "margencentral"><br></section>

                      <article id = "derecha">
                        <?php
                        $numDisco = 1;
                        for($i=1; $i<count($discos); $i++){
                          $disco = $discos[$i];
                          if ($disco->datos["pos"] % 2 != 1) { //Derecha
                            ?>
                            <section class ="<?=$disco->devuelveFormato($_GET["tipo"])?>">
                              <table class="tabla" >
                                <tr>

                                  <td width="30%" rowspan="2"><a href="disco.php?idDisco=<?=$disco->datos["idDisco"]?>"><img src="<?=$disco->datos["imagen_url"]?>" alt="imagenizq<?=$i?>" width="100px" height = "100px"/></a></td>
                                  <td id = "seccion" width="70%"><?=$disco->datos["titulo"]?></td>
                                </tr>
                                <tr>
                                  <td id = "seccionsub"><?=$disco->datos["artista"]?></td>
                                </tr>
                                <tr>
                                  <td id="right"><article class="comentarios"> <p><?=$disco->contadorComentarios($disco->datos["idDisco"])?></p> </alticle></td>
                                  <td id="right"><img src="images/play.png"> <img src="images/pause.png"></td>
                                </tr>
                              </table>

                            </section>
                            <?php  
                          }
                        }
                        ?>
                      </article>



                    </section> <!--parte izquierda-->
                    <?php
                  }
                  ?>

                  <section id = "margencentral"><br></section>

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

                  <section id = "parteder">

                    <p>Más vendidos:<p>
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

                  <section id = "derechaSeccion"><br></section>

                  <?php
                  require_once("piepagina.php");
                  ?>

                </section> <!--Contenerdor central-->

              </section> <!--Contenerdor-->

            </body>
            </html>