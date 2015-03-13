<?php
include('cabecera.php');
include('clases.php');
$con=new conexbd();
$ens=$_GET['num'];
?>
<div class="ink-container ink-vspace">
	<div class="ink-row">
		<div class="ink-l50">
			<div class="ink-gutter">
				<?php
				$rs=$con->consultar('select NOMBRE from ensenanzas where id_ens = "'.$ens.'"');
				while($rdo=mysql_fetch_array($rs)){
					echo "<h4>Centros que imparten ".$rdo['NOMBRE']."</h4>";
				}
				?>
				<table border=1>
					<tr>
						<th>Provincia</th>
						<th>Localidad</th>
						<th>Tipo</th>
						<th>Nombre</th>
					</tr>
						<?
						$rs=$con->consultar('select * from centros_ensen inner join centros on (centros_ensen.id_cen = centros.id_centro) where centros_ensen.id_ens = "'.$ens.'"');
						while($rdo=mysql_fetch_array($rs)){
							echo "<tr>";
							echo '<td>'.$rdo["Provincia"].'</td>';
							echo "<td>".$rdo["Localidad"]."</td>";
							echo "<td>".$rdo["Tipo"]."</td>";
							echo "<td>".$rdo["Nombre"]."</td>";
							echo "</tr>";
						}
						?>
				</table>
			</div>
		</div>
	
	
		<div class="ink-l50">
			<div class="ink-gutter">
				
				<h4>Profesores del ciclo</h4>
				<table border=1>
					<tr>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Teléfono</th>
						<th>email</th>
						<th>Cargo</th>
					</tr>
						<?
						$rs=$con->consultar('select * from centros_ensen inner join ensenanzas on (centros_ensen.id_ens
							=ensenanzas.id_ens) inner join centros on (centros_ensen.id_cen = centros.id_centro)');
						while($rdo=mysql_fetch_array($rs)){
							echo "<tr>";
							echo '<td>'.$rdo["Nombre"].'</a></td>';
							echo "<td>".$rdo["Localidad"]."</td>";
							echo "<td>".$rdo["NOMBRE"]."</td>";
							echo "</tr>";
						}
						?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
include('footer.php');
?>		