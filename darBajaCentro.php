<?php
include('clases.php');
$con=new conexbd();
$baja=$_GET["num"];	
$ssql="delete from centros where id_centro=".$baja;
$rs=$con->consultar($ssql);
mysql_error($rs);
if($rs){
	header("Location: baja_centros.php?mens=ok");
}else{
	header("Location: baja_centros.php?mens=error");
}
	
?>