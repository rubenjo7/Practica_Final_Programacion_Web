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


    $entra = true;
    if(!empty($_POST)){
     $conexion = crearConexion();
	//Primeor compruebo si existe o no
     $sql = 'SELECT idUsuario FROM Usuarios WHERE nombreUsuario = "'.$_POST["usuario"].'"';
     $sentencia = $conexion->prepare($sql);
     $sentencia->execute();
     $numerodeusuario = $sentencia->rowCount();
     if($numerodeusuario>=1){ 
       echo '<h1 id="nombreseccion"> Lo sentimos pero el usuario ya existe</h1> <br> <br>';
     }
     else{
       $entra=false;
       $tipo = 2;
	  //El usuario existe y todos los valores estan rellenos
       $sql = 'INSERT INTO Usuarios (`idUsuario`, `nombreUsuario`, `contrasena`, `email`, `nombre`, `apellidos`, `telefono`, `tipo`) VALUES (NULL, "'.$_POST["usuario"].'", MD5("'.$_POST["contrasena"].'"), "'.$_POST["mail"].'", "'.$_POST["nombre"].'", "'.$_POST["apellidos"].'", "'.$_POST["tlf"].'", 2 )';
       $sentencia = $conexion->prepare($sql);
       $resultado = $sentencia->execute();
       if($resultado)
        echo '<h1 id="nombreseccion">Ha sido dado de alta correctamente, ya puede entrar con su cuenta</h1>';
    }
    cierraConexion($conexion);
  }
  if($entra==true){
	//Aqui va la parte de nuevo usuario

    ?>
    <script type="text/javascript" src="scripts.js"></script>
    <br> <br>
    <div id="formularioCompleto">
      <h2> Formulario de registro para compradores: </h2>
      <form action="formulario.php" method="post" id="formulario" name="" onsubmit="return validacion();">
       <table>
         <tr>
           <td><label for="nombre">Usuario:</label></td> <td><input name="usuario" type="text" id="usuario" onKeyUp="limita(this,39);" onKeyDown="limita(this,39);"/></td><td><p> *</p></td>
         </tr>
         <tr>
           <td><label for="contrasena">Contraseña:</label></td> <td><input name="contrasena" type="password" id="contrasena" onKeyUp="limita(this,39);" onKeyDown="limita(this,39);"/></td><td><p> *</p></td>
         </tr>
         <tr>
           <td><label for="nombre">Nombre:</label></td> <td><input name="nombre" type="text" id="nombre" onKeyUp="limita(this,39);" onKeyDown="limita(this,39);"/></td><td><p> *</p></td>
         </tr>
         <tr>
           <td><label for="apellidos">Apellidos:</label></td><td> <input name="apellidos" id="apellidos" type="text" onKeyUp="limita(this,39);" onKeyDown="limita(this,39);"/></td><td><p> *</p></td>
         </tr>
         <tr>
           <td><label for="mail">E-mail:</label></td><td> <input name="mail" id="mail" type="text" onKeyUp="limita(this,39);" onKeyDown="limita(this,39);"/></td><td><p> *</p></td>
         </tr>
         <tr>
          <td><label for="tlf">Telefono:</label></td><td> <input name="tlf" id="tlf" type="text" onKeyUp="limita(this,19);" onKeyDown="limita(this,19);"/></td><td><p> *(Ejemplo 958112233)</p></td>
        </tr>
        <td>
          <!--Resetea todos los campos del formulario ademas de los errores dados mediante el onlick()-->
          <input type="reset" name="Restablecer" id="restablecer" onclick="reseteaError()" value="Restablecer" class="boton" /></td>
          <!--Boton de envio del formulario-->
          <td> <input type="submit" name="enviar" id="enviar" value="Enviar" class="boton" /></td>
        </tr>
      </table>
    </form>
    <p> *Campos obligatorios</p>
    <div id="contenedorerrores">

    </div>
    <div id="intentos">

    </div>
  </div>

  <?php
}

//El creador crea la cabecera HTML con todos los includes, lo he creado asi para facilitar las distintas página
require_once("piepagina.php");
?> 
