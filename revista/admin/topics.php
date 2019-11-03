<!-- Get all topics from DB -->
<?php $topics = getAllTopics();	?>
<?php $subtopic = getAllSubtopics(); ?>

<body>
	<div class="action">
	
		<!-- Si no se está haciendo nada -->
		<?php if($isNewTopic === false && $isEditingTopic === false){ ?>
			<?php if(count($topics)>0):?>
				<table>
					<tr>
					<td><center>Categoria</center></td>
					<td><center>SubCategorias</center></td>
					</tr>
				<?php foreach($topics as $topic):?>
					<td><center><?php echo $topic["name"]; ?></center>
					<center><a href="admin.php?edit-topic-id=<?php echo $topic['id'] ?>">Editar</a></center>
					</td>
					<td><center><?php
						category_tree($topic["id"]);
					?></center></td>
					</tr>
					
				<?php endforeach;?>
				</table>
			<?php else:?>
				<p class="alert alert-danger">No hay categorias</p>
			<?php endif;?>
			<a href="admin.php?topic=new" class="button">Agregar Categoría</a>

		<!-- Si se está creando una nueva categoría o subcategoría -->
		<?php }else if($isNewTopic === true){ ?>
			<form role="form" method="post" action="admin.php?topic=new">
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
					<button type="submit" class="button">Agregar Categoría</button>
					<a href="admin.php" class="button">Regresar</a>
				</div>
			</form>
			

		<!-- Si se edita la categoría o subcategoría -->
		<?php }else if ($isEditingTopic === true){ 
			$topicID = $_GET['edit-topic-id'];
			?>
			<form role="form" method="post" action="admin.php">
				<div class="form-group">
					<label for="name">Nueva Categoría</label>
					<input type="text" name="topic_name" required class="form-control" id="name" placeholder="Nuevo titulo">
				</div>					
			</form>		
			<a href="admin.php?topic=update" type="submit" class="button">Actualizar Categoría</a>
			<a href="admin.php?topic=delete" type="submit" class="button">Eliminar Categoría</a>
			<a href="admin.php" class="button">Regresar</a>			
		<?PHP } ?>
	</div>
</body>