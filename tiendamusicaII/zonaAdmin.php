<!doctype html>
<html lang="es">
<body>
  <?php 
  session_start();
  error_reporting(0);
  require_once("Classes/creador.php");
  $principio = new creador();
  $principio->set_titulo('Tienda de Música -- ZonaAdmin');
  echo '<link rel="shortcut icon" href="images/icono_pagina.jpg" type="images/jpg"/>';
  $principio->crear();

  if(empty($_SESSION['ultimasesion']) || $_SESSION['admin']==2)
    header("location: index.php");

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
    <section id = "formulario">
      <?php

      require_once("cabecera.php");


      $disco = new Disco(null);
      $cancion = new Canciones(null);
      
      if($_GET["borrar"]!="")
      {
        $disco->borrarDisco($_GET["borrar"]);
        echo '<h1><br><br><span style="color: red;">Disco '.$_GET["borrar"].' borrado</span> </h1>';
      }
      if(isset($_POST["vamosinsertar"])){
        $disco->insertarDisco($_POST["insertatitulo"], $_POST["insertaprecio"], $_POST["tipo"], $_POST["pos"], $_POST["imagen"], $_POST["insertaArtista"]);
        $id = $disco->idMasAlto();
        if($_POST['cancion1']!=null){
          $cancion->insertarCancion($_POST["cancion1"], $id);
        }
        if($_POST['cancion2']!=null){
          $cancion->insertarCancion($_POST["cancion2"], $id);
        }
        if($_POST['cancion3']!=null){
          $cancion->insertarCancion($_POST["cancion3"], $id);
        }
        if($_POST['cancion4']!=null){
          $cancion->insertarCancion($_POST["cancion4"], $id);
        }
        if($_POST['cancion5']!=null){
          $cancion->insertarCancion($_POST["cancion5"], $id);
        }
        if($_POST['cancion6']!=null){
          $cancion->insertarCancion($_POST["cancion6"], $id);
        }
        if($_POST['cancion7']!=null){
          $cancion->insertarCancion($_POST["cancion7"], $id);
        }
        if($_POST['cancion8']!=null){
          $cancion->insertarCancion($_POST["cancion8"], $id);
        }
        if($_POST['cancion9']!=null){
          $cancion->insertarCancion($_POST["cancion9"], $id);
        }
        if($_POST['cancion10']!=null){
          $cancion->insertarCancion($_POST["cancion10"], $id);
        }
        echo '<h1><br><br><br><br><span style="color: red;">Disco insertado correctamente</span> </h1>';
      }
      if(isset($_POST["vamoseditar"])){
        $disco->editarDisco($_POST["vamoseditar"], $_POST["insertatitulo"], $_POST["insertaprecio"], $_POST["tipo"], $_POST["pos"], $_POST["imagen"], $_POST["insertaArtista"]);
        echo '<h1><br><br><span style="color: red;">Disco '.$_POST["vamoseditar"].' editado correctamente</span> </h1>';
      }
      if($_GET["nueva"]=="1")
        { echo '<br> <br> <br>';
      echo '<form id="form1" name="form1" method="post" action="zonaAdmin.php" onsubmit="return validacionDiscos();">
      <table border="1">
      <tr><td><label>Titulo (120 caracteres maximos):</label></td><td><textarea style="height: 100px;" cols="50" name="insertatitulo" id="insertatitulo" onKeyUp="limita(this,119);" onKeyDown="limita(this,119);"></textarea></td></tr>
      <tr><td><label>Precio (50 caracteres maximos):</label></td><td><textarea style="height: 80px;" cols="50" name="insertaprecio" id="insertaprecio" onKeyUp="limita(this,49);" onKeyDown="limita(this,49);"></textarea></td></tr>
      <tr><td><label>Artista (50 caracteres maximos):</label></td><td><textarea style="height: 80px;" cols="50" name="insertaArtista" id="insertaArtista" onKeyUp="limita(this,49);" onKeyDown="limita(this,49);"></textarea></td></tr>
      <tr><td><label>Seccion de entrada:</label></td><td><select id= "tipo" name="tipo">
      <option value="1">Pop</option>
      <option value="2">Rock</option>
      <option value="3">Clasica</option>
      <option value="4">Metal</option>
      </select></td></tr>
      <tr><td><label>Columna en principal:</label></td><td><select id= "pos" name="pos">
      <option value="1">Izquierda</option>
      <option value="2">Derecha</option>
      </select></td></tr>
      <tr><td><label>URL completa imagen (100 caracteres maximos):</label></td><td><input name="imagen" id="imagen" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/></td></tr>
      <tr><td><label>Canciones (100 caracteres maximos):</label></td><td><input name="cancion1" id="cancion1" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      <input name="cancion2" id="cancion2" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      <input name="cancion3" id="cancion3" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      <input name="cancion4" id="cancion4" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      <input name="cancion5" id="cancion5" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      <input name="cancion6" id="cancion6" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      <input name="cancion7" id="cancion7" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      <input name="cancion8" id="cancion8" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      <input name="cancion9" id="cancion9" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      <input name="cancion10" id="cancion10" type="text" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/><br>
      </td> </tr>
      <input name="vamosinsertar" id="vamosinsertar" type="hidden" value="asd" />
      <tr><td><input name="" type="submit" value = "Enviar disco" /></td></tr>
      </table>
      </form>';
    }
    if($_GET["editar"]!="")
    {
      $idedicion = $_GET["editar"];
      $disco = $disco->obtenerDisco($idedicion);
      echo '<br><br><p>Editando el Disco</p>';
      echo '<form id="form2" name="form2" method="post" action="zonaAdmin.php" onsubmit="return validacionDiscosEditados();">
      <table border="1">
      <tr><td><label>Titulo (120 caracteres maximos):</label></td><td><textarea style="height: 100px;" cols="50" name="insertatitulo" id="insertatitulo" onKeyUp="limita(this,119);" onKeyDown="limita(this,119);">'.$disco->datos["titulo"].'</textarea></td></tr>
      <tr><td><label>Precio (50 caracteres maximos):</label></td><td><textarea style="height: 50px;" cols="50" name="insertaprecio" id="insertaprecio" onKeyUp="limita(this,49);" onKeyDown="limita(this,49);">'.$disco->datos["precio"].'</textarea></td></tr>
      <tr><td><label>Artista (50 caracteres maximos):</label></td><td><textarea style="height: 50px;" cols="50" name="insertaArtista" id="insertaArtista" onKeyUp="limita(this,49);" onKeyDown="limita(this,49);">'.$disco->datos["artista"].'</textarea></td></tr>
      <tr><td><label>Seccion de entrada:</label></td><td><select id= "tipo" name="tipo">
      <option value="1">Pop</option>
      <option value="2">Rock</option>
      <option value="3">Clasica</option>
      <option value="4">Metal</option>
      </select></td></tr>
      <tr><td><label>Columna en principal:</label></td><td><select id= "pos" name="pos">
      <option value="1">Izquierda</option>
      <option value="2">Derecha</option>
      </select></td></tr>
      <tr><td><label>URL completa imagen (100 caracteres maximos):</label></td><td><input name="imagen" id="imagen" type="text" value="'.$disco->datos["imagen_url"].'" onKeyUp="limita(this,99);" onKeyDown="limita(this,99);"/></td></tr>
      <input name="vamoseditar" id="vamoseditar" type="hidden" value="'.$disco->datos["idDisco"].'" />
      <tr><td><input name="" type="submit" value = "Enviar disco" /></td></tr>
      </table>
      </form>';
    }
    

    echo'<br><br><h1>Insertar nuevo disco<h1>';
    echo'<a href="zonaAdmin.php?nueva=1"> <img src="images/new.png"/></a>';
    echo'<h1>Tabla de disco</h1>';
    $disco->crearTablaDiscos();

    
    


    ?>
  </section>
  <br> <br>
  <?php
//El creador crea la cabecera HTML con todos los includes, lo he creado asi para facilitar las distintas página
  require_once("piepagina.php");
  ?> 
