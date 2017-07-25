<?php


class Canciones
{
	public $datos = array("idCanciones" => "","nombre" => "", "idDisco" => "");
	public function __construct( $datos ) {
		if($datos!=null){
			foreach ( $datos as $clave => $valor )
				if ( array_key_exists( $clave, $this->datos)) $this->datos[$clave] = $valor;}
		}
		function obtenerCancion($id_cancion){
			$conexion = crearConexion();
			$sql = "SELECT * FROM `Canciones` WHERE `idCanciones`=".$id_cancion."";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
			//Como solo hay un resultado 
				$fila = $consulta->fetch();
				cierraConexion($conexion);
				if($fila) return new Canciones($fila);
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de obtencion de Canciones fallida: " . $e>getMessage() );
			}	
		}


		function listaCanciones($idDisco){
			$conexion = crearConexion();
			$sql = "SELECT `nombre` FROM  `Canciones` WHERE  `idDisco` = $idDisco";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
			//Como solo hay un resultado 
				$canciones = $consulta->fetch();
				cierraConexion($conexion);
				return $canciones;
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de canciones fallida: " . $e>
					getMessage() );
			}	
		}

		function insertarCancion($nombre, $idDisco){
			$conexion = crearConexion();
			$sql = "INSERT INTO `Canciones` (`idCanciones`, `nombre`, `idDisco`) VALUES (NULL, '".$nombre."', '".$idDisco."');";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
			//Como solo hay un resultado 
				cierraConexion($conexion);
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Error en el insertado " . $e>
					getMessage() );
			}	
		}

		function editarCancion($idCancion, $nombre, $idDisco){
			
			$conexion = crearConexion();
			$sql = "UPDATE  `Canciones` SET  `nombre` =  '".$nombre."' WHERE  `idCanciones` =".$idCancion.";	";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
			//Como solo hay un resultado 
				cierraConexion($conexion);
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de obtencion de canciones fallida: " . $e>
					getMessage() );
			}	
		}
	}


	?>
