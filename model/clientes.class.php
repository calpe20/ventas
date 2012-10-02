<?
class Clientes{
    // PROPIEDADES
    // codigo, estado, nombres, tipocliente, direccion, dniruc, ciudad, telefono
    public  $codigo;
    public  $estado;        //0 = inactivo; 1 = activo
    public  $nombres;
    public  $tipocliente;   //0 = JURIDICA; 1 = NATURAL
    public  $direccion;
    public  $dniruc;
    public  $ciudad;
    public  $telefono;
    public  $sql;
    public  $query;
    public  $listado = array();
    // METODOS USAR
    function agregarCliente($nombres, $tipocliente, $direccion, $dniruc, $ciudad, $telefono){
        echo $sql = "insert into clientes (codigo, estado, nombres, tipocliente, direccion, dniruc, ciudad, telefono)
        values (NULL, 1,'$nombres','$tipocliente','$direccion','$dniruc','$ciudad','$telefono')";
        $query = mysql_query($sql);
        echo mysql_error();
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
    function modificarCliente($codigo, $estado, $nombres, $tipocliente, $direccion, $dniruc, $ciudad, $telefono){
        echo $sql ="update clientes set estado ='$estado', nombres='$nombres',tipocliente='$tipocliente',
        direccion='$direccion', dniruc='$dniruc', ciudad='$ciudad', telefono='$telefono'
        where codigo = $codigo";
        $query = mysql_query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
    function eliminarCliente($codigo){
        $sql ='update clientes set estado=0 where codigo ='.$codigo;
        $query = mysql_query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
    function mostrarCliente($codigo){
        $this->sql = "select * from clientes where codigo = ".$codigo;
        $this->query=mysql_query($this->sql);
        while($fila = mysql_fetch_array($this->query, MYSQL_ASSOC)){
	    $this->resultado[] = $fila;
	} 
    }
    
    function mostrarClientes(){
        $this->sql = "select * from clientes where estado = 1";
        $this->query=mysql_query($this->sql);
        while($fila = mysql_fetch_array($this->query, MYSQL_ASSOC)){
	    $this->resultado[] = $fila;
	} 
    }
    
}