<?php
class Creador{
	private $titulopagina;
	/*Contructor por defecto*/
	function __construct(){
		$this->titulopagina = 'Tienda Música';	
	}
	/*Destructor*/
	function __destruct() {
	}
	/*Set del titulo*/
	function set_titulo($titulo){
		$this->titulopagina = $titulo;	
	}
	/*Funcion creadora*/
	function crear(){
		session_start();
		echo'<!DOCTYPE html>
		<html lang="es">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>'.$this->titulopagina.'</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
		<script src="js/login.js"></script>
		<script type="text/javascript" src="scripts.js"></script>
		</head>'; 
		require_once("conexionpdo.php"); 
		require_once("cdisco.php"); 
		require_once("cusuario.php"); 
		require_once("ccanciones.php"); 
	}
}
?>
