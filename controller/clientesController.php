<?
    require_once('model/clientes.class.php');
    $Objclientes = new Clientes();
	
    if($_GET['opt']=='new'){
	require_once("view/clientesnew.phtml");
    }elseif($_GET['opt']=='edit'){
	require_once("view/clientesedit.phtml");
    }elseif($_GET['opt']=='save'){
        
        $nombres        = $_POST['nombres'];
        $tipocliente    = $_POST['tipocliente'];   //0 = JURIDICA; 1 = NATURAL
        $direccion      = $_POST['direccion'];
        $dniruc         = $_POST['dniruc'];
        $ciudad         = $_POST['ciudad'];
        $telefono       = $_POST['telefono'];
		
	if($Objclientes->agregarCliente($nombres, $tipocliente, $direccion, $dniruc, $ciudad, $telefono)){
	    echo '<script language="JavaScript" type="text/javascript">';
		//echo 'location.href="/transportes/maestros/choferes"';
	    echo 'setTimeout (location.href="/ventas/maestros/clientes", 20000)';
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
        $tipocliente    = $_POST['tipocliente'];   //0 = JURIDICA; 1 = NATURAL
        $direccion      = $_POST['direccion'];
        $dniruc         = $_POST['dniruc'];
        $ciudad         = $_POST['ciudad'];
        $telefono       = $_POST['telefono'];
		
	if($Objclientes->modificarCliente($codigo, $estado, $nombres, $tipocliente, $direccion, $dniruc, $ciudad, $telefono)){
	    echo '<script language="JavaScript" type="text/javascript">';
	    //echo 'location.href="/transportes/maestros/choferes"';
	    echo 'setTimeout (location.href="/ventas/maestros/clientes", 20000)';
	    echo '</script>';
	}else{
	    echo 'No se pudo Guardar';
	}
    }elseif($_GET['opt']=='delete'){
	if($Objclientes->eliminarCliente($_GET['id'])){
	    echo '<script language="JavaScript" type="text/javascript">';
	    echo 'location.href="/ventas/maestros/clientes"';
	    echo '</script>';
	}else{
	    echo 'No se pudo Borrar';
	}
    }else{
	require_once("view/clientes.phtml");	
    }
?>