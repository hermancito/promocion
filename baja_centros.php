<?php
include('cabecera.php');
include('clases.php');
$con=new conexbd();
?>
<div class="ink-container ink-vspace">
	<div class="ink-row">
		<div class="ink-gutter">
		<a href="alta_centros.php"><input type="button" value="Alta Centro"></a>
		<a href="baja_centros.php"><input type="button" value="Baja Centro"></a>
		<?php
		if(isset($_GET["mens"])){
			if($_GET["mens"]=="ok"){
				echo '<div class="ink-alert basic success" role="alert">
				    <button class="ink-dismiss">&times;</button>
				    <p><b>Hecho:</b> El centro se ha dado de baja correctamente</p>
				</div>';
			}else if($_GET["mens"]=="error"){
				echo '<div class="ink-alert basic error" role="alert">
				    <button class="ink-dismiss">&times;</button>
				    <p><b>Error:</b> El centro no se ha dado de baja</p>
				</div>';
			}
		}
		?>
		<h4>Busca el centro a dar de baja por:</h4>
				<form action="baja_centros.php" name="pro" method="post">
				
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
				<form action="baja_centros.php" name="pob" method="post">
				
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
				<form action="baja_centros.php" name="tip" method="post">
				
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
	<div class="ink-row">
		<div class="ink-gutter">
			<?php
			if(!$_POST){
				$rs=$con->consultar('select * from centros inner join provincias on(centros.Provincia=provincias.id) order by centros.Provincia, centros.Localidad, centros.Nombre');
				while($rdo=mysql_fetch_array($rs)){
					echo "<div class='ink-l30 bordeCajas'>";
					echo "<p>Provincia: ".$rdo["provincia"]."</p>";
					echo "<p>Localidad: ".$rdo["Localidad"]."</p>";
					echo "<p>Tipo: ".$rdo["Tipo"]."</p>";
					echo "<p>Nombre: ".$rdo["Nombre"]."</p>";
					echo "<p>Telefono:".$rdo["Telefono"]."</p>";
					echo "<p><a href='#'>Baja</a></p>";
					echo "</div>";
				}
			}else if(isset($_POST["campo"])){
				$dato=$_POST['dato'];
				$col=$_POST["campo"];
				$rs1=$con->consultar("select * from centros inner join provincias on(centros.Provincia=provincias.id) where centros.".$col." = '$dato'");
				while($rdo1=mysql_fetch_array($rs1)){				
					echo "<div class='ink-l30 bordeCajas'>";
					echo "<p>Provincia: ".$rdo1["provincia"]."</p>";
					echo "<p>Localidad: ".$rdo1["Localidad"]."</p>";
					echo "<p>Tipo: ".$rdo1["Tipo"]."</p>";
					echo "<p>Nombre: ".$rdo1["Nombre"]."</p>";
					echo "<p>Telefono:".$rdo1["Telefono"]."</p>";
					echo '<a href="darBajaCentro.php?num='.$rdo1["id_centro"].'"><input type="button" value="Baja Centro"></a>';
					echo "</div>";
				}
			}
			?>
	</div>
	</div>
</div>
<?php
include('footer.php');
?>		