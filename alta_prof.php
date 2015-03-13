<?php
include('cabecera.php');
include('clases.php');
?>
<div class="ink-container ink-vspace">
	<div class="ink-vspace">
		
		<div class="ink-row">
			<div class="ink-l33 ink-m50">
				<div class="ink-gutter">
					<h4>Alta datos básicos</h4>
					<form action="" method="post" name="basics">
						<legend>Nombre</legend>
						<input type="text" name="nom">
						<legend>Apellidos</legend>
						<input type="text" name="ap">
						<legend>Teléfono</legend>
						<input type="text" name="tel">
						<legend>Email</legend>
						<input type="text" name="mail">
						<legend>Cargo</legend>
						<input type="text" name="car"><br><br>
						<input type="submit" value="Grabar">
					</form>
				</div>
			</div>
			<div class="ink-l33 ink-m50">
				<div class="ink-gutter">
					<h4>Selecciona el centro</h4>
					<p>Aqui listado de centros para seleccionar el centro en el que esta el profesor a dar de alta</p>
				</div>
			</div>
			<div class="ink-l33 ink-m100 ink-for-l ink-for-s">
				<div class="ink-gutter">
					<h4>Selecciona las enseñanzas</h4>
					<p>Aqui listado de enseñanzas del centro en las que imparte clases el profesor a dar de alta</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include('footer.php');
?>		