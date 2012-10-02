<?
class Proveedor{
    // PROPIEDADES
    // codigo, estado, nombres, tipocliente, direccion, dniruc, ciudad, telefono
    public  $codigo;
    public  $estado;        //0 = inactivo; 1 = activo
    public  $nombres;
    public  $direccion;
    public  $dniruc;
    public  $ciudad;
    public  $telefono;
    public  $sql;
    public  $query;
    public  $listado = array();
    // METODOS USAR
    function agregarProveedor($nombres, $direccion, $dniruc, $ciudad, $telefono){
        $sql = "insert into proveedor (codigo, estado, nombres, direccion, dniruc, ciudad, telefono)
        values (NULL, 1,'$nombres','$direccion','$dniruc','$ciudad','$telefono')";
        $query = mysql_query($sql);
        echo mysql_error();
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
    function modificarProveedor($codigo, $estado, $nombres, $direccion, $dniruc, $ciudad, $telefono){
        $sql ="update proveedor set estado ='$estado', nombres='$nombres',
        direccion='$direccion', dniruc='$dniruc', ciudad='$ciudad', telefono='$telefono'
        where codigo = $codigo";
        $query = mysql_query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
    function eliminarProveedor($codigo){
        $sql ='update proveedor set estado=0 where codigo ='.$codigo;
        $query = mysql_query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
    function mostrarProveedor($codigo){
        $this->sql = "select * from proveedor where codigo = ".$codigo;
        $this->query=mysql_query($this->sql);
        while($fila = mysql_fetch_array($this->query, MYSQL_ASSOC)){
	    $this->resultado[] = $fila;
	} 
    }
    
    function mostrarProveedores(){
        $this->sql = "select * from proveedor where estado = 1";
        $this->query=mysql_query($this->sql);
        while($fila = mysql_fetch_array($this->query, MYSQL_ASSOC)){
	    $this->resultado[] = $fila;
	} 
    }
    
}