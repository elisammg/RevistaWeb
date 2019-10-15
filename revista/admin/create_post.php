<?php  include('../conexion.php'); ?>
<?php  include('../includes/registrar_loggear.php'); ?>
<?php  include('includes/admin_functions.php'); ?>
<?php  include('includes/post_functions.php'); ?>
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
	<!-- admin navbar -->
	<?php// include('includes/navbar.php') ?>

	<div class="container content">
		<!-- Left side menu -->
		<?php //include('includes/menu.php') ?>

		<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
		<!-- Middle form - to create and edit  -->
		<div class="action create-post-div">
			<h1 class="page-title">Create/Edit Post</h1>
			<form method="post" enctype="multipart/form-data" action="<?php echo 'create_post.php'; ?>" >
				<!-- validation errors for the form -->
				<?php include('includes/errors.php') ?>

				<!-- if editing post, the id is required to identify that post -->
				<?php if ($isEditingPost === true): ?>
					<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<?php endif ?>

				<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
				<label>Featured image</label>
				<input type="file" name="featured_image" >
				<textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>
				<select name="subtopic_id">
					<option value="" selected disabled>Selecciona Subcategoria</option>
					<?php foreach ($subtopic as $subtopic): ?>
						<option value="<?php echo $subtopic['id']; ?>">
							<?php echo $subtopic['nombre']; ?>
						</option>
					<?php endforeach ?>
				</select>
				<?php require_once('includes/templates.php') ?>
				
				<!-- Only admin users can view publish input field -->
				<?php if ($_SESSION['users']['role'] == "Admin"): ?>
					<!-- display checkbox according to whether post has been published or not -->
					<?php if ($published == true): ?>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="publish" checked="checked">
						</label>
					<?php else: ?>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="publish">
						</label>
					<?php endif ?>
				<?php endif ?>
				
				<!-- if editing post, display the update button instead of create button -->
				<?php if ($isEditingPost === true): ?> 
					<button type="submit" class="btn" name="update_post">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_post">Save Post</button>
				<?php endif ?>

			</form>
		</div>

	</div>
</div>
</div>
		<!-- // Middle form - to create and edit -->
</div>


</body>
<footer>
    <?php require_once('includes/footer.php') ?>
  </footer>
</html>

<script>
	CKEDITOR.replace('body');
</script>