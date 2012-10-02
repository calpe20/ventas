<?
    class Articulos{
	public $codigo;
	public $estado;
	public $articulo;
	public $marca;
	public $modelo;
	public $id_provee;
	public $precio;
	public $observa;
        public $resultado = array();
        public $sql;
        public $query;
        
        function agregarArt($articulo, $marca, $modelo, $id_provee, $precio, $observa){
            echo $sql = "insert into articulos (codigo, estado, articulo, marca, modelo, id_provee, precio, observa)
            values (NULL, 1,'$articulo', '$marca', '$modelo', $id_provee, $precio, '$observa')";
            $query = mysql_query($sql);
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function modificarArt($codigo, $estado, $articulo, $marca, $modelo, $id_provee, $precio, $observa){
            echo $sql ="update articulos set estado=$estado, articulo='$articulo', marca='$marca',
	    modelo ='$modelo', id_provee=$id_provee, precio=$precio, observa='$observa'
            where codigo = $codigo";
            $query = mysql_query($sql);
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function buscarArt($codigo){
            $this->sql = "select * from articulos where codigo = ".$codigo;
            $this->query=mysql_query($this->sql);
            while($fila = mysql_fetch_array($this->query, MYSQL_ASSOC)){
		$this->resultado[] = $fila;
	    }  
        }
        function deleteArt($id){
            $sql ='update articulos set estado=0 where codigo ='.$id;
            $query = mysql_query($sql);
            if($query){
                return true;
            }else{
                return false;
            }
        }
    }
?>