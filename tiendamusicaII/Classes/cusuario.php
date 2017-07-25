<?php


class Usuarios
{
	public $datos = array("idUsuario" => "","nombreUsuario" => "", "contrasena" => "", "email" => "", "nombre" => "","apellidos" => "","telefono" => "", "tipo" => "");
	public function __construct( $datos ) {
		if($datos!=null){
			foreach ( $datos as $clave => $valor )
				if ( array_key_exists( $clave, $this->datos)) $this->datos[$clave] = $valor;
		}
	}
	function obtenerUsuario($idUsuario){
		$conexion = crearConexion();
		$sql = "SELECT * FROM `Usuarios` WHERE `idUsuario`=".$idUsuario."";
		try{
			$consulta = $conexion->prepare($sql);
			$consulta->execute();
			//Como solo hay un resultado 
			$fila = $consulta->fetch();
			cierraConexion($conexion);
			if($fila) return new Usuarios($fila);
		}catch ( PDOException $e ) {
			cierraConexion($conexion);
			die( "Consulta de obtencion de usuario fallida: " . $e>getMessage() );
		}	
	}

	function borrarUsuario($idUsuario){
		$conexion = crearConexion();
		$sql = "DELETE FROM Usuarios WHERE `idUsuario`=".$idUsuario." LIMIT 1";
		try{
			$consulta = $conexion->prepare($sql);
			$consulta->execute();
			//Como solo hay un resultado 
			cierraConexion($conexion);
		}catch ( PDOException $e ) {
			cierraConexion($conexion);
			die( "Error en el borrado: " . $e>
				getMessage() );
		}	
	}


	function editarUsuario($idUsuario, $nombreUsuario, $contrasena, $email, $nombre, $apellidos, $telefono){

		$conexion = crearConexion();
		$sql = "UPDATE  `Usuarios` SET  `contrasena` =  '".$contrasena."',`email` = '".$email."',`nombre` =  '".$nombre."',`apellidos` =  '".$apellidos."', `telefono` = '".$telefono."' WHERE  `Usuarios`.`idUsuario` =".$idUsuario.";	";
		try{
			$consulta = $conexion->prepare($sql);
			$consulta->execute();
			//Como solo hay un resultado 
			cierraConexion($conexion);
		}catch ( PDOException $e ) {
			cierraConexion($conexion);
			die( "Consulta de obtencion de usuarios fallida: " . $e>
				getMessage() );
		}	
	}

	function crearTablaUsuarios($nombreUsuario){
		$usuario = new Usuarios(null);
		$conexion = crearConexion();
		$sql = "SELECT idUsuario FROM  `Usuarios` WHERE nombreUsuario='$nombreUsuario'";
		try{
			$consulta = $conexion->prepare($sql);
			$consulta->execute();
			echo '<table border="1">';
			echo'<tr><th>NOMBRE DE USUARIO</th><th>EMAIL</th><th>NOMBRE</th><th>APELLIDOS</th><th>TELEFONO</th><th>EDITAR</th><th>BORRAR</th></tr>';
			$id_usuarios = $consulta->fetchAll();
			foreach($id_usuarios as $idUsuario){
				$usuario = $usuario->obtenerUsuario($idUsuario[0]);
				echo'<tr><td>'.$usuario->datos["nombreUsuario"].'</td><td>'.$usuario->datos["email"].'</td><td>'.$usuario->datos["nombre"].'
				</td><td>'.$usuario->datos["apellidos"].'</td><td>'.$usuario->datos["telefono"].'</td><td>
				<a href="zonaUsuario.php?editar='.$usuario->datos["idUsuario"].'"><img src="images/editar.png"/></a>
				</td><td>
				<a href="zonaUsuario.php?borrar='.$usuario->datos["idUsuario"].'"><img src="images/borrar.png"/></a>
				</td></tr>';
			}
			echo '</table>';
		}catch ( PDOException $e ) {
			cierraConexion($conexion);
		}	
	}


}
?>
