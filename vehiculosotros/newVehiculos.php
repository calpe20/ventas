<?php
require('../funciones/functions.php');
if(isset($_POST['submit'])){
	require('../clases/vehiculos.class.php');

	$vehi_razon = htmlspecialchars(trim($_POST['vehi_razon']));
	$vehi_placa = htmlspecialchars(trim($_POST['vehi_placa']));
    $vehi_marca = htmlspecialchars(trim($_POST['vehi_marca']));
    $vehi_alias = htmlspecialchars(trim($_POST['vehi_alias']));
    $vehi_direc = htmlspecialchars(trim($_POST['vehi_direc']));
	$vehi_tele = htmlspecialchars(trim($_POST['vehi_tele']));
    $vehi_ruc = htmlspecialchars(trim($_POST['vehi_ruc']));
    $vehi_mtc = htmlspecialchars(trim($_POST['vehi_mtc']));
    $vehi_activo = htmlspecialchars(trim($_POST['vehi_activo']));
    
	$objCliente=new Vehiculos;
    if ( $objCliente->addVehiculos(array($vehi_razon,$vehi_placa,$vehi_marca,$vehi_alias,$vehi_direc,$vehi_tele,$vehi_ruc,$vehi_mtc,$vehi_activo)) == true){
		echo 'Datos guardados';
    }else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
?>
	<label><b>mantenimiento de vehiculos</b></label>
	<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="newVehiculos.php" onsubmit="GrabarDatos(); return false">
		<p>
			<label>Razon Social<br />
			<input class="text" type="text" name="vehi_razon" id="vehi_razon" />
			</label>
		</p>
		<p>
			<label>Placa<br />
			<input class="text" type="text" name="vehi_placa" id="vehi_placa" />
			</label>
		</p>
		<p>
			<label>Marca<br />
			<input class="text" type="text" name="vehi_marca" id="vehi_marca" />
			</label>
		</p>
		<p>
			<label>Alias<br />
			<input class="text" type="text" name="vehi_alias" id="vehi_alias" />
			</label>
		</p>
		<p>
			<label>Direccion<br />
			<input class="text" type="text" name="vehi_direc" id="vehi_direc" />
			</label>
		</p>
		<p>
			<label>Telefono<br />
			<input class="text" type="text" name="vehi_tele" id="vehi_tele" />
			</label>
		</p>
		<p>
			<label>ruc<br />
			<input class="text" type="text" name="vehi_ruc" id="vehi_ruc" />
			</label>
		</p>
		<p>
			<label>Constancia MTC<br />
			<input class="text" type="text" name="vehi_mtc" id="vehi_mtc" />
			</label>
		</p>
		<p>
			<label>Activo</label>
			<label>
			<input type="radio" name="alternativas" id="masculino" value="0" />
			SI</label>
			<label>
			<input type="radio" name="alternativas" id="femenino" value="1" />
			NO</label>
		</p>
		<hr>
		<p>
			<input type="submit" name="submit" id="button" value="Enviar" />
			<label></label>
			<input type="button" class="cancelar" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
		</p>
	</form>
<?php
}
?>