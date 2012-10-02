	function ActualizarDatos(){
		var vehi_razon = $('#vehi_razon').attr('value');
		var vehi_placa = $('#vehi_placa').attr('value'); 
		var vehi_marca = $("#vehi_marca").attr("value");
		var vehi_alias = $("#vehi_alias").attr("value");
		var vehi_direc = $("#vehi_direc").attr("value");
		var vehi_tele = $('#vehi_tele').attr('value'); 
		var vehi_ruc = $("#vehi_ruc").attr("value");
		var vehi_mtc = $("#vehi_mtc").attr("value");
		var vehi_activo = $("#vehi_activo").attr("value");

		$.ajax({
			url: 'actualizar.php',
			type: "POST",
			data: "submit=&vehi_razon="+vehi_razon+"&vehi_placa="+vehi_placa+"&vehi_marca="+vehi_marca+"&vehi_alias="+vehi_alias+"&vehi_direc="+vehi_direc+"&vehi_tele="+vehi_tele+"&vehi_ruc="+vehi_ruc+"&vehi_mtc="+vehi_mtc+"&vehi_activo="+vehi_activo,
			success: function(datos){
				alert(datos);
				ConsultaDatos();
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}
	
	function ConsultaDatos(){
		$.ajax({
			url: 'mantVehiculos.php',
			cache: false,
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}
	
	function EliminarDato(vehi_codigo){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: 'delVehiculos.php',
				type: "GET",
				data: "id="+vehi_codigo,
				success: function(datos){
					alert(datos);
					$("#fila-"+vehi_codigo).remove();
				}
			});
		}
		return false;
	}
	
	function GrabarDatos(){
		var vehi_razon = $('#vehi_razon').attr('value');
		var vehi_placa = $('#vehi_placa').attr('value'); 
		var vehi_marca = $("#vehi_marca").attr("value");
		var vehi_alias = $("#vehi_alias").attr("value");
		var vehi_direc = $("#vehi_direc").attr("value");
		var vehi_tele = $('#vehi_tele').attr('value'); 
		var vehi_ruc = $("#vehi_ruc").attr("value");
		var vehi_mtc = $("#vehi_mtc").attr("value");
		var vehi_activo = $("#vehi_activo").attr("value");		
		// $vehi_razon,$vehi_placa,$vehi_marca,$vehi_alias,$vehi_direc,$vehi_tele,$vehi_ruc,$vehi_mtc,$vehi_activo
		$.ajax({
			url: 'nuevo.php',
			type: "POST",
			data: "submit=&vehi_razon="+vehi_razon+"&vehi_placa="+vehi_placa+"&vehi_marca="+vehi_marca+"&vehi_alias="+vehi_alias+"&vehi_direc="+vehi_direc+"&vehi_tele="+vehi_tele+"&vehi_ruc="+vehi_ruc+"&vehi_mtc="+vehi_mtc+"&vehi_activo="+vehi_activo,
			success: function(datos){
				ConsultaDatos();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}

	function Cancelar(){
		$("#formulario").hide();
		$("#tabla").show();
		return false;
	}
	
	// funciones del calendario
	function update_calendar(){
		var month = $('#calendar_mes').attr('value');
		var year = $('#calendar_anio').attr('value');
	
		var valores='month='+month+'&year='+year;
	
		$.ajax({
			url: 'calendario.php',
			type: "GET",
			data: valores,
			success: function(datos){
				$("#calendario_dias").html(datos);
			}
		});
	}
	
	function set_date(date){
		$('#fecha_nacimiento').attr('value',date);
		show_calendar();
	}
	
	function show_calendar(){
		$('#calendario').toggle();
	}
	