<!--Este para admin-->
<h3>ANUNCIOS</h3>
<hr>
<div class="grid-x grid-padding-x">
	<?php 
		$sql="SELECT * FROM anuncios";
		$result=mysqli_query($conexion,$sql);
		while ($mostrar=mysqli_fetch_array($result)){
		?>
  <div class="large-4 medium-4 cell">
    <img src="<?php echo $mostrar['imagen'] ?>" alt="">
    <h4><?php echo $mostrar['titulo'] ?></h4>
    <p>Veces click <?php echo $mostrar['click'] ?></p>


    <form action="admin.php" method="post">
    	<!--hacer select de post y una cosa que despligue los post que hay para seleccionar en cual -->
    <label>Seleciona articulo para mostrar anuncio
        <select id="select" name="opcion" required>
        	<?php 
		$sql1="SELECT id, title FROM posts";
		$result1=mysqli_query($conexion,$sql1);
		while ($mostrar1=mysqli_fetch_array($result1)){
		?>
          <option value="<?php echo $mostrar1['id']?>" name="opcion"><?php echo $mostrar1['title'] ?></option>
         <?php 
		}

		 ?> 
        </select>
      </label>

    <input type="submit" class="button" value="Selecionar" name="este">
	</form>

  </div>
  <?php 
		}

		 ?>   
</div>

	



	       
