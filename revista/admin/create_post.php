<?php  //include('../conexion.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/user_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/topic_functions.php'); ?>
<?php //include('includes/head_section.php'); ?>
<!-- Get all topics -->
<?php $subtopics = getAllTopics();	?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear post</title>
    <link rel="stylesheet" href="./css/foundation.css">
    <link rel="stylesheet" href="./css/app.css">
  </head>  
<header>
  <?php require_once('includes/navbar.php') ?>
</header>
<body>
<div class="action create-post-div">
          <h3>Crear nuevo articulo</h3>
            <form method="post" enctype="multipart/form-data" action="<?php echo 'autor.php'; ?>" >
              <!-- validation errors for the form -->
              <?php include(ROOT_PATH . '/admin/includes/errors.php') ?>

              <!-- if editing post, the id is required to identify that post -->
              <?php if ($isEditingPost === true): ?>
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
              <?php endif ?>

              <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
              <label style="float: left; margin: 5px auto 5px;">Featured image</label>
              <input type="file" name="featured_image" >
              <textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>
              <select name="topic_id">
                <option value="" selected disabled>Choose topic</option>
                <?php foreach ($topics as $topic): ?>
                  <option value="<?php echo $topic['id']; ?>">
                    <?php echo $topic['nombre']; ?>
                  </option>
                <?php endforeach ?>
              </select>

              <?php require_once('includes/templates.php') ?>
              
              <!-- if editing post, display the update button instead of create button -->
              <?php if ($isEditingPost === true): ?> 
                <button type="submit" class="btn" name="update_post">UPDATE</button>
              <?php else: ?>
                <button type="submit" class="btn" name="create_post">Save Post</button>
              <?php endif ?>

            </form>
          </div>
</body>
</html>
