<!--Este para que admin selecciones que anuncion en que pagina -->
<center>
<div class="grid-x grid-padding-x">
	<!--Se muestran los anuncios -->
	<?php 
		$sql="SELECT * FROM users WHERE role ='Author' ";
		$result=mysqli_query($conexion,$sql);
		while ($mostrar=mysqli_fetch_array($result)){
		?>
  <div class="large-4 medium-4 cell">
    <img src="<?php echo $mostrar['foto'] ?>" alt="">
    <ul>
    <li><b>Nombre:</b> <?php echo $mostrar['nombre'] ?> , <?php echo $mostrar['apellido'] ?></li>
    </ul>
  </div>

  <?php 
		}

		 ?>   
<!--seleccionar subcategoria para autor-->
<div class="large-12 medium-12 cell">
	<form action="admin.php" id="select"> 
		<hr>
		<h5 class="text-center">Selecciona Autor</h5>
	        
	        	<?php 
					$sql="SELECT id, nombre FROM users WHERE role = 'Author'";
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_array($result)){
					?>
	        	
	        		<input type="radio" name="pokemon" value="<?php echo $mostrar['id'];?>" id="pokemon<?php echo $mostrar['id'];?>">
	        		<label for="pokemon<?php echo $mostrar['id'];?>"><?php echo $mostrar['nombre'];?></label>
	        	
	        	 <?php 
					}

					 ?>
	       
	        <hr>
	 <input type="submit" class="button" value="Enviar" name="subcatautor">
	</form>
	<br>
	<select name="lista" form="select">

	<?php 
		$sql1s="SELECT id, nombre FROM subtopic";
		$result1s=mysqli_query($conexion,$sql1s);
		while ($mostrar1s=mysqli_fetch_array($result1s)){
		?>
	<option value="<?php echo $mostrar1s['id'] ?>"><?php echo $mostrar1s['nombre'] ?></option>
	    <?php 
		}

		?>
	</select>
</div>
</div>
</center>


