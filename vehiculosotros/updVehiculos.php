<?php
require('../funciones/functions.php');
if(isset($_POST['submit'])){
        require('../clases/vehiculos.class.php');
        $objCliente=new Cliente;
        
        $cliente_id = htmlspecialchars(trim($_POST['cliente_id']));
        $nombres = htmlspecialchars(trim($_POST['nombres']));
        $ciudad = htmlspecialchars(trim($_POST['ciudad']));
        $sexo = htmlspecialchars(trim($_POST['alternativas']));
        $telefono = htmlspecialchars(trim($_POST['telefono']));
        $fecha_nacimiento = htmlspecialchars(trim($_POST['fecha_nacimiento']));
        
        if ( $objCliente->actualizar(array($nombres,$ciudad,$sexo,$telefono,$fecha_nacimiento),$cliente_id) == true){
                echo 'Datos guardados';
        }else{
                echo 'Se produjo un error. Intente nuevamente';
        } 
}else{
        if(isset($_GET['id'])){
                
                require('../clases/vehiculos.class.php');
                $objCliente=new Vehiculos;
                $consulta = $objCliente->mostrar_cliente($_GET['id']);
                $Vehiculos = mysql_fetch_array($consulta);
        ?>
        <form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onsubmit="ActualizarDatos(); return false">
        <input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $Vehiculos[0]?>" />
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
                <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
          </p>
        </form>
        <?php
        }
}
?>