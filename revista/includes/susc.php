<?php include('conexion.php'); ?>
<div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <h1>SUSCRIPCIONES</h1>       	
        </div>
	</div>
	<table>
		<tr>
			<td>Tipo</td>
			<td>Descripcion</td>
			<td>Costo</td>
			<td>Seleccionar</td>
		</tr>
		<?php 
		$sql="SELECT * FROM suscripcion";
		$result=mysqli_query($conexion,$sql);
		while ($mostrar=mysqli_fetch_array($result)){
		?>
		<tr>
			<td><?php echo $mostrar['tipo'] ?></td>
			<td><?php echo $mostrar['descripcion'] ?></td>
			<td><?php echo $mostrar['costo'] ?></td>
			<td><input type="submit" value="Seleccionar" name="Select"></td>
		</tr>
		<?php 
		}

		 ?>
	</table>	
 </div>