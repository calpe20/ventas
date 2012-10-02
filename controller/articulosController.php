<?
	require_once('model/articulos.class.php');
	$Objarticulo = new Articulos();
	
	if($_GET['opt']=='new'){
		
		require_once("view/articulosnew.phtml");
		
	}elseif($_GET['opt']=='edit'){
		
		require_once("view/articulosedit.phtml");
		
	}elseif($_GET['opt']=='save'){
	
		$articulo 	= $_POST['articulo'];
		$marca		= $_POST['marca'];
		$modelo		= $_POST['modelo'];
		$id_provee	= $_POST['id_provee'];
		$precio		= $_POST['precio'];
		$observa	= $_POST['observa'];
        
		
		if($Objarticulo->agregarArt($articulo, $marca, $modelo, $id_provee, $precio, $observa)){
			echo '<script language="JavaScript" type="text/javascript">';
			//echo 'location.href="/transportes/maestros/choferes"';
			echo 'setTimeout (location.href="/ventas/maestros/articulos", 20000)';
			echo '</script>';
		}else{
			echo 'No se pudo Guardar';
			/*echo '<script language="JavaScript" type="text/javascript">';
			//echo 'location.href="/transportes/maestros/choferes"';
			echo 'setTimeout (location.href="/ventas/maestros/articulos", 50)';
			echo '</script>';*/
		}
		
	}elseif($_GET['opt']=='update'){
		
		$codigo		= $_POST['codigo'];
        $estado		= $_POST['estado'];
		$articulo 	= $_POST['articulo'];
		$marca		= $_POST['marca'];
		$modelo		= $_POST['modelo'];
		$id_provee	= $_POST['id_provee'];
		$precio		= $_POST['precio'];
		$observa	= $_POST['observa'];
		
		if($Objarticulo->modificarArt($codigo, $estado, $articulo, $marca, $modelo, $id_provee, $precio, $observa)){
			echo '<script language="JavaScript" type="text/javascript">';
			//echo 'location.href="/transportes/maestros/choferes"';
			echo 'setTimeout (location.href="/ventas/maestros/articulos", 20000)';
			echo '</script>';
		}else{
			echo 'No se pudo Guardar';
		}
		
	}elseif($_GET['opt']=='delete'){
		if($Objarticulo->deleteArt($_GET['id'])){
			echo '<script language="JavaScript" type="text/javascript">';
			echo 'location.href="/ventas/maestros/articulos"';
			echo '</script>';
		}else{
			echo 'No se pudo Borrar';
		}
		//require_once("view/vehiculosedit.phtml");
	}else{
		require_once("view/articulos.phtml");	
	}
?>