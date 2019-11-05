<!-- Get all admin posts from DB -->
<?php $posts = getAllPosts(); ?>
<?php $drafts = getAllDrafts(); ?>
	<title>Admin | Manage Posts</title>
</head>
<body>
	<!-- admin navbar -->
	<?php //include('includes/navbar.php') ?>

	<div class="container content">
		<!-- Display records from DB-->
		<div class="table-div"  style="width: 100%;">
			<!-- Display notification message -->
			<?php include('includes/messages.php') ?>

			<?php if (empty($posts) && empty($drafts)){ ?>
				<h1 style="text-align: center; margin-top: 20px;">No hay artículos ni drafts creados.</h1>
			<?php } else { ?>
				<!-- Mostrará los artículos en la tabla posts -->
				<h3>Artículos publicados</h3>
					<?php if (empty($posts)){ ?>
						<h2 style="text-align: center; margin-top: 20px;">No hay artículos publicados.</h2>
					<?php } else { ?>
						<table class="table">
								<thead>
								<th>N</th>
								<th>Author</th>
								<th>Title</th>
								<th>Views</th>
								<th>Estado</th>
								<!-- Solo Moderador puede decidir no publicar artículo -->
								<?php if ($_SESSION['users']['role'] == "Moderador"){ ?>
									<th>Unpublish</th>
								<?php } ?>
								<th>Acción</th>
							</thead>
							<tbody>
							<?php foreach ($posts as $key => $post){ ?>
								<tr>
									<td><?php echo $key + 1; ?></td>
									<td><?php echo $post['author']; ?></td>
									<td>
										<a 	target="_blank"
										href="<?php echo BASE_URL . 'articulo.php?post-slug=' . $post['slug'] ?>">
											<?php echo $post['title']; ?>	
										</a>
									</td>
									<td><?php echo $post['views']; ?></td>
									
									<!-- Solo Moderador puede publicar/no publicar artículos -->
									<?php if ($_SESSION['users']['role'] == "Author" ){ ?>
										<td>
										<?php if ($post['published'] == true){ ?>
											<span>Publicado</span>
										<?php }else { ?>
											<span>No publicado</span>
										<?php } ?>
										</td>
									<?php } else if($_SESSION['users']['role'] == "Moderador" ){ ?>
										<td>
										<?php if ($post['published'] == true){ ?>
											<span>Publicado<span>
										<?php } else { ?>
											<a class="button"
												href="autor.php?publicar-post=<?php echo $post['id'] ?>">Publicar
											</a>
										<?php } ?>
										</td>
										<td>
											<a class="button"
												href="autor.php?no-publicar-post=<?php echo $post['id'] ?>">No Publicar
											</a>
										</td>
									<?php } ?>

									<td>
										<a class="buton"
											href="autor.php?edit-post=<?php echo $post['id'] ?>">Editar
										</a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					<?php } ?>
				<!-- Final tabla publicados -->

				<!-- Mostrará los artículos en la tabla draft -->
				<h3>Artículos en draft</h3>
					<?php if (empty($drafts)){ ?>
						<h2 style="text-align: center; margin-top: 20px;">No hay drafts creados.</h2>
					<?php } else { ?>
						<table class="table">
								<thead>
								<th>N</th>
								<th>Author</th>
								<th>Title</th>
								<th>Views</th>
								<th>Estado</th>
								<!-- Solo Moderador puede decidir no publicar artículo -->
								<?php if ($_SESSION['users']['role'] == "Moderador"){ ?>
									<th>Unpublish</th>
								<?php } ?>
								<th>Acción</th>
							</thead>
							<tbody>
							<?php foreach ($drafts as $key => $draft): ?>
								<tr>
									<td><?php echo $key + 1; ?></td>
									<td><?php echo $draft['author']; ?></td>
									<td>
										<a 	target="_blank"
										href="<?php echo BASE_URL . 'articulo.php?post-slug=' . $draft['slug'] ?>">
											<?php echo $draft['title']; ?>	
										</a>
									</td>
									<td><?php echo $draft['views']; ?></td>
									
									
									<?php if ($_SESSION['users']['role'] == "Author" ){ ?>
										<td>
											<?php if ($draft['revision'] == true){ ?>
												<span>En espera...</span>
											<?php }else { ?>
												<a class="button"
													href="autor.php?revisar=<?php echo $draft['id'] ?>">Publicar
												</a>
											<?php } ?>
										</td>
									<?php } if($_SESSION['users']['role'] == "Moderador" ): ?>
										<td>
											<?php if ($draft['published'] == true): ?>
												<span>Publicado<span>
											<?php else: ?>
												<a class="button"
													href="autor.php?publicar-draft=<?php echo $draft['id'] ?>">Publicar
												</a>
											<?php endif ?>
										</td>
										<td>
											<a class="button"
												href="autor.php?no-publicar-draft=<?php echo $draft['id'] ?>">No Publicar
											</a>
										</td>
									<?php endif ?>

									<td>
										<a class="buton"
											href="admin/create_post.php?edit-draft=<?php echo $draft['id'] ?>">Editar
										</a>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>
						</table>
					<?php } ?>
				<!-- Final tabla draft -->
			<?php } ?>
			<a class="button"
				href="admin/create_post.php">Crear Nuevo artículo
			</a>
		</div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>