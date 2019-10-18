
<div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <h1>SUSCRIPCIONES</h1>       	
        </div>
	</div>
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
	<table>
		<tr>
			<th>Numero</th>
			<th>Tipo</th>
			<th>Descripcion</th>
			<th>Costo</th>
		</tr>
		<?php 
		$sql="SELECT * FROM suscripcion";
		$result=mysqli_query($conexion,$sql);
		while ($mostrar=mysqli_fetch_array($result)){
		?>
		<tr>
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['tipo'] ?></td>
			<td><?php echo $mostrar['descripcion'] ?></td>
			<td>Q<?php echo $mostrar['costo'] ?></td>
		</tr>
		<?php 
		}

		 ?>		 
	</table>

	
     <div class="grid-x grid-padding-x">
          <div class="large-12 cell">
	      	<div class="callout">
<form class="log-in-form" action="suscripcion.php" method="post" enctype="multipart/form-data">
	        <h5 class="text-center">Selecciona suscripcion</h5>
	        <ul>
	        	<li>
	        		<input type="radio" name="pokemon" value="1" id="pokemon1"><label for="pokemon1">Semestral</label>
	        	</li>
	        	<li>
	        		<input type="radio" name="pokemon" value="2" id="pokemon2"><label for="pokemon2">Anual</label>
	        	</li>
	        	<li>
	        		<input type="radio" name="pokemon" value="3" id="pokemon3"><label for="pokemon3">Mensual</label>
	        	</li>
	        </ul>	      

		  <h5 class="text-center">Datos de cobro</h5>
		  <label for="notarjeta">No. de Tarjeta</label>
		    <input type="numero" name="notarjeta" required placeholder="Ingrese No. de Tarjeta">

		  <label for="fecha">Fecha de vencimiento</label>
		    <input type="numero" name="fecha" required placeholder="Ingrese Fecha de Vencimiento">

		  <label for="tres">Tres digitos lateral</label>
		    <input type="numero" name="tres" required placeholder="Ingrese los tres digitos de la parte lateral">
	      <label for="submit">Ingresar datos</label>
	 <input type="submit" value="Enviar" name="enviar">
	    </form>
	      </div>
	  </div>
	</div>
</div>
</div>
</div>         
 <hr>
  


	


