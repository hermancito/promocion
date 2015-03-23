<?php
include('cabecera.php');
include('clases.php');
$con=new conexbd();
?>
<div class="ink-container ink-vspace">
	<div class="ink-vspace">
		
		<div class="ink-row">
			<div class="ink-l50">
				<div class="ink-gutter">
					<h4>Alta datos básicos</h4>
					<form action="grabaAltaCentro.php" method="post">
						<p>Provincia</p>
						<select name="prov" id="prov">
							<option value="0">Selecciona provincia</option>
							<?php
							$rs1=$con->consultar('select * from provincias order by provincia');
							while($rdo=mysql_fetch_array($rs1)){
								echo '<option value="'.$rdo["id"].'">'.$rdo["provincia"].'</option>';
							}
							?>
						</select>
						<p>Localidad</p>
						<select name="loc" id="mun">
							<option value="0">Selecciona localidad</option>
						</select>
						<p>Tipo</p>
						<select name="tipo">
							<option value="0">Selecciona tipo de centro</option>
							<?php
							$rs2=$con->consultar('select Tipo from centros group by Tipo order by Tipo');
							while($rdo2=mysql_fetch_array($rs2)){
								echo '<option value="'.$rdo2["Tipo"].'">'.$rdo2["Tipo"].'</option>';
							}
							?>
						</select>
						<p>Nombre</p>
						<input type="text" name="nom">
						<p>Dirección</p>
						<input type="text" name="dir">
						<p>Código Postal</p>
						<input type="text" name="cp">
						<p>Teléfono</p>
						<input type="text" name="tfno"><br><br>
						<input type="submit" name="altaCentro" value="Grabar Centro">
					</form>
				</div>
			</div>
			<div class="ink-l50">
				<div class="ink-gutter">
					<?php
					if(isset($_GET["num"])){
						if($_GET["num"]=="ok"){
							echo '<div class="ink-alert basic success" role="alert">
							    <button class="ink-dismiss">&times;</button>
							    <p><b>Hecho:</b> El centro se ha grabado correctamente</p>
							</div>';
							echo '<h4>Datos del centro grabado</h4>';
							//obtenemos el último id grabado
							$lastid=$con->consultar("SELECT MAX(id_centro) AS id FROM centros");
							if ($row = mysql_fetch_row($lastid)) {
								$id = trim($row[0]);
							}
							//buscamos el centro con el último id 
							$rs=$con->consultar("select * from centros inner join provincias on(centros.Provincia=provincias.id) where id_centro = '$id'");
							if (mysql_num_rows($rs)>0){
								while($rdo=mysql_fetch_array($rs)){
									echo "Provincia: ".$rdo['provincia']."<br/>";
									echo "Localidad: ".$rdo['Localidad']."<br/>";
									echo "Tipo de centro: ".$rdo["Tipo"]."<br/>";
									echo "Nombre: ".$rdo["Nombre"]."<br/>";
									echo "Dirección: ".$rdo["Direccion"]."<br/>";
									echo "C.Postal: ".$rdo["CP"]."<br/>";
									echo "Teléfono: ".$rdo["Telefono"]."<br/><br/>";
								}
								echo '<a href="ficha_centro.php?num='.$id.'"><input type="button" value="Ir la centro a activar enseñanzas"/></a>';
							}else{
								echo "No existe el centro";
							}
						}else if($_GET["num"]=="error"){
							echo '<div class="ink-alert basic error" role="alert">
							    <button class="ink-dismiss">&times;</button>
							    <p><b>Error:</b> El centro no se ha grabado</p>
							</div>';
						}
					}
					?>
					<div class="all-50 small-100 tiny-100">
						<div class="ink-alert basic info" role="alert">
						<button class="ink-dismiss">×</button>
						<p>
						<b>Nota:</b>
						Una vez dado de alta el centro recuerda dar de alta sus enseñanzas 
						</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php
include('footer.php');
?>		