<?php
include('cabecera.php');
include('clases.php');
$con=new conexbd();
?>
<div class="ink-container ink-vspace">
	<div class="ink-row">
		<div class="ink-l50">
			<div class="ink-gutter">
				<a href="#"><input type="button" value="Alta Enseñanza"></a>
				<a href="#"><input type="button" value="Baja Enseñanza"></a>
				
				<h4>Enseñanzas registradas</h4>
				<p>Para entrar en la ficha de la enseñanza pulsar sobre el nombre</p>
				<table border=1>
					<tr>
						<th>Nombre</th>
						<th>Tipo</th>
					</tr>
						<?
						$rs=$con->consultar('select * from ensenanzas');
						while($rdo=mysql_fetch_array($rs)){
							echo "<tr>";
							echo '<td><a href="ficha_ens.php?num='.$rdo["id_ens"].'">'.$rdo["NOMBRE"].'</a></td>';
							echo "<td>".$rdo["TIPO"]."</td>";
							echo "</tr>";
						}
						?>
				</table>
			</div>
		</div>
	
	
		<div class="ink-l50">
			<div class="ink-gutter">
				
				<h4>Centros por enseñanza</h4>
				<table border=1>
					<tr>
						<th>Nombre</th>
						<th>Población</th>
						<th>Enseñanza</th>
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