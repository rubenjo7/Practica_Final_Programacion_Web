<?php
/*Cabecera de la pagina*/
if(!empty($_POST['email']) || !empty($_POST['password'])){	
  $nombre = $_POST['email'];
  $contrasena =  $_POST['password'];
  $contrasena = md5($contrasena);
  $conexion = crearConexion();
  $sql = 'SELECT contrasena, tipo, nombreUsuario FROM Usuarios WHERE nombreUsuario="'.$nombre.'"';
  $sentencia = $conexion->prepare($sql);
  $sentencia->execute();

  if($sentencia->rowCount()<=0){
    echo '<script>alert("El usuario no existe");</script>';	
  }
  else{
    $resultado = $sentencia->fetch();
    if($contrasena==$resultado[0]){
     if (!isset($_SESSION["ultimasesion"])){
      $_SESSION["ultimasesion"] = $nombre;
      $_SESSION["admin"]	= $resultado[1];
    }
  }
  else{ echo '<script>alert("Contraseña invalida");</script>';}
}}
if(isset($_POST['cerrar'])){
  session_destroy();
  $_SESSION["admin"] = 0;
  $variable = 0;
  unset($_SESSION['ultimasesion']);
}?>
<header>
  <table width="95%" border="0">
    <tr>
      <td width="61%" height="124">
        <article id="nombretienda">
          <h1>
            <p><a id="rojo" href="index.php"><img src="images/icono_pagina.jpg" alt="icono" name="disTi1" width="55" height="55" id="disTi1"> Tienda de Música <img src="images/icono_pagina.jpg" alt="icono" name="disTi2" width="55" height="55" id="disTi2"></a></p>
          </h1>
        </article>
      </td>

      <?php

      if(isset($_SESSION["ultimasesion"])){

        echo '<td>Bienvenido: '.$_SESSION["ultimasesion"];

        if($_SESSION["admin"] == 1){
          echo ', eres administrador.';
          $variable = 1;
        }
        ?>
      </td><form action="index.php" method="post">
      <td><input type="submit" name="cerrar" id="cerrar" value="Cerrar sesion" class="botoni blue" /></td>
    </form>
  </td>
</tr>
</table> 
</header>
<?php     }
else{ ?>
<!-- Login Starts Here -->
<td width="39%" id="tab1">
  <div id="loginContainer">
    <a href="#" id="loginButton"><span>Login</span><em></em></a>
    <div style="clear:both"></div>
    <div id="loginBox">                
      <form action="index.php" method="post" id="loginForm">
        <fieldset id="body">
          <fieldset>
            <label for="email">Usuario</label>
            <input type="text" name="email" id="email" required />
          </fieldset>
          <fieldset>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required />
          </fieldset>
          <input type="submit" id="login" value="Entrar" />
        </fieldset>
        <span><a href="formulario.php">Crear una nueva cuenta</a></span>
      </form>
    </div>
  </div>
</td>
</tr>
</table> 
</header>
<!-- Login Ends Here -->
<?php
}//Fin del else
?>
<section id = "centroSeccion">
  <ul id="nav">
    <li><a href="index.php"><img src="images/home.png" /> </a></li>
    <li><a href="#"><span> Géneros </span></a>
      <section class="subs">
        <article class="col">
          <ul>
            <li><a href="seccion.php?tipo=1"> Pop</a></li>
            <li><a href="seccion.php?tipo=2"> Rock</a></li>
            <li><a href="seccion.php?tipo=4"> Metal</a></li>
            <li><a href="seccion.php?tipo=3"> Clásica</a></li>
          </ul>
        </article>
      </section>
    </li>
    <li><a href="index.php#derecha"> Más Vendido </span></a></li>
    <li><a href="index_comentados.php#derecha"> Más Comentado</a></li>
    <li><a href="formulario.php">Formulario</a></li>
    <?php
    if($_SESSION["admin"] == 1){
      echo '<li><a href="zonaAdmin.php">ZonaAdmin</a></li>';
      echo '<li><a href="zonaUsuario.php">ZonaUsuario</a></li>';
    }else{
      if($_SESSION["admin"] == 2){
        echo '<li><a href="zonaUsuario.php">ZonaUsuario</a></li>';
      }
    }
    ?>
  </ul>

</section>
<br>
<br>