<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  </head>
  <header>
    <nav class="top-bar" data-topbar>
    <ul class="title-area">
    <li class="name">
    <h1><a href="#">Resultado</a></h1>
    </li>
    <li class="toggle-topbar menu-icon">
    </li>
    </ul>
            <section class="top-bar-section">
            <ul class="left">
            <li>
            <a href="sub1.html">Deportes</a>
            </li>
            <li>
            <a href="sub2.html">Alimentos</a>
            </li>
            <li>
            <a href="sub1.html">Mascotas</a>
            </li>
            <li>
            <a href="sub1.html">Entretenimiento</a>
            </li>
            <li>
            <a href="sub1.html">Viajes</a>
            </li>
            </ul>
            <ul class="right">
            <li class="has-button">
            <a class="small button" href="search.html">Busqueda</a>
            </li>
            </ul>
            <ul class="right">
            <li class="has-button">
            <a class="small button" href="signup.html">Sign Up</a>
            </li>
            </ul>
            <ul class="right">
            <li class="has-button">
            <a class="small button" href="login.html">Login</a>
            </li>
            </ul>
            </section>
          </nav>
  </header>
  <body>

  <div class="row">
  <h2>Destacados</h2>
  <div class="large-3 small-6 columns">
    <?php foreach ($posts as $post): ?>
      <div class="post" style="margin-left: 0px;">
          <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
          
          <!-- Added this if statement... -->
          <?php if (isset($post['topic']['name'])): ?>
              <a 
                  href=""
                  class="btn category">
                  <?php echo $post['topic']['name'] ?>
              </a>
          <?php endif ?>

          <a href="">
              <div class="post_info">
                  <h3><?php echo $post['title'] ?></h3>
                  <div class="info">
                      <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                      <span><?php echo $post['username'] ?></span>
                  </div>
              </div>
          </a>
      </div>
    <?php endforeach ?>
  </div>
  
  </body>
  <footer>
    <div class="large-12 columns">
    <hr>
    <div class="row">
    <div class="large-6 columns">
    <p>© Copyright no one at all. Go to town.</p>
    </div>
    <div class="large-6 columns">
    <ul class="inline-list right">
    <li>
    <a href="#">Link 1</a>
    </li>
    <li>
    <a href="#">Link 2</a>
    </li>
    <li>
    <a href="#">Link 3</a>
    </li>
    <li>
    <a href="#">Link 4</a>
     </li>
    </ul>
    </div>
    </div>
    </div>
  </footer>
</html>
