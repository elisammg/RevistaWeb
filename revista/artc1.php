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
              <p><?php echo $post['topic']['nombre']; ?></p>
              <span class="primary label">FREE</span>
            </div>
            <div class="large-6 medium-6 cell">
              <center><img src="<?php echo $post['user']['foto']; ?>"></center>
            </div>
          </div>
        </div>
          <p>
            <?php 
              if (strlen($post['body']) % 2 == 0) {//if lenhth is odd number
                $numWords = strlen($post['body']) / 2;
              } else {
                $numWords = (strlen($post['body']) + 1) / 2; //adjust length
              }
              for ($i = $numWords, $j = $numWords; $i > 0; $i--, $j++){ //check towards forward and backward for non-alphabet
                if (!ctype_alpha($post['body'][$i - 1])){ //forward
                  $point = $i; //break point
                  break;
                } else if (!ctype_alpha($post['body'][$j - 1])){ //backward
                  $point = $j; //break point
                  break;
                }
              }
              $string1 = substr($post['body'], 0, $point);
              $string2 = substr($post['body'], $point);
              
              echo $string1;
            ?>
            <hr>
            <h2>IMÁGENES DESTACADAS</h2>
            <div class="grid-x grid-padding-x">
              <div class="large-4 medium-4 cell">
                <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="Imagen 1">
              </div>
              <div class="large-4 medium-4 cell">
                <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="Imagen 2">
              </div>
              <div class="large-4 medium-4 cell">
                  <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="Imagen 3">
              </div>
            </div>
            <hr>
            <?php 
              echo $string2;
            ?>
          </p>
          <hr>
          </div>
        </div>
      </div>

        </div>
