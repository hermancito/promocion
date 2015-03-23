<?php
include('clases.php');
$con=new conexbd();
	
		$ssql="insert into centros (Provincia, Localidad, Tipo, Nombre, Direccion, CP,
		 Telefono) values ('".$_POST["prov"]."', '".$_POST["loc"]."', '".$_POST["tipo"]."',
		    '".$_POST["nom"]."', '".$_POST["dir"]."', '".$_POST["cp"]."',
		     '".$_POST["tfno"]."')";
		$rs=$con->consultar($ssql);
		mysql_error($rs);
		if($rs){
			header("Location: alta_centro.php?num=ok");
		}else{
			header("Location: alta_centro.php?num=error");
		}
	
?>