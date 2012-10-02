<?	
require('config.php');
require('funciones/functions.php');
f_header();
if(!empty($_GET['accion'])){
	$accion = $_GET['accion'];
}else{
	$accion = 'home';
}
if(!empty($_GET['sub'])){
	$sub = $_GET['sub'];
	$ruta='../'.$accion.'/';
}else{
	$sub = 'none';
	$ruta = $accion.'/';
}
if(!empty($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = 1;
}
if(is_file("view/".$accion.".phtml")){
	require_once("view/".$accion.".phtml");
}else{
	require_once("view/error.phtml");
}
if(is_file("view/".$sub.".phtml")){
	require_once("controller/".$sub."Controller.php");
}else{
	require_once("view/error.phtml");
}