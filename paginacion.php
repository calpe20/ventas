<?
  include('funciones/functions.php');
  include('clases/conexion.class.php');
  $con = new DBManager();
  $con->conectar();
  class Paginacion{
    // declaramos las variables a usar
    public $rows_per_page;
    public $url;
    public $sql;
    public $query;
    // metodo para ingresar cuantos registros por pagina a mostrar
    function getPaginas($num){
      $this->rows_per_page = $num;
    }
    // funcion que recibe la consulta a paginar
    function getConsulta($sql){
      $this->sql= $sql;
      $datos=mysql_query(this->sql);
       
      //MIRO CUANTOS DATOS FUERON DEVUELTOS
      $num_rows=mysql_num_rows($datos);
       
      //CALCULO LA ULTIMA PÁGINA
      $lastpage= ceil($num_rows / $this->rows_per_page);
       
      //COMPRUEBO QUE EL VALOR DE LA PÁGINA SEA CORRECTO Y SI ES LA ULTIMA PÁGINA
      $page=(int)$page;
      if($page > $lastpage){
          $page= $lastpage;
      }
      if($page < 1){
          $page=1;
      }
       
      //CREO LA SENTENCIA LIMIT PARA AÑADIR A LA CONSULTA QUE DEFINITIVA
      $limit= 'LIMIT '. ($page -1) * $this->rows_per_page . ',' .$this->rows_per_page;
       
      //REALIZO LA CONSULTA QUE VA A MOSTRAR LOS DATOS (ES LA ANTERIO + EL $limit)
      $this->sql .=" $limit";
      $this->query=mysql_query($this->sql);
    }
    function getUrl($url){
      $this->url = $url;
    }
    // muestra paginacion

    function verPaginacion(){
      //UNA VEZ Q MUESTRO LOS DATOS TENGO Q MOSTRAR EL BLOQUE DE PAGINACIÓN SIEMPRE Y CUANDO HAYA MÁS DE UNA PÁGINA
      if($num_rows != 0){
        $nextpage= $page +1;
        $prevpage= $page -1;
        ?><ul id="pagination-digg"><?
        //SI ES LA PRIMERA PÁGINA DESHABILITO EL BOTON DE PREVIOUS, MUESTRO EL 1 COMO ACTIVO Y MUESTRO EL RESTO DE PÁGINAS
        if ($page == 1) {
          ?>
          <li class="previous-off">&laquo; Anterior</li>
          <li class="active">1</li> <?
          for($i= $page+1; $i<= $lastpage ; $i++){
            ?>
            <li><a href="<? echo $this->url.$i;?>"><? echo $i;?></a></li>
            <?
          }
          //Y SI LA ULTIMA PÁGINA ES MAYOR QUE LA ACTUAL MUESTRO EL BOTON NEXT O LO DESHABILITO
          if($lastpage >$page ){
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
          for($i= 1; $i<= $lastpage ; $i++){
            //COMPRUEBO SI ES LA PÁGINA ACTIVA O NO
            if($page == $i){
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
          if($lastpage >$page ){
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
//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
$consulta="SELECT * FROM choferes ORDER BY CODIGO DESC";
$datos=mysql_query($consulta);
 
//MIRO CUANTOS DATOS FUERON DEVUELTOS
$num_rows=mysql_num_rows($datos);
 
//ACA SE DECIDE CUANTOS RESULTADOS MOSTRAR POR PÁGINA , EN EL EJEMPLO PONGO 15
$rows_per_page= 10;
 
//CALCULO LA ULTIMA PÁGINA
$lastpage= ceil($num_rows / $rows_per_page);
 
//COMPRUEBO QUE EL VALOR DE LA PÁGINA SEA CORRECTO Y SI ES LA ULTIMA PÁGINA
$page=(int)$page;
if($page > $lastpage){
    $page= $lastpage;
}
if($page < 1){
    $page=1;
}
 
//CREO LA SENTENCIA LIMIT PARA AÑADIR A LA CONSULTA QUE DEFINITIVA
$limit= 'LIMIT '. ($page -1) * $rows_per_page . ',' .$rows_per_page;
 
//REALIZO LA CONSULTA QUE VA A MOSTRAR LOS DATOS (ES LA ANTERIO + EL $limit)
$consulta .=" $limit";
$choferes=mysql_query($consulta);
 
if(!$choferes){
  //SI FALLA LA CONSULTA MUESTRO ERROR
  die('Invalid query: ' . mysql_error());
}else{