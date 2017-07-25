<!doctype html>
<html lang="es">
<body>
  <?php 
  session_start();
  if(empty($_SESSION['ultimasesion']))
    header("location: index.php");
  error_reporting(0);
  require_once("Classes/creador.php");
  $principio = new creador();
  $principio->set_titulo('Tienda de Música -- ZonaAdmin');
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
    <section id = "formulario">
      <?php

      require_once("cabecera.php");


      $usuario = new Usuarios(null);
      
      if($_GET["borrar"]!="")
      {
        $usuario->borrarUsuario($_GET["borrar"]);
        header("location: usuarioBorrado.php");
        session_destroy();
      }
      if(isset($_POST["vamoseditar"])){
        $usuario->editarUsuario($_POST["vamoseditar"], $_POST["usuario"], MD5($_POST["contrasena"]), $_POST["mail"], $_POST["nombre"], $_POST["apellidos"], $_POST["tlf"]);
        echo '<h1><br><br><span style="color: red;">Usuario '.$_POST["vamoseditar"].' editado correctamente</span> </h1>';
      }

      if($_GET["editar"]!="")
      {
        echo '<script type="text/javascript" src="scripts.js"></script>';
        $idedicion = $_GET["editar"];
        $usuario = $usuario->obtenerUsuario($idedicion);
        echo '<br><br><p>Editando el Usuario</p>';
        echo '<form id="form1" name="form1" method="post" action="zonaUsuario.php" onsubmit="return validacionUsuario();">
        <table border="1">
        <tr><td><label>Contraseña (50 caracteres maximos):</label></td><td><textarea style="height: 50px;" cols="50" name="contrasena" id="contrasena" onKeyUp="limita(this,49);" onKeyDown="limita(this,49);"></textarea></td></tr>
        <tr><td><label>Nombre (50 caracteres maximos):</label></td><td><textarea style="height: 50px;" cols="50" name="nombre" id="nombre" onKeyUp="limita(this,49);" onKeyDown="limita(this,49);">'.$usuario->datos["nombre"].'</textarea></td></tr>
        <tr><td><label>Apellidos (50 caracteres maximos):</label></td><td><textarea style="height: 50px;" cols="50" name="apellidos" id="apellidos" onKeyUp="limita(this,49);" onKeyDown="limita(this,49);">'.$usuario->datos["apellidos"].'</textarea></td></tr>
        <tr><td><label>Email (50 caracteres maximos):</label></td><td><textarea style="height: 50px;" cols="50" name="mail" id="mail" onKeyUp="limita(this,49);" onKeyDown="limita(this,49);">'.$usuario->datos["email"].'</textarea></td></tr>
        <tr><td><label>Telefono (50 caracteres maximos):</label></td><td><textarea style="height: 50px;" cols="50" name="tlf" id="tlf" onKeyUp="limita(this,49);" onKeyDown="limita(this,49);">'.$usuario->datos["telefono"].'</textarea></td></tr>
        <input name="vamoseditar" id="vamoseditar" type="hidden" value="'.$usuario->datos["idUsuario"].'" />
        <tr><td><input name="" type="submit" value = "Enviar usuario" /></td></tr>
        </table>
        </form>';
      }
      
      echo'<br> <br><h1>Tabla de Usuarios</h1>';
      $usuario->crearTablaUsuarios($_SESSION['ultimasesion']);
      


      ?>
    </section>
    <br> <br>
    <?php
//El creador crea la cabecera HTML con todos los includes, lo he creado asi para facilitar las distintas página
    require_once("piepagina.php");
    ?> 
