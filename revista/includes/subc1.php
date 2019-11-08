

<div class="grid-container">
      <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <h1><?php echo $subtopic['nombre'] ?></h1>
          <div class="callout">
          <p><?php echo $subtopic['slug'] ?></p>
          </div>
         <div class="grid-x grid-padding-x">
              <div class="large-6 medium-6 cell">
                <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg">
              </div>
          <!--Esto se repite -->
                  <?php
                  $subtopicid = $subtopic['id'];
                  $sql = "SELECT * FROM posts WHERE id_subtopic = $subtopicid AND published = 1"; 
                  $result = mysqli_query($conexion, $sql);
                  if (mysqli_num_rows($result) > 0)
                  {
                  while($row = mysqli_fetch_assoc($result))
                  {
                  ?>
                  
                  
                  <div class="large-6 medium-6 cell">
                  <hr>
                  <div class="callout">
                  <h3><?php echo $row['title'] ?></h3>
                  <p>
                  <?php echo $row['slug'] ?>
                  </p>
                  <!--conteo de visitas -->
          <form action="articulo.php" method="get">
              <input type="hidden" name="post-slug" value="<?php echo $row['slug'];?>">
              <input type="submit" class="button" name="leer" value="Leer mas">
          </form>
                  </div>
                  <hr>
                  <!--Esto se repite -->
                  </div>
                  <?php
                  } //end while
                  } //end if
                  ?>
          <!--Esto se repite -->
              </div>
            </div>
        </div>
      </div>
    </div>
<hr>



