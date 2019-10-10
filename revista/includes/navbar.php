<div class="top-bar foundation-5-top-bar">
  <div class="top-bar-title">
    <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
    </span>
    <strong>UNIS</strong>
  </div>
  <div id="responsive-menu">
    <div class="top-bar-left">
      <ul class="dropdown vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown" data-auto-height="true" data-animate-height="true">
        <li>
          <a href="categorias.php">DEPORTES</a>
          <ul class="menu">
            <li><a href="sub1.php">Natacion</a></li>
            <li><a href="sub2.php">Futbol</a></li>
          </ul>
        </li>
        <li>
          <a href="categorias.php">ENTRETENIMIENTO</a>
          <ul class="menu">
            <li><a href="sub2.php">Cine</a></li>
            <li><a href="sub1.php">Teatro</a></li>
          </ul>
        </li>
        <li>
          <a href="categorias.php">ALIMENTOS</a>
          <ul class="menu">
            <li><a href="sub1.php">Ensaladas</a></li>
            <li><a href="sub2.php">Pasteles</a></li>
          </ul>
        </li>
        <div class="user-info">

        <?php if (isset($_SESSION['username'])) { ?>
          <div class="logged_in_info">
            <span><a href="logout.php">LOGOUT</a></span>
          </div>
        <?php }else{ ?>
        
          <?php } ?>

	      </div>
      </ul>
    </div>
  </div>
</div>
