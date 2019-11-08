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
  <div class="large-4 medium-4 cell">
    <img src="<?php echo $mostrar['imagen'] ?>" alt="">
    <h4><?php echo $mostrar['titulo'] ?></h4>
    <p>Veces click <?php echo $mostrar['click'] ?></p>   

  </div>

  <?php 
		}

		 ?>   
<!--seleccionar anuncio para articulo-->
	<form action="admin.php" id="carform">
	  <label>Nombre de anuncio</label>
	  <input type="text" name="anuncio" required placeholder="Ingrese nombre de anuncio">
	  <label>Imagen anuncio</label>
	  <input type="text" name="imagen" placeholder="Ingrese url de imagen">
	  <input type="submit" class="button" name="este" value="Insertar">
	 
	  <input type="submit" class="button" name="borrar" value="Eliminar">
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
</div>
