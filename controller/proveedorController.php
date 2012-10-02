<?
    require_once('model/proveedor.class.php');
    $Objproveedor = new Proveedor();
	
    if($_GET['opt']=='new'){
	require_once("view/proveedornew.phtml");
    }elseif($_GET['opt']=='edit'){
        $Objproveedor->mostrarProveedor($_GET['id']);
	require_once("view/proveedoredit.phtml");
    }elseif($_GET['opt']=='save'){
        
        $nombres        = $_POST['nombres'];
        $direccion      = $_POST['direccion'];
        $dniruc         = $_POST['dniruc'];
        $ciudad         = $_POST['ciudad'];
        $telefono       = $_POST['telefono'];
		
	if($Objproveedor->agregarProveedor($nombres, $direccion, $dniruc, $ciudad, $telefono)){
	    echo '<script language="JavaScript" type="text/javascript">';
		//echo 'location.href="/transportes/maestros/choferes"';
	    echo 'setTimeout (location.href="/ventas/maestros/proveedor", 20000)';
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
        $nombres        = $_POST['nombres'];
        $direccion      = $_POST['direccion'];
        $dniruc         = $_POST['dniruc'];
        $ciudad         = $_POST['ciudad'];
        $telefono       = $_POST['telefono'];	
	if($Objproveedor->modificarProveedor($codigo, $estado, $nombres, $direccion, $dniruc, $ciudad, $telefono)){
	    echo '<script language="JavaScript" type="text/javascript">';
	    //echo 'location.href="/transportes/maestros/choferes"';
	    echo 'setTimeout (location.href="/ventas/maestros/proveedor", 20000)';
	    echo '</script>';
	}else{
	    echo 'No se pudo Guardar';
	}
    }elseif($_GET['opt']=='delete'){
	if($Objproveedor->eliminarProveedor($_GET['id'])){
	    echo '<script language="JavaScript" type="text/javascript">';
	    echo 'location.href="/ventas/maestros/proveedor"';
	    echo '</script>';
	}else{
	    echo 'No se pudo Borrar';
	}
    }else{
	require_once("view/proveedor.phtml");	
    }
?>