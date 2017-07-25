<?php


class Disco
{
	public $datos = array("idDisco" => "","titulo" => "", "precio" => "", "fecha" => "", "tipo" => "","pos" => "","imagen_url" => "", "artista" => "");
	public function __construct( $datos ) {
		if($datos!=null){
			foreach ( $datos as $clave => $valor )
				if ( array_key_exists( $clave, $this->datos)) $this->datos[$clave] = $valor;}
		}
		function obtenerDisco($id_Disco){
			$conexion = crearConexion();
			$sql = "SELECT * FROM `Disco` WHERE `idDisco`=".$id_Disco."";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
			//Como solo hay un resultado 
				$fila = $consulta->fetch();
				cierraConexion($conexion);
				if($fila) return new Disco($fila);
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de obtencion de disco fallido: " . $e>getMessage() );
			}	
		}
		
		function discosPosicion($numeroPosicion){
			$conexion = crearConexion();
			$sql = "SELECT * FROM `Disco` WHERE pos = ".$numeroPosicion." ORDER BY idDisco DESC LIMIT 5";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
				$discos = array();
			//Como solo hay un resultado 
				foreach ($consulta->fetchAll() as $fila){
					$discos[] = new Disco($fila);	
				}
				cierraConexion($conexion);
				return $discos;	
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de discos posicion fallida: " . $e>
					getMessage() );
			}	
		}
		function discosTipo($numeroTipo){
			$conexion = crearConexion();
			$sql = "SELECT * FROM `Disco` WHERE tipo = ".$numeroTipo." ORDER BY idDisco DESC";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
				$discos = array();
			//Como solo hay un resultado 
				foreach ($consulta->fetchAll() as $fila){
					$discos[] = new Disco($fila);	
				}
				cierraConexion($conexion);
				return $discos;	
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de discos tipo fallida: " . $e>
					getMessage() );
			}	
		}

		function devuelveFormato($numeroFormato){
			if($numeroFormato==1) return "pop";
			if($numeroFormato==2) return "rock";
			if($numeroFormato==3) return "clasica";
			if($numeroFormato==4) return "metal";
		}

		function devuelveTipo($numeroFormato){
			if($numeroFormato==1) return "Pop";
			if($numeroFormato==2) return "Rock";
			if($numeroFormato==3) return "Clasica";
			if($numeroFormato==4) return "Metal";
		}

		function contadorComentarios($id_disco){
			$conexion = crearConexion();
			$sql = "SELECT COUNT( * ) FROM  `Comentarios` WHERE  `idDisco` =".$id_disco."";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
			//Como solo hay un resultado 
				$numeroComentarios = $consulta->fetch();
				cierraConexion($conexion);
				return $numeroComentarios[0];
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de comentarios fallida: " . $e>
					getMessage() );
			}	
		}

		function idMasAlto(){
			$conexion = crearConexion();
			$sql = "SELECT MAX(idDisco) AS id FROM Disco";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
			//Como solo hay un resultado 
				$id = $consulta->fetch();
				cierraConexion($conexion);
				return $id[0];
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de canciones fallida: " . $e>
					getMessage() );
			}	
		}

		function contadorCanciones($id_disco){
			$conexion = crearConexion();
			$sql = "SELECT COUNT( * ) FROM  `Canciones` WHERE  `idDisco` =".$id_disco."";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
			//Como solo hay un resultado 
				$numeroCanciones = $consulta->fetch();
				cierraConexion($conexion);
				return $numeroCanciones[0];
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de canciones fallida: " . $e>
					getMessage() );
			}	
		}

		function crearTablaDiscos(){
			$disco = new Disco(null);
			$conexion = crearConexion();
			$sql = "SELECT idDisco FROM  `Disco` ";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
				echo '<table border="1">';
				echo'<tr><th>ID DISCO</th><th>TITULO</th><th>PRECIO</th><th>SECCION</th><th>COLUMNA EN SECCION</th><th>ARTISTA</th><th>CANCIONES</th><th>EDITAR</th><th>BORRAR</th></tr>';
				$id_discos = $consulta->fetchAll();
				foreach($id_discos as $idDisco){
					$disco = $disco->obtenerDisco($idDisco[0]);
					if($disco->datos["pos"]==1) $columna = "Izquierda";
					if($disco->datos["pos"]==2) $columna = "Derecha";
					echo'<tr><td>'.$disco->datos["idDisco"].'</td><td>'.$disco->datos["titulo"].'</td><td>'.$disco->datos["precio"].'</td><td>'.$disco->devuelveTipo($disco->datos["tipo"]).'</td><td>
					'.$columna.'
					</td><td>'.$disco->datos["artista"].'</td><td>'.$disco->contadorCanciones($disco->datos["idDisco"]).'</td><td>
					<a href="zonaAdmin.php?editar='.$disco->datos["idDisco"].'"><img src="images/editar.png"/></a>
					</td><td>
					<a href="zonaAdmin.php?borrar='.$disco->datos["idDisco"].'"><img src="images/borrar.png"/></a>
					</td></tr>';
				}
				echo '</table>';
				$numeroComentarios = $consulta->fetch();
				cierraConexion($conexion);
				return $numeroComentarios[0];
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de comentarios fallida: " . $e>
					getMessage() );
			}	
		}

		function borrarDisco($id_disco){
			$conexion = crearConexion();
			$sql = "DELETE FROM Disco WHERE `idDisco`=".$id_disco." LIMIT 1";
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

		function insertarDisco($titulo, $precio, $tipo, $pos, $imagen, $artista){
			$conexion = crearConexion();
			$sql = "INSERT INTO `Disco` (`idDisco`, `titulo`, `precio`, `fecha`, `tipo`, `pos`, `imagen_url`, `artista`) VALUES (NULL, '".$titulo."', '".$precio."', CURRENT_DATE(), '".$tipo."', '".$pos."', '".$imagen."', '".$artista."');";
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

		function editarDisco($id_disco, $titulo, $precio, $tipo, $pos, $imagen, $artista){
			
			$conexion = crearConexion();
			$sql = "UPDATE  `Disco` SET  `titulo` =  '".$titulo."', `precio` =  '".$precio."',`fecha` = CURRENT_DATE( ) ,`tipo` =  '".$tipo."',`pos` =  '".$pos."',`imagen_url` =  '".$imagen."', `artista` = '".$artista."' WHERE  `idDisco` =".$id_disco.";	";
			try{
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
			//Como solo hay un resultado 
				cierraConexion($conexion);
			}catch ( PDOException $e ) {
				cierraConexion($conexion);
				die( "Consulta de obtencion de disco fallida: " . $e>
					getMessage() );
			}	
		}
	}


	?>
