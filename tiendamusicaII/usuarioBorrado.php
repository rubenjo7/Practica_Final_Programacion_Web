<!doctype html>
<html lang="es">
<body>
  <?php 
  require_once("Classes/creador.php");
  $principio = new creador();
  $principio->set_titulo('Tienda de Música -- Formulario');
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

<section id = "centroSeccion">

         <br> <br> 

<h1>El usuario ha sido borrado con éxito.</h1>


</section>
    

  <?php

//El creador crea la cabecera HTML con todos los includes, lo he creado asi para facilitar las distintas página
require_once("piepagina.php");
?> 
