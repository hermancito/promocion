<?php
include('cabecera.php');
include('clases.php');
?>
		<div class="ink-container ink-vspace">
			<a href="alta_centros.php"><input type="button" value="Alta Centro"></a>
			<a href="baja_centros.php"><input type="button" value="Baja Centro"></a>
			<a href="#"><input type="button" value="Selección Centros"></a><br><br>
			<h4>Centros registrados</h4>
			<p>Selecciona centro a dar de baja</p>
			<table border=1>
			<tr>
				<th>Provincia</th>
				<th>Localidad</th>
				<th>Tipo</th>
				<th>Nombre</th>
				<th>Dirección</th>
				<th>CP</th>
				<th>Teléfono</th>
			</tr>
				<?
				$con=new conexbd();
				$rs=$con->consultar('select * from centros');
				while($rdo=mysql_fetch_array($rs)){
					echo "<tr>";
					echo "<td>".$rdo["Provincia"]."</td>";
					echo "<td>".$rdo["Localidad"]."</td>";
					echo "<td>".$rdo["Tipo"]."</td>";
					echo "<td>".$rdo["Nombre"]."</td>";
					echo "<td>".$rdo["Direccion"]."</td>";
					echo "<td>".$rdo["CP"]."</td>";
					echo "<td>".$rdo["Telefono"]."</td>";
					echo "<td><a href='#'>Baja</td>";
					echo "</tr>";
				}
				?>
			</table>
			
		</div>
<?php
include('footer.php');
?>		