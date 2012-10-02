<?
	class Empleado{
		public $nombre;
		public $sueldo;
		function getEmpleado($nom,$sue){
			$this->nombre = $nom;
			$this->sueldo = $sue;
		}
		function setEmpleado(){
			print $this->nombre;
			if ($this->sueldo>3000){
				print 'no paga impuesto';
			}else{
				print 'Paga impuesto';
			}
		}
	}
	$obj = new Empleado();
	$obj->getEmpleado('Angel',3000);
	$obj->setEmpleado();
?>