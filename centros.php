<?php
include('cabecera.php');
include('clases.php');
?>
<div class="ink-container ink-vspace">
	<div class="ink-row">
		<div class="ink-l50">
			<div class="ink-gutter">
				<a href="alta_centro.php"><input type="button" value="Alta Centro"/></a>
				<a href="baja_centros.php"><input type="button" value="Baja Centro"/></a>

				<h4>Centros registrados</h4>
				<p>Para entrar en la ficha del centro pulsar sobre el nombre</p>
				<table border=1>
				<tr>
					<th>Provincia</th>
					<th>Localidad</th>
					<th>Nombre</th>
					<th>Tipo</th>
				</tr>
					<?
					$con=new conexbd();
					if(!$_POST){
						$rs=$con->consultar('select * from centros inner join provincias on(centros.Provincia=provincias.id) order by centros.Provincia, centros.Localidad, centros.Nombre');
						while($rdo=mysql_fetch_array($rs)){
							echo "<tr>";
							echo "<td>".$rdo["provincia"]."</td>";
							echo "<td>".$rdo["Localidad"]."</td>";
							echo '<td><a href="ficha_centro.php?num='.$rdo["id_centro"].'">'.$rdo["Nombre"].'</a></td>';
							echo "<td>".$rdo["Tipo"]."</td>";
							echo "</tr>";
						}
					}else if(isset($_POST["campo"])){
						$dato=$_POST['dato'];
						$col=$_POST["campo"];
						$rs1=$con->consultar("select * from centros inner join provincias on(centros.Provincia=provincias.id) where centros.".$col." = '$dato'");
						while($rdo1=mysql_fetch_array($rs1)){
							echo "<tr>";
							echo "<td>".$rdo1["provincia"]."</td>";
							echo "<td>".$rdo1["Localidad"]."</td>";
							echo '<td><a href="ficha_centro.php?num='.$rdo1["id_centro"].'">'.$rdo1["Nombre"].'</a></td>';
							echo "<td>".$rdo1["Tipo"]."</td>";
							echo "</tr>";
						}
					}
					
					?>
				</table>
			</div>
		</div>
		<div class="ink-l50">
			<div class="ink-gutter">
				<h4>Selecciona los centros por:</h4>
				<form action="centros.php" name="pro" method="post">
				<h5>Provincia</h5>
				<input type="hidden" name="campo" value="Provincia">
				<select name="dato" id="prov" onchange="this.form.submit()">
					<option value="#">Selecciona Provincia</option>
					<?php
					$rs=$con->consultar('select * from provincias order by provincia');
					while($rdo=mysql_fetch_array($rs)){
						echo '<option value="'.$rdo["id"].'">'.$rdo["provincia"].'</option>';
					}
					?>
				</select>
				</form>
				<form action="centros.php" name="pob" method="post">
				<h5>Población</h5>
				<input type="hidden" name="campo" value="Localidad">
				<select name="dato" id="pob" onchange="this.form.submit()">
					<option value="#">Selecciona Población</option>
					<?php
					$rs=$con->consultar('select Localidad from centros group by Localidad order by Localidad');
					while($rdo=mysql_fetch_array($rs)){
						echo '<option value="'.$rdo["Localidad"].'">'.$rdo["Localidad"].'</option>';
					
					}
					?>
				</select>
				</form>
				<form action="centros.php" name="tip" method="post">
				<h5>Tipo</h5>
				<input type="hidden" name="campo" value="Tipo">
				<select name="dato" id="pob" onchange="this.form.submit()">
					<option value="#">Selecciona Tipo</option>
					<?php
					$rs=$con->consultar('select Tipo from centros group by Tipo order by Tipo');
					while($rdo=mysql_fetch_array($rs)){
						echo '<option value="'.$rdo["Tipo"].'">'.$rdo["Tipo"].'</option>';
					
					}
					?>
				</select>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include('footer.php');
?>		