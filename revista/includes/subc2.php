<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1><?php echo $subtopic['nombre'] ?></h1>
          <div class="callout">
          <q><?php echo $subtopic['slug'] ?></q>
          </div>
          <ul class="accordion" data-accordion>
       
          <?php
          $subtopicid = $subtopic['id'];
          $sql = "SELECT * FROM posts WHERE id_subtopic = $subtopicid AND published = 1"; 
          $result = mysqli_query($conexion, $sql);
          if (mysqli_num_rows($result) > 0)
          {
          while($row = mysqli_fetch_assoc($result))
          {
          ?>


          <li class="accordion-item" data-accordion-item>
          <a href="#" class="accordion-title"><?php echo $row['title'] ?></a>
          <div class="accordion-content" data-tab-content>
          <p><?php echo $row['slug'] ?></p>
          <a href="articulo.php?post-slug=<?php echo $row['slug'];?>" class="button">Leer mas</a>
          </div>
          </li>

          <?php
          } //end while
          } //end if
          ?>


        
      </ul>
        </div>
      </div>
    </div>
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="callout">
        <div class="large-12 cell">
          <div class="grid-x grid-padding-x">
            <div class="large-4 medium-4 cell">
              <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
            </div>
            <div class="large-4 medium-4 cell">
              <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
            </div>
            <div class="large-4 medium-4 cell">
              <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>


