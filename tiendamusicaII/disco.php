<!doctype html>
<html lang="es">

<script type="text/javascript">
  /**
  * Funcion que muestra el div en la posicion del mouse
  */
  function showdiv(event,text)
  {
    //determina un margen de pixels del div al raton
    margin=5;
    
    //La variable IE determina si estamos utilizando IE
    var IE = document.all?true:false;
    
    var tempX = 0;
    var tempY = 0;
    
    //document.body.clientHeight = devuelve la altura del body
    if(IE)
    { //para IE
      IE6=navigator.userAgent.toLowerCase().indexOf('msie 6');
      IE7=navigator.userAgent.toLowerCase().indexOf('msie 7');
      //event.y|event.clientY = devuelve la posicion en relacion a la parte superior visible del navegador
      //event.screenY = devuelve la posicion del cursor en relaciona la parte superior de la pantalla
      //event.offsetY = devuelve la posicion del mouse en relacion a la posicion superior de la caja donde se ha pulsado
      
      if(IE6>0 || IE7>0)
      {
        tempX = event.x
        tempY = event.y
        if(window.pageYOffset){
          tempY=(tempY+window.pageYOffset);
          tempX=(tempX+window.pageXOffset);
        }else{
          tempY=(tempY+Math.max(document.body.scrollTop,document.documentElement.scrollTop));
          tempX=(tempX+Math.max(document.body.scrollLeft,document.documentElement.scrollLeft));
        }
      }else{
        //IE8
        tempX = event.x
        tempY = event.y
      }
    }else{ //para netscape
      //window.pageYOffset = devuelve el tamaño en pixels de la parte superior no visible (scroll) de la pagina
      document.captureEvents(Event.MOUSEMOVE);
      tempX = event.pageX;
      tempY = event.pageY;
    }
    
    if (tempX < 0){tempX = 0;}
    if (tempY < 0){tempY = 0;}
    
    // Modificamos el contenido de la capa
    document.getElementById('flotante').innerHTML=text;
    
    // Posicionamos la capa flotante
    document.getElementById('flotante').style.top = (tempY+margin)+"px";
    document.getElementById('flotante').style.left = (tempX+margin)+"px";
    document.getElementById('flotante').style.display='block';
    return;
  }
  
  /**
  * Funcion para esconder el div
  */
  function hiddenDiv()
  {
    document.getElementById('flotante').style.display='none';
  }
  </script>

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

        error_reporting(0);
//Esta parte inserta el comentario
        if(isset($_POST['comentario'])){
          $usuario = $_SESSION['ultimasesion'];
          $conexion = crearConexion();
	//Primero consigo el id del comprador
          $sql = 'SELECT idUsuario FROM Usuarios WHERE nombreUsuario = "'.$usuario.'"';
          $sentencia = $conexion->prepare($sql);
          $sentencia->execute();
          $idUsuario = $sentencia->fetch();
	//Ahora inserto el comentario con la fecha actual y la hora actual
          $sql2 = 'INSERT INTO Comentarios (`idComentario`, `idDisco`, `idUsuario`, `comentario`, `fecha`, `hora`) VALUES (NULL, '.$_GET["idDisco"].', '.$idUsuario['idUsuario'].', "'.$_POST["comentario"].'", CURRENT_DATE, CURRENT_TIME);';
  //echo json_encode($idUsuario);
  //echo $sql2;
          $sentencia = $conexion->prepare($sql2);
          if($sentencia->execute())
            echo '<script>alert("Comentario insertado");</script>';
          cierraConexion($conexion);
        }
        /*Cuerpo de la pagina, tengo q separarlo mas*/ 
        $disco = new Disco(null);

        $disco = $disco->obtenerDisco($_GET["idDisco"]);

        ?>

        <section id = "izquierdaSeccion"><br></section>

        <section id = "centroSeccion">

         <br> <br> 

         <?php
         echo  '<h1><img src="images/'.$disco->devuelveFormato($disco->datos["tipo"]).'.jpg" width="60px" height = "60px"> Sección '  .$disco->devuelveTipo($disco->datos["tipo"]).'.</h1>';

         ?>

       </section>

       <section id = "derechaSeccion"><br></section> 

       <section id = "menucentral">

        <section id = "margencentral"><br></section>

        <section id = "parteizq"> 

          <article id="disco">

            <!-- En este div se mostrar la capa emergente -->
            <div id="flotante"></div>



            <?php
            $conexion = crearConexion();
            $sql = 'SELECT nombre FROM Canciones WHERE Canciones.idDisco = '.$disco->datos["idDisco"].' ORDER BY idCanciones ASC';
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();
            $canciones = "Canciones: <ul>";
            foreach ($sentencia->fetchAll() as $fila){                   
              $canciones .= '<li>'.$fila[0].' </li>';
            }
            $canciones .="</ul>";
            cierraConexion($conexion);

            echo'<section class ="'.$disco->devuelveFormato($disco->datos["tipo"]).'">'; ?>
            <div onmouseover="showdiv(event,'<?=$canciones?>');" onMouseOut="hiddenDiv()" style='display:table;'>
              <h1> <?= $disco->datos["titulo"] ?></h1>
            </div>
            <?php echo'</section>';

            echo'<h2>'.$disco->datos["artista"].'</h2>';
            
            ?>

            <article id="discoizquierda">

              <div>
               <?php
               echo'<img src="'.$disco->datos["imagen_url"].'" width="100%" height = "100%">';
               ?>
             </div>

             <?php
             echo'<h3>Género: ' .$disco->devuelveTipo($disco->datos["tipo"]).'.</h3>';
             echo'<h3>Precio: '.$disco->datos["precio"].'€.</h3>';
             ?>
             <h3>Producido: Sony Music.</h3>

           </article>

           <article id="discoderecha">
            <table class="tabladisco" width="auto">
              <tr>
                <?php
                $conexion = crearConexion();
                $sql = 'SELECT nombre FROM Canciones WHERE Canciones.idDisco = '.$disco->datos["idDisco"].' ORDER BY idCanciones ASC';
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                foreach ($sentencia->fetchAll() as $fila){  ?>                 
                
                
                <td width="5%"><input type="radio" name="radio" id="radio" value="radio">
                  <label for="radio"></label></td>
                  <td width="25%"><?= $fila[0] ?></td>
                  <td width="70%"><audio id="controlSize" controls >
                    <source src= "musica/Pastillas_para_dormir.mp3">
                    </audio></td>
                  </tr>
                  <?php
                }
                cierraConexion($conexion);
                ?>
              </table>
            </article>

            <article id="abajo">

             <?php
             echo'<section class ="'.$disco->devuelveFormato($disco->datos["tipo"]).'">';
             ?>
             <table width="100%" border="0">
              <tr>
                <td>
                  <div>
                    <h3>Valoración</h3>
                  </div>
                  <div class = "valoracion">
                    <ul class="ul-ranking">
                      <li class="current-rating" style="width:75px;">Currently 5/5 Stars.</li>
                    </ul>
                  </div>
                </td>
                <?php
                echo'<td><article class="comentarios"> <p>'.$disco->contadorComentarios($disco->datos["idDisco"]).'</p> </alticle></td>';
                ?>
                <td><button class="submit" type="submit">Comprar</button></td>
                <td><button id = "playpausebtn"> </button> <button id = "mutebtn"> </button></td>
              </tr>
            </table>
          </section>
        </article>

      </article>

      <script>
      var audio, playbtn, mutebtn;
      function initAudioPlayer(){
       audio = new Audio();
       audio.src = "musica/Pastillas_para_dormir.mp3";
       playbtn = document.getElementById("playpausebtn");
       mutebtn = document.getElementById("mutebtn");
       playbtn.addEventListener("click", playPause);
       mutebtn.addEventListener("click", mute);

       function playPause(){
        if(audio.paused){
         audio.play();
         playbtn.style.background = "url(images/pause.png) no-repeat";
       }else{
         audio.pause();
         playbtn.style.background = "url(images/play.png) no-repeat";
       }
     }

     function mute(){
      if(audio.muted){
       audio.muted = false;
       mutebtn.style.background = "url(images/on.png) no-repeat";
     }else{
       audio.muted = true;
       mutebtn.style.background = "url(images/mute.png) no-repeat";
     }
   }
 }
 window.addEventListener("load", initAudioPlayer);

 </script>
 
 <?php
                //Muestra las opiniones	  
 $conexion = crearConexion();
 $sql = 'SELECT Usuarios.nombreUsuario, comentario, fecha, hora FROM  Usuarios, Comentarios WHERE Comentarios.idUsuario=Usuarios.idUsuario AND idDisco='.$_GET["idDisco"].' ORDER BY idComentario DESC';
 $sentencia = $conexion->prepare($sql);
 $sentencia->execute();
 echo'		<h1>Opiniones:</h1>
 <div id="opiniones"> 
 <ul>';
 foreach ($sentencia->fetchAll() as $fila){
   echo '<li>Usuario: '.$fila[0].' Dia: '.$fila[2].' Hora '.$fila[3].':</li>';
   echo '<li>Comentario: '.$fila[1].'</li>';
 }
 cierraConexion($conexion);
 echo' </ul>
 </div>'
 
 ;
 
					//Si esta logeado escribe su opinion
 if(isset($_SESSION["ultimasesion"])){
  echo '<h1>Escribe un comentario</h1>
  <p>Limitado a 140 caracteres, no podra escribir mas</p>';
							//Script para limitar los caracteres
  echo'<form action="disco.php?idDisco='.$_GET["idDisco"].'" method="post" onsubmit="return validarComentario(this)";>
  <textarea name="comentario" id="comentario" cols="47" rows="3" onKeyUp="limita(this,139);" onKeyDown="limita(this,139);" ></textarea></br>
  <input type="submit" id="login" value="Enviar" />
  </form>
  ';
}else{
  echo '<p>Para escribir comentarios debes de tener una cuenta</p>';
}

?>

<br>

</section> <!--parte izquierda-->


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