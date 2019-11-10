
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
          <h2>DESTACADOS</h2>
    </div>

     <?php
          $sql = "SELECT posts.title, posts.slug, posts.views, posts.slug, users.foto FROM posts INNER JOIN users ON posts.user_id = users.id WHERE destacado = 1 AND published = 1 ORDER BY `posts`.`created_at` DESC LIMIT 4";
          $resultado = mysqli_query($conexion, $sql);
          if (mysqli_num_rows($resultado)>0)
          {
              while($row = mysqli_fetch_assoc($resultado))
              {
            ?>
      <div class="large-3 cell">        
        <div class="callout">           
          <img src="<?=$row['foto']?>" alt="">
          <h2><?=$row['title']?></h2>
          <h3>AUTOR</h3>
          <p><?=$row['slug']?></p>
          <!--conteo de visitas -->
          <form action="articulo.php" method="get">
              <input type="hidden" name="post-slug" value="<?php echo $row['slug'];?>">
              <input type="submit" class="button" name="leer" value="Leer mas">
          </form>
         
        </div>
      </div>
       <?php
       } //end while
     }else{
      echo "no hay destacados";
     } //end if
       ?>
      </div>
    </div>
  </div>
  <hr>


