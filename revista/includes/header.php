<div class="subnav-hero-section">
  <h1 class="subnav-hero-headline">REVISTA WEB<small>UNIS</small></h1>
  <ul class="subnav-hero-subnav">
  	<li><a href="index.php">Inicio</a></li>
    <li>
      <a data-open="exampleModal1" >Ingresar</a>
      <div class="reveal" id="exampleModal1" data-reveal>
        <h1>Log in</h1>
        <div class="lead">
          <?php require_once('ingresar.php') ?>
        </div>
        <button class="close-button" data-close aria-label="Close reveal" type="button">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </li>

    <li><a data-open="exampleModal2">Registrarse</a>
      <div class="reveal" id="exampleModal2" data-reveal>
        <h1>Sign up</h1>
        <div class="lead">
          <?php require_once('signup.php') ?>
        </div>
        <button class="close-button" data-close aria-label="Close reveal" type="button">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </li>
    
    <li><a data-open="exampleModal3">Buscar</a>
      <div class="reveal" id="exampleModal3" data-reveal>
        <h1>Buscar</h1>
        <div class="lead">
          <?php require_once('search.php') ?>
        </div>
        <button class="close-button" data-close aria-label="Close reveal" type="button">
          <span aria-hidden="true">&times;</span>
        </button>
      </div></li>
  </ul>
</div>
