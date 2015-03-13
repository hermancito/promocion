<?php
include('cabecera.php');
include('clases.php');
$centro = $_GET['num'];
$con=new conexbd();
?>
<div class="ink-container ink-vspace">
	<div class="ink-vspace">
		<div class="ink-row">
			<div class="ink-l50">
				<div class="ink-gutter">
					<h4>Datos del centro</h4>
					<?
					$rs=$con->consultar("select * from centros where id_centro = '$centro'");
					if (mysql_num_rows($rs)>0){
						while($rdo=mysql_fetch_array($rs)){
							echo "Provincia: ".$rdo['Provincia']."<br/>";
							echo "Localidad: ".$rdo['Localidad']."<br/>";
							echo "Tipo de centro: ".$rdo["Tipo"]."<br/>";
							echo "Nombre: ".$rdo["Nombre"]."<br/>";
							echo "Dirección: ".$rdo["Direccion"]."<br/>";
							echo "C.Postal: ".$rdo["CP"]."<br/>";
							echo "Teléfono: ".$rdo["Telefono"]."<br/>";
						}
					}else{
						echo "No existe el centro";
					}
					?>
				</div>
			</div>
			<div class="ink-l50">
				<div class="ink-gutter">
					<?php
					if(!$_POST){
					?>
					<h4>Enseñanzas activas</h4>
					<table border=1>
						<?php
						$rs=$con->consultar('select * from centros_ensen inner join ensenanzas on (centros_ensen.id_ens
							= ensenanzas.id_ens) where centros_ensen.id_cen = "'.$centro.'"');
						if (mysql_num_rows($rs)>0){
							while($rdo=mysql_fetch_array($rs)){
								echo "<tr>";
								echo "<td>".$rdo['NOMBRE']."</td>";
								echo "<td>".$rdo["TIPO"]."</td>";
								echo "</tr>";
							}
						}else{
							echo "Este centro no tiene enseñanzas activas";
						}
						?>
					</table>
					<h4>Activar enseñanzas</h4>
					<form action="" method="post" name="alta_ens">
					<table border=1>
						<tr>
							<th>Selecc</th>
							<th>Nombre</th>
							<th>Tipo</th>
						</tr>
							<?php
							$rs=$con->consultar('select * from ensenanzas');
							while($rdo=mysql_fetch_array($rs)){
								echo "<tr>";
								echo "<td><input type='checkbox' name='ens[]' value=".$rdo['id_ens']."></td>";
								echo '<td><a href="ficha_ens.php?num='.$rdo["id_ens"].'">'.$rdo["NOMBRE"].'</a></td>';
								echo "<td>".$rdo["TIPO"]."</td>";
								echo "</tr>";
							}
							?>
					</table>
					<input type="submit" value="Activar">
					</form>
					<?php
					}else{
						$ensenanza = $_POST['ens'];
							for($i=0; $i<count($ensenanza); $i++){
							$rs=$con->consultar('select id_ens from centros_ensen where id_cen = "'.$centro.'"
							 and id_ens = "'.$ensenanza[$i].'"');
							if(mysql_num_rows($rs)>0){
								echo "Hay una enseñanza ya dada de alta en este centro<br/>";
							}else{
								$rs=$con->consultar('insert into centros_ensen (id_cen, id_ens) values
								("'.$centro.'", "'.$ensenanza[$i].'")');
								
							}

						}
						echo '<a href="ficha_centro.php?num='.$centro.'">Añadir más enseñanzas</a>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include('footer.php');
?>		