    <br>
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1><?php echo $post['title']; ?></h1>
          <?php if (isset($_SESSION['users'])) { ?>
            <div class="callout">
              <p><?php echo $post['user']['nombre']; echo " "; echo $post['user']['apellido'];?></p>
              <p><?php echo $post['created_at']; ?></p>
              <p><?php echo $post['topic']['nombre']; ?></p>
              <span class="primary label">FREE</span>
            </div>
          <?php } ?>

          <?php 
            if($post['published'] == false){ ?>
              <h2 class="post-title">Sorry... This post has not been published</h2>
            <?php }else { ?>
              <p>
                <?php echo $post['body']; ?>
                <hr>
                <h2>IMÁGENES DESTACADAS</h2>
                <div class="grid-x grid-padding-x">
                  <div class="large-4 medium-4 cell">
                    <img src="<?php 'data:static/images;base64,' . base64_encode($post['image']); ?>" alt="Imagen 1">
                  </div>
                  <div class="large-4 medium-4 cell">
                    <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="Imagen 2">
                  </div>
                  <div class="large-4 medium-4 cell">
                      <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="Imagen 3">
                  </div>
                </div>
                <hr>
              </p>
            <?php } ?>
          <hr>
          </div>
        </div>
      </div>

        </div>
