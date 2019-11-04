
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
          <h2>LOS MAS VISTOS</h2>
    </div>
     <?php
          $sql = "SELECT title, body, views, slug FROM `posts` ORDER BY `posts`.`views` DESC LIMIT 4";
          $resultado = mysqli_query($conexion, $sql);
          if (mysqli_num_rows($resultado)>0)
          {
              while($row = mysqli_fetch_assoc($resultado))
              {
            ?>
      <div class="large-3 cell">        
        <div class="callout">           
          <img src="https://image.freepik.com/foto-gratis/textura-rosada-plumas-como-fondo_36860-156.jpg" alt="">
          <h2><?=$row['title']?></h2>
          <h3>AUTOR</h3>
          <p><?=$row['body']?></p>
          <form action="includes/leermas.php" method="get">
          <input type="submit" class="button" name="leer" value="Leer mas">
          </form>
         
        </div>
      </div>
       <?php
       } //end while
     } //end if
       ?>
      </div>
    </div>
  </div>
  <hr>


