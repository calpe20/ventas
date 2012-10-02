<?
	/*	Clase para el mantenimiento de vehiculos			*/
	class Choferes{
		function addVehiculos($campos){
			return mysql_query("INSERT INTO vehiculos (vehi_razon, vehi_placa, vehi_marca, vehi_alias, vehi_direc, vehi_tele, vehi_ruc, vehi_mtc, vehi_activo) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."','".$campos[6]."','".$campos[7]."','".$campos[8]."')");			
		}
		function updVehiculos($campos){
			return mysql_query("UPDATE vehiculos SET vehi_razon = '".$campos[0]."', vehi_placa = '".$campos[1]."', vehi_marca = '".$campos[2]."', vehi_alias = '".$campos[3]."', vehi_direc = '".$campos[4]."', vehi_tele = '".$campos[5]."', vehi_ruc = '".$campos[6]."', vehi_mtc = '".$campos[7]."', vehi_activo = '".$campos[8]."' WHERE vehi_codigo = ".$id);
		}
		function delChoferes($codigo){
			return mysql_query("DELETE FROM vehiculos WHERE vehi_codigo=".$codigo);
		}
		function viewVehiculos(){
			return mysql_query("SELECT * FROM vehiculos WHERE vehi_codigo=".$id);
		}
		function viewAllVehiculos(){
			return mysql_query("SELECT * FROM vehiculos ORDER BY vehi_codigo DESC");
		}
	}
?>