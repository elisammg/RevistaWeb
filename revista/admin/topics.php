<?php  include('includes/topic_functions.php'); ?>
<!-- Get all topics from DB -->
<?php $topics = getAllTopics();	?>

<body>
		<!-- Middle form - to create and edit -->
		<div class="action">
			<?php if($isNewTopic === false): ?>
				<a href="admin.php?new-topic=new" class="button">Agregar Categoría</a>
			<?php else: ?>
				<form role="form" method="post" action="admin.php?new-topic=new">
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
					</div>
					<button type="submit" class="button">Agregar Categoría</button>
					<a href="admin.php" class="button">Regresar</a>
				</form>
			<?PHP endif ?>
		</div>
		<!-- // Middle form - to create and edit -->

		<!-- Display records from DB-->
		<div class="table-div">
			<!-- Display notification message -->
			

		</div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>