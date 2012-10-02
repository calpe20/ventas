<?
	session_start('usuario');
	include('clases/conexion.class.php');
	$db = New DBManager();
	$db->conectar();
?>