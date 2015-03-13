<?php
include('cabecera.php');
include('clases.php');
?>
		<div class="ink-container ink-vspace">
			<a href="#"><input type="button" value="Alta Texto"></a>
			<a href="#"><input type="button" value="Baja Texto"></a>
			<a href="#"><input type="button" value="Selección Textos"></a><br><br>
			<h4>Textos registrados</h4>
			<p>Para entrar en la ficha del texto pulsar sobre el título</p>
			<table border=1>
			<tr>
				<th>EAN</th>
				<th>Titulo</th>
				<th>Mercado</th>
			</tr>
				<?
				$con=new conexbd();
				$rs=$con->consultar('select * from textos');
				while($rdo=mysql_fetch_array($rs)){
					echo "<tr>";
					echo "<td>".$rdo["EAN"]."</td>";
					echo '<td><a href="#">'.$rdo["Titulo"].'</a></td>';
					echo "<td>".$rdo["mdo"]."</td>";
					echo "</tr>";
				}
				?>
			</table>
			
		</div>
<?php
include('footer.php');
?>		