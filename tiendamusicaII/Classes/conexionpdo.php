<?php
   //Función que nos retornara una conexión con PDO
function crearConexion(){
        //Datos para la conexión con el servidor
	$servidor   = "localhost";
	$nombreBD   = "db53598079";
	$usuario    = "x53598079";
	$contrasena = "x53598079";
        //Creando la conexión, nuevo objeto PDO
	try {
		$dbh = new PDO('mysql:host='.$servidor.';dbname='.$nombreBD.'', $usuario, $contrasena);
		$dbh->exec("SET CHARACTER SET utf8");
		return $dbh;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
}
function cierraConexion($dbh){
	$dbh = null;
}
?>
