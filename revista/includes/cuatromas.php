
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
          <h2>LOS MAS VISTOS</h2>
    </div>
     <?php
          $sql = "SELECT posts.title, posts.body, posts.views, posts.slug, users.foto FROM posts INNER JOIN users ON posts.user_id = users.id WHERE published = 1 ORDER BY `posts`.`views` DESC LIMIT 4";
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
          <p><?=$row['body']?></p>
          <!--conteo de visitas -->
          <form action="articulo.php" method="get">
              <input type="hidden" name="post-slug" value="<?php echo $row['slug'];?>">
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


