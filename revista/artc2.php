 <?php 
$usersusc = $_SESSION['users']['suscripcion'];
$postsusc = $post['premium'];
if ($usersusc == 1 && $postsusc == 1 OR $postsusc == 0) {
?>
    <br>
<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <div class="large-4 cell">
      <h1><?php echo $post['title']; ?></h1>
      <p class="full-width-testimonial-source"><?php echo $post['user']['nombre']; echo " "; echo $post['user']['apellido'];?></p>
      <span class="full-width-testimonial-source-context"><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
      <br>
      <img src="<?php echo $post['user']['foto']; ?>">
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
    <div class="large-8 cell">
      <div class="full-width-testimonial">
  <div class="full-width-testimonial-section">
    <div class="full-width-testimonial-icon text-center">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="41px" height="34px" viewBox="-235 240 41 34" style="enable-background:new -235 240 41 34;" xml:space="preserve">
          <path class="quote-path" d="M-231.3,260.4c0-5,1.3-8.8,3.7-11.7c2.4-2.8,6-4.6,10.5-5.5v5c-3.5,1-6,2.8-7.1,5.5c-0.7,1.4-0.9,2.8-0.8,4
            h8.1v12.8h-14.4V260.4z"/>
          <path class="quote-path" d="M-212,260.4c0-5,1.3-8.8,3.7-11.7c2.4-2.8,6-4.6,10.5-5.5v5c-3.5,1-6,2.8-7.1,5.5c-0.7,1.4-0.9,2.8-0.8,4h8.1
            v12.8H-212V260.4z"/>
      </svg>
    </div>
    <div class="full-width-testimonial-content">
      <h5 class="full-width-testimonial-text">RESUMEN ARTÍCULO</h5>
    </div>
  </div>
</div>
    </div>
    </div>
  </div>
<hr>
<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <div class="large-8 cell">
      <div class="callout">
          <div class="grid-container">
          <div class="grid-x grid-padding-x">
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
            ?>
            <p>
              <?php
                echo $string1;
              ?>
            </p>
          </div>
          </div>
      </div>
    </div>
    <div class="large-4 cell">
      <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" alt="">
    </div>
  </div>
</div>
<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <div class="large-4 cell">
      <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
      <h4>Titulo imagen</h4>
      <label>Descripcion</label>
    </div>
    <div class="large-8 cell">
      <div class="callout">
          <div class="grid-container">
          <div class="grid-x grid-padding-x">
            <p>
              <?php
                echo $string2;
              ?>
            </p>
          </div>
          </div>
      </div>
    </div>
  </div>
  <hr>
</div>
<?php 
    }else{
      echo "articulo solo de paga, adquiere suscripcion para poder ver articulo";
    }
?>

