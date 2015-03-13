<?php
include('cabecera.php');
include('clases.php');
?>
		<div class="ink-container ink-vspace">
			<a href="alta_prof.php"><input type="button" value="Alta Profesor"></a>
			<a href="#"><input type="button" value="Baja Profesor"></a>
			<a href="#"><input type="button" value="Selección Profesores"></a><br><br>
			<h4>Profesores registrados</h4>
			<p>Para entrar en la ficha del profesor pulsar sobre el apellido</p>
			<table border=1>
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Teléfono</th>
				<th>email</th>
				<th>Cargo</th>
				<th>Centro</th>
				<th>Localidad</th>
			</tr>
				<?
				$con=new conexbd();
				$rs=$con->consultar('select * from profesores inner join centros on(id_centro_prof = id_centro)');
				while($rdo=mysql_fetch_array($rs)){
					echo "<tr>";
					echo "<td>".$rdo["nombre"]."</td>";
					echo '<td><a href="ficha_prof.php?num='.$rdo["id_prof"].'">'.$rdo["apellidos"].'</a></td>';
					echo "<td>".$rdo["tfno"]."</td>";
					echo "<td>".$rdo["email"]."</td>";
					echo "<td>".$rdo["cargo"]."</td>";
					echo "<td>".$rdo["Nombre"]."</td>";
					echo "<td>".$rdo["Localidad"]."</td>";
					echo "</tr>";
				}
				?>
			</table>
			
		</div>
<?php
include('footer.php');
?>		