<!--Este para que admin selecciones que anuncion en que pagina -->
<h3>ANUNCIOS</h3>
<hr>
<div class="grid-x grid-padding-x">
	<!--Se muestran los anuncios -->
	<?php 
		$sql="SELECT * FROM anuncios";
		$result=mysqli_query($conexion,$sql);
		while ($mostrar=mysqli_fetch_array($result)){
		?>
  <div class="large-3 medium-3 cell">
  	<div class="success callout">
    <img src="<?php echo $mostrar['imagen'] ?>" alt="">
    <p><?php echo $mostrar['titulo'] ?></p>  
    </div>
  </div>

  <?php 
		}

		 ?>   
<!--seleccionar anuncio para articulo-->
	<form action="admin.php" id="carform">
	  <label>Nombre anuncio nuevo/eliminar</label>
	  <input type="text" name="anuncio" placeholder="Ingrese nombre de anuncio">
	  <label>Imagen anuncio</label>
	  <input type="text" name="imagen" placeholder="Ingrese url de imagen">
	  <label>Seleccionar anuncio</label>
	 <?php 
		$sqlsql="SELECT id, titulo FROM anuncios";
		$resultsql=mysqli_query($conexion,$sql);
		while ($mostrarsql=mysqli_fetch_array($resultsql)){
		?>
	
		<input type="radio" name="pokemon1" value="<?php echo $mostrarsql['id'];?>" id="pokemon<?php echo $mostrarsql['id'];?>">
		<label for="pokemon<?php echo $mostrarsql['id'];?>"><?php echo $mostrarsql['titulo'];?></label>
	
	 <?php 
		}

		 ?>
		 <hr>
	  <input type="submit" class="button" name="nuevoanuncio" value="Insertar Nuevo">	 
	  <input type="submit" class="button" name="borraranuncio" value="Eliminar">
	  <input type="submit" class="button" name="esteanuncio" value="Seleccionar para post">
	</form>
	<br>

	<select name="carlist" form="carform">

	<?php 
		$sql1="SELECT id, title FROM posts";
		$result1=mysqli_query($conexion,$sql1);
		while ($mostrar1=mysqli_fetch_array($result1)){
		?>
	<option value="<?php echo $mostrar1['id'] ?>"><?php echo $mostrar1['title'] ?></option>
	    <?php 
		}

		?>
</select>
<h6>Reporte de Anuncios</h6>
	<table>
		<tr>
			<th>Anuncio</th>
			<th>Articulo</th>
			<th>Veces visto</th>
		</tr>
		<?php 
		$sqlanuncio="SELECT posts.title, anuncios.titulo,  postanuncio.click FROM postanuncio 
		INNER JOIN posts ON postanuncio.id_post = posts.id INNER JOIN anuncios ON postanuncio.id_anuncio = anuncios.id;";
		$resultanuncio=mysqli_query($conexion,$sqlanuncio);
		while ($mostraranuncio=mysqli_fetch_array($resultanuncio)){
		?>
		<tr>
			<td><?php echo $mostraranuncio['titulo'] ?></td>
			<td><?php echo $mostraranuncio['title'] ?></td>
			<td><?php echo $mostraranuncio['click'] ?></td>
		</tr>

	      <?php 
		}

		 ?>  
				 
	</table>
</div>

