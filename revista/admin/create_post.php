<?php include('../conexion.php'); ?>
<?php include(ROOT_PATH . '/includes/registrar_loggear.php'); ?>
<?php include(ROOT_PATH . '/includes/public_functions.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTOR</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="../css/app.css">
  </head>
  <header>
    <?php require_once('../includes/navbar.php') ?>
    <!-- Get all subtopics -->
    <?php $subtopics = getAllSubtopics();	?>
    <?php //$posts = getAllPosts(); ?>
  </header>
  <body>
    <!--crear articulo -->
    <div class="large-12 cell">
      <div class="callout">
        <div class="action create-post-div">
          <h3>Crear nuevo articulo</h3>
          <form method="post" enctype="multipart/form-data" action="<?php echo 'create_post.php'; ?>" >
            <!-- validation errors for the form -->
            <?php include(ROOT_PATH . '/admin/includes/errors.php') ?>

            <!-- if editing post, the id is required to identify that post -->
            <?php if ($isEditingPost == true): ?>
              <?php if ($_SESSION['users']['role'] == 'Moderador'){ ?>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
              <?php } ?>
            <?php elseif ($isEditingDraft == true): ?>
              <input type="hidden" name="draft_id" value="<?php echo $draft_id; ?>">
            <?php endif ?>
            
            <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
            <label style="float: left; margin: 5px auto 5px;">Featured image</label>
            <input type="file" name="featured_image" >
            <textarea name="body" id="body" cols="30" rows="5"><?php echo $body; ?></textarea>
           
            <!--subcategorias -->
            <select name="topic_id">
              <option value="" selected disabled>Choose topic</option>
              <?php 
                $userid = $_SESSION['users']['id'];
                  $sql1w="SELECT users.role roll, users.nombre , subtopic.id subid, subtopic.nombre subtopic, subautor.id FROM subautor
                  INNER JOIN subtopic ON subtopic.id = subautor.id_subtopic 
                  INNER JOIN users ON users.id = subautor.id_user WHERE role = 'Author' and users.id = '$userid'";
                  $result1w = mysqli_query($conexion,$sql1w);
                  while ($mostrar1w = mysqli_fetch_array($result1w)){ ?>
                    <option value="<?php echo $mostrar1w['subid'] ?>"><?php echo $mostrar1w['subtopic'] ?></option>
                  <?php } ?>
            </select>

            <?php require_once('../templates.php') ?>

              <!-- display checkbox according to whether post has been published or not -->
              <?php if ($published == true || $checked == true): ?>
                <label for="publish">
                  Publish
                  <input type="checkbox" value="1" name="publish" checked="checked">&nbsp;
                </label>
              <?php else: ?>
                <label for="publish">
                  Publish
                  <input type="checkbox" value="1" name="publish">&nbsp;
                </label>
              <?php endif ?>

            <!-- if editing post, display the update button instead of create button -->
            <?php if ($isEditingDraft == true): ?> 
              <button type="submit" class="button" name="update_post">Update</button>
            <?php else: ?>
              <button type="submit" class="button" name="create_post">Save Post</button>
            <?php endif ?>
          </form>
        </div>
      </div>
    </div>
  </body>

	<script src="../js/vendor/jquery.js"></script>
    <script src="../js/vendor/what-input.js"></script>
    <script src="../js/vendor/foundation.js"></script>
    <script src="../js/app.js"></script>
  </body>
  <footer>
  	<?php require_once('includes/footer.php') ?>
  </footer>
</html>