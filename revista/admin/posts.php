<!-- Get all admin posts from DB -->
<?php $posts = getAllPosts(); ?>
<?php $drafts = getAllDrafts(); ?>
	<title>Admin | Manage Posts</title>
</head>
<body>
	<!-- admin navbar -->
	<?php //include('includes/navbar.php') ?>

	<div class="grid-container">
		<!-- Display records from DB-->
		<div class="grid-x grid-padding-x">

			<?php if (empty($posts) && empty($drafts)){ ?>
				<h1 style="text-align: center; margin-top: 200px;">No hay artículos ni drafts creados.</h1>
			<?php } else { ?>
				<!-- Mostrará los artículos en la tabla posts -->
				<h1>Artículos publicados</h1>
					<?php if (empty($posts)){ ?>
						<h2 style="text-align: center; margin-top: 20px;">No hay artículos publicados.</h2>
					<?php } else { ?>
						<div class="large-12 cell">
							<div class="large-12">
								<table align="center" cellpadding="1" cellspacing="1">
										<thead>
										<th width="100" align="center">N</th >
										<th width="100" align="center">Author</th>
										<th width="100" align="center">Title</th>
										<th width="100" align="center">Views</th>
										<th width="100" align="center">Estado</th>
										<!-- Solo Moderador puede decidir no publicar artículo -->
										<?php if ($_SESSION['users']['role'] == "Moderador"){ ?>
											<th width="100" align="center">Unpublish</th>
										<?php } ?>
										<th width="100" align="center">Acción</th>
									</thead>
									<tbody>
									<?php foreach ($posts as $key => $post){ ?>
										<tr>
											<td ><?php echo $key + 1; ?></td>
											<td ><?php echo $post['author']; ?></td>
											<td >
												<a 	target="_blank"
												href="<?php echo BASE_URL . 'articulo.php?post-slug=' . $post['id'] . '&leer=Leer+mas'?>">
													<?php echo $post['title']; ?>	
												</a>
											</td>
											<td ><?php echo $post['views']; ?></td>
											
											<!-- Solo Moderador puede publicar/no publicar artículos -->
											<?php if ($_SESSION['users']['role'] == "Author" ){ ?>
												<td >
												<?php if ($post['published'] == true){ ?>
													<span>Publicado</span>
												<?php }else { ?>
													<span>No publicado</span>
												<?php } ?>
												</td>
											<?php } else if($_SESSION['users']['role'] == "Moderador" ){ ?>
												<td >
												<?php if ($post['published'] == true){ ?>
													<span>Publicado<span>
												<?php } else { ?>
													<a href="modarticulo.php?publicar-post=<?php echo $post['id'] ?>">Publicar</a>
												<?php } ?>
												</td>
												<td >
													<a href="modarticulo.php?no-publicar-post=<?php echo $post['id'] ?>">No Publicar</a>
												</td>
											<?php } ?>

											<td >
												<a href="admin/create_post.php?edit-post=<?php echo $post['id'] ?>">Editar</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					<?php } ?>
				<!-- Final tabla publicados -->

				<!-- Mostrará los artículos en la tabla draft -->
				<h1>Artículos en draft</h1>
					<?php if (empty($drafts)){ ?>
						<h2 style="text-align: center; margin-top: 200px;">No hay drafts creados.</h2>
					<?php } else { ?>
						<div class="large-12 cell">
							<div class="large-12">
								<table align="center" cellpadding="1" cellspacing="1">
										<thead>
										<th width="100" align="center">N</th>
										<th width="100" align="center">Author</th>
										<th width="100" align="center">Title</th>
										<th width="100" align="center">Views</th>
										<th width="100" align="center">Estado</th>
										<!-- Solo Moderador puede decidir no publicar artículo -->
										<?php if ($_SESSION['users']['role'] == "Moderador"){ ?>
											<th width="100" align="center">Unpublish</th>
										<?php } ?>
										<th width="100" align="center">Acción</th>
									</thead>
									<tbody>
									<?php foreach ($drafts as $key => $draft): ?>
										<tr>
											<td><?php echo $key + 1; ?></td>
											<td><?php echo $draft['author']; ?></td>
											<td>
												<?php echo $draft['title']; ?>
											</td>
											<td><?php echo $draft['views']; ?></td>
											
											
											<?php if ($_SESSION['users']['role'] == "Author" ){ ?>
												<td>
													<?php if ($draft['revision'] == true){ ?>
														<span>En espera...</span>
													<?php }else { ?>
														<a href="autor.php?revisar=<?php echo $draft['id'] ?>">Publicar</a>
													<?php } ?>
												</td>
											<?php } if($_SESSION['users']['role'] == "Moderador" ): ?>
												<td>
													<?php if ($draft['published'] == true): ?>
														<span>Publicado<span>
													<?php else: ?>
														<a href="modarticulo.php?publicar-draft=<?php echo $draft['id'] ?>">Publicar</a>
													<?php endif ?>
												</td>
												<td>
													<a href="modarticulo.php?no-publicar-draft=<?php echo $draft['id'] ?>">No Publicar</a>
												</td>
											<?php endif ?>

											<td>
												<a href="admin/create_post.php?edit-draft=<?php echo $draft['id'] ?>">Editar</a>
											</td>
										</tr>
									<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					<?php } ?>
				<!-- Final tabla draft -->
			<?php } ?>
		</div>
		<!-- // Display records from DB -->
		<?php if($_SESSION['users']['role'] == "Author" ): ?>
			<a class="button"
				href="admin/create_post.php">Crear Nuevo artículo
			</a>
		<?php endif ?>
	</div>
</body>
</html>