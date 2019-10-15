<?php include('conexion.php') ?>
<div class="top-bar foundation-5-top-bar">
  <div class="top-bar-title">
    <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
    </span>
    <a href="index.php">UNIS</a>
  </div>
  <div id="responsive-menu">
    <div class="top-bar-left">
      <ul class="dropdown vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown" data-auto-height="true" data-animate-height="true">
    <?php 
    $sql = "SELECT name FROM mydb.topics";
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result))
    {
     ?>
        <li>
          <a href="categorias.php"><?=$row['name']?></a>
          <ul class="menu">
            <li><a href="sub1.php"> </a></li>
          </ul>
        </li>
        <?php 
       } //end while
     } //end if
       ?>
       <li>
        <div class="user-info">

        <?php if (isset($_SESSION['users'])) { ?>
          <div class="logged_in_info">
            <span><a href="logout.php">LOGOUT</a></span>
          </div>
        <?php }else{ ?>

          <?php } ?>

	      </div>
        </li>
      </ul>
    </div>
  </div>
</div>