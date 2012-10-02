<?
	require_once('model/vehiculos.class.php');
	if($_GET['opt']=='new'){
		require_once("view/vehiculosnew.phtml");
	}elseif($_GET['opt']=='edit'){
		require_once("view/vehiculosedit.phtml");
	}elseif($_GET['opt']=='save'){
		echo $_POST['alias'];
		//require_once("view/vehiculosedit.phtml");
	}elseif($_GET['opt']=='update'){
		//require_once("view/vehiculosedit.phtml");
	}elseif($_GET['opt']=='delete'){
		//require_once("view/vehiculosedit.phtml");
	}else{
		require_once("view/vehiculos.phtml");	
	}
?>