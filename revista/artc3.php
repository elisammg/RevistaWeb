
<br>
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-4 cell">
      <h1><?php echo $post['title']; ?></h1>
      </div>
      <div class="large-4 cell">
        <h3><?php echo $post['user']['nombre']; echo " "; echo $post['user']['apellido'];?></h3>
        <p><?php echo $post['created_at']; ?></p>
        <span class="success label"><?php echo $post['topic']['nombre']; ?></span>
              <span class="primary label">
                <?php 
                if ($post['premium'] == 0) {
                  echo "Free";
                }else{
                  echo "Premium";
                }
                 ?>
              </span>
      </div>
      <div class="large-4 cell">
      <h1><img src="<?php echo $post['user']['foto']; ?>"></h1>
      </div>
    </div>
  </div>
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <div class="callout">
      <p>Resumen</p>
      </div>
      </div>
    </div>
  </div>
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-8 cell">
        <div class="news-image-gallery-container">
  <div class="row">
    <div class="small-12 medium-12 large-8 columns">
      <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
        <ul class="orbit-container">
          <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
          <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
          <li class="is-active orbit-slide">
            <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" alt="Space">
            <figcaption class="orbit-caption">Space, the final frontier.</figcaption>
          </li>
          <li class="orbit-slide">
            <img class="orbit-image" src="//i.imgur.com/V7zk0Y3.jpg" alt="Space">
            <figcaption class="orbit-caption">Lets Rocket!</figcaption>
          </li>
          <li class="orbit-slide">
            <img class="orbit-image" src="//i.imgur.com/vivEvd0.jpg" alt="Space">
            <figcaption class="orbit-caption">Encapsulating</figcaption>
          </li>
          <li class="orbit-slide">
            <img class="orbit-image" src="//i.imgur.com/VKdPzTp.jpg" alt="Space">
            <figcaption class="orbit-caption">Outta This World</figcaption>
          </li>
        </ul>
        <nav class="orbit-bullets">
          <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
          <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
          <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
          <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
        </nav>
      </div>
    </div>
  </div>
</div>
 </div>
    <div class="large-4">
      <div class="callout">
        <?php 
          $numWords = strlen($post['body']);
          $first = intval($numWords * (35/100));
          $second = intval($numWords * (65/100));

          $first_part=substr($post['body'],0,850);
          $second_part=substr($post['body'], 850, strlen($post['body']));
        ?>
        <p>
        <?php
          echo $first_part;
        ?>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <div class="callout">
          <p>
            <?php
              echo $second_part;
            ?>
          </p>
      </div>
      </div>
    </div>
    <hr> 
  </div>
