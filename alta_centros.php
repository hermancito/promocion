<?php
include('cabecera.php');
include('clases.php');
$con=new conexbd();
?>
<div class="ink-container ink-vspace">
<a href="alta_libreria.php"><input type="button" value="Alta Librería"></a>
<a href="baja_libreria.php"><input type="button" value="Baja Librería"></a>
<br>
	<div class="ink-vspace">
		<div class="ink-gutter">
		<?php
			if($_POST){
				$ssql="insert into centros (ruta, nom_com, nom_fiscal, direcc, poblacion, prov,
				 cp, tfno, email, nif, contacto, rec_eq, forma_pago, iban, dcto, nov_amat,
				  nov_profit, amiga, tipo_deposito, observ) values ('".$_POST["ruta"]."',
				   '".$_POST["nomcom"]."', '".$_POST["nomfis"]."', '".$_POST["dir"]."',
				    '".$_POST["pob"]."', '".$_POST["prov"]."', '".$_POST["cp"]."',
				     '".$_POST["tel"]."', '".$_POST["mail"]."', '".$_POST["nif"]."',
				      '".$_POST["cont"]."', '".$_POST["rec"]."', '".$_POST["pago"]."',
				       '".$_POST["iban"]."', '".$_POST["desc"]."', '".$_POST["nov_amat"]."',
				        '".$_POST["nov_profit"]."', '".$_POST["amiga"]."', '".$_POST["dep"]."', '".$_POST["obs"]."')";
				$rs=$con->consultar($ssql);
				if($rs){
					echo "<h4 class='ink-alert success'>El centro se ha grabado con éxito</h4>";
				}else{
					echo "<h4 class='ink-alert error'>Ha habido un error en la grabación del centro</h4>";
				}
			}
		?>
			<h4>Alta datos básicos</h4>
			<form action="alta_centros.php" method="post" name="basics">
				<legend>Ruta</legend>
				<select name="ruta">
					<?php
					$rs2=$con->consultar('select ruta from datos group by ruta');
					while($rdo2=mysql_fetch_array($rs2)){
						echo '<option value="'.$rdo2["ruta"].'">'.$rdo2["ruta"].'</option>';
					}
					?>
				</select>
				<legend>Nombre Comercial</legend>
				<input type="text" name="nomcom">
				<legend>Nombre Fiscal</legend>
				<input type="text" name="nomfis">
				<legend>Dirección</legend>
				<input type="text" name="dir">
				<legend>Población</legend>
				<input type="text" name="pob">
				<legend>Provincia</legend>
				<select name="prov">
					<?php
					$rs1=$con->consultar('select prov from datos group by prov');
					while($rdo=mysql_fetch_array($rs1)){
						echo '<option value="'.$rdo["prov"].'">'.$rdo["prov"].'</option>';
					}
					?>
				</select>
				<legend>Código Postal</legend>
				<input type="text" name="cp">
				<legend>Teléfono</legend>
				<input type="text" name="tel">
				<legend>E-mail</legend>
				<input type="text" name="mail">
				<legend>NIF</legend>
				<input type="text" name="nif">
				<legend>Contacto</legend>
				<input type="text" name="cont">
				<legend>Recargo Equivalencia</legend>
				SI<input type="checkbox" name="rec" value="si">
				NO<input type="checkbox" name="rec" value="no">
				<legend>Forma de pago</legend>
				<select name="pago">
					<?php
					$rs1=$con->consultar('select forma_pago from datos group by forma_pago');
					while($rdo=mysql_fetch_array($rs1)){
						echo '<option value="'.$rdo["forma_pago"].'">'.$rdo["forma_pago"].'</option>';
					}
					?>
				</select>
				<legend>IBAN</legend>
				<input type="text" name="iban">
				<legend>Descuento</legend>
				<input type="text" name="desc">
				<legend>Novedades Amat</legend>
				SI<input type="checkbox" name="nov_amat" value="si">
				NO<input type="checkbox" name="nov_amat" value="no">
				<legend>Novedades Profit</legend>
				SI<input type="checkbox" name="nov_profit" value="si">
				NO<input type="checkbox" name="nov_profit" value="no">
				<legend>Librería Amiga</legend>
				SI<input type="checkbox" name="amiga" value="si">
				NO<input type="checkbox" name="amiga" value="no">
				<legend>Tipo de depósito</legend>
				<select name="dep">
					<?php
					$rs3=$con->consultar('select tipo_deposito from datos group by tipo_deposito');
					while($rdo3=mysql_fetch_array($rs3)){
						echo '<option value="'.$rdo3["tipo_deposito"].'">'.$rdo3["tipo_deposito"].'</option>';
					}
					?>
				</select>
				<legend>Observaciones</legend>
				<textarea name="obs" cols="30" rows="10"></textarea>
				<input type="submit" value="Grabar">
			</form>
		</div>
			
	</div>
</div>
<?php
include('footer.php');
?>		