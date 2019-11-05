    <br>
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1><?php echo $post['title']; ?></h1>
            <div class="callout">
            <div class="grid-x grid-padding-x">
              <div class="large-6 medium-6 cell">
              <p><?php echo $post['user']['nombre']; echo " "; echo $post['user']['apellido'];?></p>
              <p><?php echo $post['created_at']; ?></p>
              <p><?php echo $post['topic']; ?>Topic</p>
              <span class="primary label">FREE</span>
            </div>
            <div class="large-6 medium-6 cell">
              <center><img src="<?php echo $post['user']['foto']; ?>"></center>
            </div>
          </div>
        </div>

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
  
