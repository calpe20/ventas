<?php
require('../clases/vehiculos.class.php');
$objCliente=new Vehiculos;
$consulta=$objCliente->viewAllVehiculos();
?>
<script type="text/javascript">
$(document).ready(function(){
        // mostrar formulario de actualizar datos
        $("table tr .modi a").click(function(){
                $('#tabla').hide();
                $("#formulario").show();
                $.ajax({
                        url: this.href,
                        type: "GET",
                        success: function(datos){
                                $("#formulario").html(datos);
                        }
                });
                return false;
        });
        
        // llamar a formulario nuevo
        $("#nuevo a").click(function(){
                $("#formulario").show();
                $("#tabla").hide();
                $.ajax({
                        type: "GET",
                        url: 'newVehiculos.php',
                        success: function(datos){
                                $("#formulario").html(datos);
                        }
                });
                return false;
        });
});

</script>
<span id="nuevo"><a href="newVehiculos.php"><img src="../imagen/add.png" alt="Agregar dato" /></a></span>
        <table>
                <tr>
                <th>Razon Social</th>
                <th>Placa</th>
                <th>Marca</th>
                <th>Alias</th>
	        <th>Direccion</th>
		<th>Telefono</th>
		<th>RUC</th>
		<th>MTC</th>
		<th>Activo</th>
		<th></th>
		<th></th>
		</tr>
<?php
	if($consulta) {
        while( $vehiculos = mysql_fetch_array($consulta) ){
?>
			<tr id="fila-<?php echo $vehiculos['vehi_codigo'] ?>">
				<td><?php echo $vehiculos['vehi_razon'] ?></td>
                <td><?php echo $vehiculos['vehi_placa'] ?></td>
                <td><?php echo $vehiculos['vehi_marca'] ?></td>
                <td><?php echo $vehiculos['vehi_alias'] ?></td>
                <td><?php echo $vehiculos['vehi_direc'] ?></td>
				<td><?php echo $vehiculos['vehi_tele'] ?></td>
				<td><?php echo $vehiculos['vehi_ruc'] ?></td>
				<td><?php echo $vehiculos['vehi_mtc'] ?></td>
				<td><?php echo $vehiculos['vehi_activo'] ?></td>
                <td>
					<span class="modi">
						<a href="updVehiculos.php?id=<?php echo $vehiculos['vehi_codigo'] ?>">
							<img src="../imagen/database_edit.png" title="Editar" alt="Editar" />
						</a>
					</span>
				</td>
				<td>
					<span class="dele">
						<a onClick="EliminarDato(<?php echo $vehiculos['id'] ?>); return false" href="delVehiculos.php?id=<?php echo $vehiculos['vehi_codigo'] ?>">
							<img src="../imagen/delete.png" title="Eliminar" alt="Eliminar" />
						</a>
					</span>
				</td>
			</tr>
<?php
        }
	}
?>
    </table>