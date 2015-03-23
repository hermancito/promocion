<?php
include('clases.php');
$con=new conexbd();
$prov=$_POST["provincia"];
$rawdata = array(); //creamos un array
$rs2=$con->consultar('select * from municipios where provincia = '.$prov);
//guardamos en un array multidimensional todos los datos de la consulta
$i=0;
while ($rdo2=mysql_fetch_array($rs2)) {
	$rawdata[$i] = $rdo2;
    $i++;
	//$municipios = "{cod:\"$rdo2['id']\", value:\"$rdo2['provincia']\"}";
}
//echo "[".implode(",", $municipios)."]";
//echo json_encode($municipios);
echo json_encode($rawdata);
?>
