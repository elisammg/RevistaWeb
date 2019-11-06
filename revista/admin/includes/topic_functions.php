<?php	
	// Topics variables
	$topic_id = 0;
	$isEditingTopic = false;
	$isNewTopic = false;
	$topic_name = "";

	if (isset($_GET['new-topic'])){
		$isNewTopic = true;
	}
	// if user clicks the create topic button
	if (isset($_POST['create_topic'])) { 
		createTopic($_POST); 
	}
	// if user clicks the Edit button from topic
	if (isset($_GET['edit-topic'])) {
		$isEditingTopic = true;
		$topic_id = $_GET['edit-topic'];
		$fromTable = 'topic';
		editTopic($topic_id);
	}
	// if user clicks the Edit button from subtopic
	if (isset($_GET['edit-subtopic'])) {
		$isEditingTopic = true;
		$topic_id = $_GET['edit-subtopic'];
		$fromTable = 'subtopic';
		editSubtopic($topic_id);
	}
	// if user clicks the update topic button
	if (isset($_POST['update_topic'])) {
		updateTopic($_POST);
	}
	// if user clicks the Delete topic button
	if (isset($_POST['delete_topic'])) {
		deleteTopic($_POST);
	}

	// create topic
	function createTopic($request_values){
		if(!empty($request_values)){
			global $conexion;
			$topic_name = $request_values["topic_name"];
			$topic_id = $request_values["topicID"];
			$topic_slug = makeSlug($topic_name); 
			if($topic_id == 'newCat'){
				$sql = "INSERT INTO topics (name, slug) VALUE ('$topic_name', '$topic_slug')";
			}else {
				$sql = "INSERT INTO subtopic (id_topic, nombre, slug) VALUES ('$topic_id', '$topic_name', '$topic_slug')";
			}
			
			$result = mysqli_query($conexion, $sql);
			$isNewTopic = false;
			header('location: admin.php');
		}
	}

	// edit topic
	function editTopic($topic_id) {
		global $conexion, $topic_name, $isEditingTopic, $topic_id;
		$sql = "SELECT * FROM topics WHERE id=$topic_id LIMIT 1";
		$result = mysqli_query($conexion, $sql);
		$topic = mysqli_fetch_assoc($result);
		// set form values ($topic_name) on the form to be updated
		$topic_name = $topic['name'];
	}

	// edit subtopic
	function editSubtopic($topic_id) {
		global $conexion, $topic_name, $isEditingTopic, $topic_id;
		$sql = "SELECT * FROM subtopic WHERE id=$topic_id LIMIT 1";
		$result = mysqli_query($conexion, $sql);
		$topic = mysqli_fetch_assoc($result);
		// set form values ($topic_name) on the form to be updated
		$topic_name = $topic['nombre'];
	}

	// update topic/subtopic
	function updateTopic($request_values) {
		if(!empty($request_values)){
			global $conexion;
			$topic_id = $request_values["topic_id"];
			$topic_name = $request_values["topic_name"];
			$isFromTable = $request_values['fromTable'];
			$topic_slug = makeSlug($topic_name); 
			if($isFromTable == "topic"){
				$sql = "UPDATE topics SET name='$topic_name', slug='$topic_slug' WHERE id='$topic_id'";
			}else {
				$sql = "UPDATE subtopic SET nombre='$topic_name', slug='$topic_slug' WHERE id='$topic_id'";
			}
			$result = mysqli_query($conexion, $sql);
			$isEditingTopic = false;
			header('location: admin.php');
		}
	}

	// delete topic 
	function deleteTopic($request_values) {
		if(!empty($request_values)){
			global $conexion;
			$topic_id = $request_values["topic_id"];
			$topic_name = $request_values["topic_name"];
			$isFromTable = $request_values['fromTable'];
			$topic_slug = makeSlug($topic_name); 
			if($isFromTable == "topic"){
				$sql = "DELETE FROM topics WHERE id='$topic_id'";
			}else {
				$sql = "DELETE FROM subtopic WHERE id='$topic_id'";
			}
			$result = mysqli_query($conexion, $sql);
			$isEditingTopic = false;
			header('location: admin.php');
		}
	}

	// get all topics from DB
	function getAllTopics() {
		global $conexion;
		$sql = "SELECT * FROM topics";
		$result = mysqli_query($conexion, $sql);
		$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $topics;
	}
	
	function getAllSubtopics(){
		global $conexion;
		$sql = "SELECT * FROM subtopic";
		$result = mysqli_query($conexion, $sql);
		$subtopics = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $subtopics;
	}
	
		//Toma loas datos del topic seleccionado.
	function topicData ($id){
		global $conexion;
		$sql = "SELECT * FROM topics WHERE id=$id";
		$result = mysqli_query($conexion, $sql);
		$topicData = mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	//Despliega el arbol de categorías
	function category_tree($catid){
		global $conexion;
		
		$sql = "SELECT * FROM subtopic WHERE id_topic ='$catid'";
		$result = mysqli_query($conexion, $sql);
		
		while($row = mysqli_fetch_assoc($result)):
			$i = 0;
			if ($i == 0){
				echo '<ul>';
					echo '<li>' . $row['nombre'] . '<a href="admin.php?edit-subtopic=' . $row['id'] .' "> Editar</a>' . '</li>';
			}
			
			$i++;
			
			if ($i > 0){ 
				echo '</ul>';
			}
		endwhile;
	}

	//Despliega el arbol de categorías
	function navcat($catid){
		global $conexion;
		
		$sql = "SELECT * FROM subtopic WHERE id_topic ='$catid'";
		$result = mysqli_query($conexion, $sql);
		
		while($row = mysqli_fetch_assoc($result)):
			$i = 0;
			if ($i == 0){
				echo '<ul>';
					echo '<li><a href="subcategoria.php?subtopic-plantilla=' . $row['slug'] . '">' . $row['nombre'] . '</a></li>';
			}
			
			$i++;
			
			if ($i > 0){ 
				echo '</ul>';
			}
		endwhile;
	}
?>