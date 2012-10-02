<?
	class Paginacion{
		// declaramos las variables a usar	
		public $rows_per_page = 10;
		public $url;
		public $sql;
		public $query;
		public $page;
		public $lastpage;
		public $num_rows;
		public $resultado = array();
		// metodo para ingresar cuantos registros por pagina a mostrar
		function getPaginas($num){
			$this->rows_per_page = $num;
		}
		// metodo que captura en que pagina se encuentra actualmente
		function getPage($pag){
			$this->page = $pag;
		}
		// metodo que recibe la consulta a paginar
		function getConsulta($sq){
			$this->sql= $sq;
			$datos=mysql_query($this->sql);  
			$this->num_rows=mysql_num_rows($datos);
			//CALCULO LA ULTIMA PÁGINA
			$this->lastpage= ceil($this->num_rows / $this->rows_per_page);
			//COMPRUEBO QUE EL VALOR DE LA PÁGINA SEA CORRECTO Y SI ES LA ULTIMA PÁGINA
			$this->page=(int)$this->page;
			if($this->page > $this->lastpage){
				$this->page= $this->lastpage;
			}
			if($this->page < 1){
				$this->page=1;
			}
			//CREO LA SENTENCIA LIMIT PARA AÑADIR A LA CONSULTA QUE DEFINITIVA
			$limit= 'LIMIT '. ($this->page -1) * $this->rows_per_page . ',' .$this->rows_per_page;
			//REALIZO LA CONSULTA QUE VA A MOSTRAR LOS DATOS (ES LA ANTERIO + EL $limit)
			$this->sql .=" $limit";
			$this->query=mysql_query($this->sql);
			while($fila = mysql_fetch_array($this->query, MYSQL_ASSOC)){
				$this->resultado[] = $fila;
			}
		}
		// metodo que recibe la url a redireccionar en la paginacion
		public function getUrl($url){
		  $this->url = $url;
		}
		// metodo que procesa y muestra la paginacion
		function verPaginacion(){
			//UNA VEZ Q MUESTRO LOS DATOS TENGO Q MOSTRAR EL BLOQUE DE PAGINACIÓN SIEMPRE Y CUANDO HAYA MÁS DE UNA PÁGINA
			if($this->num_rows != 0){
				$nextpage= $this->page +1;
				$prevpage= $this->page -1;
				?><ul id="pagination-digg"><?
				//SI ES LA PRIMERA PÁGINA DESHABILITO EL BOTON DE PREVIOUS, MUESTRO EL 1 COMO ACTIVO Y MUESTRO EL RESTO DE PÁGINAS
				if ($this->page == 1) {
				?>
					<li class="previous-off">&laquo; Anterior</li>
					<li class="active">1</li> <?
					for($i= $this->page+1; $i<= $this->lastpage ; $i++){
					?>
						<li><a href="<? echo $this->url.$i;?>"><? echo $i;?></a></li>
					<?
					}
					//Y SI LA ULTIMA PÁGINA ES MAYOR QUE LA ACTUAL MUESTRO EL BOTON NEXT O LO DESHABILITO
					if($this->lastpage >$this->page ){
					?>    
						<li class="next"><a href="<? echo $this->url.$nextpage;?>" >Siguiente &raquo;</a></li>
					<?
					}else{
					?>
						<li class="next-off">Siguiente &raquo;</li>
					<?
					}
				} else {
				//EN CAMBIO SI NO ESTAMOS EN LA PÁGINA UNO HABILITO EL BOTON DE PREVIUS Y MUESTRO LAS DEMÁS
					?>
					<li class="previous"><a href="<? echo $this->url.$prevpage;?>"  >&laquo; Anterior</a></li>
					<?
					for($i= 1; $i<= $this->lastpage ; $i++){
						//COMPRUEBO SI ES LA PÁGINA ACTIVA O NO
						if($this->page == $i){
						?>
							<li class="active"><? echo $i;?></li>
						<?
						}else{
						?>
							<li><a href="<? echo $this->url.$i;?>" ><? echo $i;?></a></li>
						<?
						}
					}
					//  Y SI NO ES LA ÚLTIMA PÁGINA ACTIVO EL BOTON NEXT    
					if($this->lastpage >$this->page ){
					?>
						<li class="next"><a href="<? echo $this->url.$nextpage;?> ">Siguiente &raquo;</a></li>
					<?
					}else{
					?>
						<li class="next-off">Siguiente &raquo;</li>
					<?
					}
				}    
				?></ul><?
			}
		}
	}
?>