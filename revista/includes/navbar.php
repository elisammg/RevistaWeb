<?php  include(ROOT_PATH . '/admin/includes/user_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/topic_functions.php'); ?>
<?php  include(ROOT_PATH . '/comentarios/includes/comment_functions.php'); ?>

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
          $sql = "SELECT * FROM topics";
          $result = mysqli_query($conexion, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
              <!--?php 
                /*$usersusc = $_SESSION['users']['suscripcion'];
                $topicsusc = $row['premium'];
                  if ($usersusc == 1 && $topicsusc == 1 OR $topicsusc == 0) { */?-->
              <li>
                <!--Navegacion categorias -->
                 
                <a href="categoria.php?topics-slug=<?php echo $row['slug'];?>"><?=$row['name']?></a>
                <!--Navegacion subcategorias -->
                <ul class="menu">                  
                  <?php navcat($row["id"]); ?>                  
                </ul>
              </li>
              <!--?php 
                // } //end if de paga
              ?-->
        <?php
            } //end while
          } //end if
        ?>
        <?php if (isset($_SESSION['users'])) { ?>
          <li>         
            <div class="user-info">
              <li>
                <?php if($_SESSION['users']['role'] == "Admin" ){ ?>
                  <div class="logged_in_info">
                    <a href="admin.php"><span><?php echo $_SESSION['users']['username'] ?></span></a>
                  </div>
                <?php } elseif($_SESSION['users']['role'] == "Author" ){ ?>
                  <div class="logged_in_info">
                    <a href="autor.php"><span><?php echo $_SESSION['users']['username'] ?></span></a>
                  </div>
                <?php } elseif($_SESSION['users']['role'] == "Lector" ){ ?>
                  <div class="logged_in_info">
                    <a href="loggeado.php"><span><?php echo $_SESSION['users']['username'] ?></span></a>
                  </div>
                <?php } else { ?>
                  <div class="logged_in_info">
                    <a href="moderar.php"><span><?php echo $_SESSION['users']['username'] ?></span></a>
                  </div>
                <?php } ?>
              </li>
              <li>
                <div class="logged_in_info">
                  <a href="logout.php">LOGOUT</span></a>
                </div>
              </li> 
        <?php } else { ?>

        <?php } ?>


      </ul>
    </div>
  </div>
</div>
