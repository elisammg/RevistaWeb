<!-- Get all topics from DB -->
<?php $topics = getAllTopics();	?>
<?php $subtopic = getAllSubtopics(); ?>

<body>
	<div class="action">
	
		<!-- Si no se está haciendo nada. Este muestra el arbol de categorías. -->
		<?php if($isNewTopic === false && $isEditingTopic === false){ ?>
			<?php if(count($topics)>0):?>
				<table>
					<tr>
					<td><center>Categoria</center></td>
					<td><center>SubCategorias</center></td>
					</tr>
				<?php foreach($topics as $topic):?>
					<li><?php echo $topic["name"]; ?><a href="admin.php?edit-topic=<?php echo $topic['id'] ?>"> Editar</a> </li>
					<?php
						category_tree($topic["id"]);
					?></center></td>
					</tr>
					
				<?php endforeach;?>
				</table>
			<?php else:?>
				<p class="alert alert-danger">No hay categorias</p>
			<?php endif;?>
			<a href="admin.php?new-topic" class="button">Agregar Categoría</a>

		<!-- Si se está creando una nueva categoría o subcategoría -->
		<?php }else if($isNewTopic === true){ ?>
			<form role="form" method="post" action="admin.php?new-topic">
				<div class="form-group">
					<label for="name">Nueva Categoría</label>
					<input type="text" name="topic_name" required class="form-control" id="name" placeholder="Titulo">
				</div>
				<div class="form-group">
					<label for="category_id">Categoría</label>
					<select class="form-control" name="topicID" id="category_id">
						<option value="newCat">-- NUEVA CATEGORÍA --</option>
						<?php if(count($topics)>0):?>
						<?php foreach($topics as $topic):?>
							<option value="<?php echo $topic["id"];?>" ><?php echo $topic["name"];?></option>
							<?php topicData($topic["id"],1); ?>
						<?php endforeach;?>
						<?php endif;?>						
					</select>
				<!--Seleccionar plantilla -->
				<h6>Seleccione plantilla para categoria o sub categoria</h6>
					<ul>
					<li>
					<input type="radio" name="pokemon" value="0" id="pokemon1"><label for="pokemon1">Primera plantilla</label>
					</li>
					<li>
					<input type="radio" name="pokemon" value="1" id="pokemon2"><label for="pokemon2">Segunda plantilla</label>
					</li>
					</ul>

					<button type="submit" class="button" name="create_topic">Agregar Categoría</button>
					<a href="admin.php" class="button">Regresar</a>
				</div>
			</form>

		<!-- Si se edita la categoría o subcategoría -->
		<?php }else if ($isEditingTopic === true){ ?>
			<form role="form" method="post" action="admin.php">
				<div class="form-group">
					<input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
					<input type="hidden" name="fromTable" value="<?php echo $fromTable; ?>">
					<label for="name">Editar Categoría</label>
					<input type="text" required class="form-control" name="topic_name" value="<?php echo $topic_name; ?>" placeholder="Nuevo titulo">
				</div>
				<button type="submit" class="button" name="update_topic">Actualizar Categoría</button>
				<button type="submit" class="button" name="delete_topic">Eliminar Categoría</button>
				<a href="admin.php" class="button">Regresar</a>					
			</form>
						
		<?PHP } ?>
	</div>
</body>