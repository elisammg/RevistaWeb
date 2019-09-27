<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <h1><a href="#">Home</a></h1>
    </li>
    <li class="toggle-topbar menu-icon">
    </li>
    </ul>
            <section class="top-bar-section">
            <ul class="left">
            <li>
            <a href="pages/sub1.html">Deportes</a>
            </li>
            <li>
            <a href="pages/sub2.html">Alimentos</a>
            </li>
            <li>
            <a href="pages/sub1.html">Mascotas</a>
            </li>
            <li>
            <a href="pages/sub1.html">Entretenimiento</a>
            </li>
            <li>
            <a href="pages/sub1.html">Viajes</a>
            </li>
            </ul>
            <ul class="right">
            <li class="has-button">
            <a class="small button" href="pages/search.html">Busqueda</a>
            </li>
            </ul>
            <ul class="right">
            <li class="has-button">
            <a class="small button" href="pages/signup.html">Sign Up</a>
            </li>
            </ul>
            <ul class="right">
            <li class="has-button">
            <a class="small button" href="pages/login.html">Login</a>
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
        <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
          <div class="post_info">
            <h3><?php echo $post['title'] ?></h3>
            <div class="info">
              <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
              <span class="read_more">Read more...</span>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach ?>

    <img src="https://images.ctfassets.net/ooa29xqb8tix/27MAsquoEoIIayoYkkmsuI/891876a6e0c917fc884fe58ec9ce55ed/5K_Wallpaper_14.png">
    <h5 class="panel">Título</h5>
    <p class="panel">Resumen</p>
    <div class="row column">
    <a href="pages/artc1.html">
    <div class="panel callout radius">
    <h6>Ver</h6>
  </div>
</div>
  </div>
  <div class="large-3 small-6 columns">
    <img src="https://images.ctfassets.net/ooa29xqb8tix/27MAsquoEoIIayoYkkmsuI/891876a6e0c917fc884fe58ec9ce55ed/5K_Wallpaper_14.png">
    <h5 class="panel">Título</h5>
    <p class="panel">Resumen</p>
    <div class="row column">
    <a href="pages/artc2.html">
    <div class="panel callout radius">
    <h6>Ver</h6>
  </div>
</div>
  </div>
  <div class="large-3 small-6 columns">
    <img src="https://images.ctfassets.net/ooa29xqb8tix/27MAsquoEoIIayoYkkmsuI/891876a6e0c917fc884fe58ec9ce55ed/5K_Wallpaper_14.png">
    <h5 class="panel">Título</h5>
    <p class="panel">Resumen</p>
    <div class="row column">
    <a href="pages/artc3.html">
    <div class="panel callout radius">
    <h6>Ver</h6>
  </div>
  </div>
  </div>
  <div class="large-3 small-6 columns">
    <img src="https://images.ctfassets.net/ooa29xqb8tix/27MAsquoEoIIayoYkkmsuI/891876a6e0c917fc884fe58ec9ce55ed/5K_Wallpaper_14.png">
    <h5 class="panel">Título</h5>
    <p class="panel">Resumen</p>
    <div class="row column">
    <a href="pages/artc2.html">
    <div class="panel callout radius">
    <h6>Ver</h6>
  </div>
</div>
  </div>
</div>

<div class="row">
  <h2>Recientes</h2>
  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>

  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>

  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>

  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>

  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>

  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>

  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>

  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>

  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>

  <div class="card-info info">
    <div class="card-info-label">
      <div class="card-info-label-text">
        FYI
      </div>
    </div>
    <div class="card-info-content">
      <h3 class="lead">Chappie</h3>
      <p>In the near future, crime is patrolled by a mechanized police force. When one police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.</p>
    </div>
  </div>




</body>
<footer class="row">
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


    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
    <script>
          $(document).foundation();
        </script>

</html>
