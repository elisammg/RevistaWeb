<?php	
	// Topics variables
	$topic_id = 0;
	$isEditingTopic = false;
	$isNewTopic = false;
	$topic_name = "";


	// get all topics from DB
	function getAllTopics() {
		global $conexion;
		$sql = "SELECT * FROM topics";
		$result = mysqli_query($conexion, $sql);
		$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $topics;
	}

	//Toma los datos del topic seleccionado.
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
						echo '<li>' . $row['nombre'];
							//category_tree($row['id_topic']);
						echo '</li>';
				}
				
				$i++;
				
				if ($i > 0){ 
					echo '</ul>';
				}
			endwhile;
		}

	// and returns 'some-sample-string'
	function makeSlug(String $string){
		$string = strtolower($string);
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}
	
	if(isset($_GET["topic"])){
		$isNewTopic = true;
		$action = $_GET["topic"];
		if($action=="new"){
			if(!empty($_POST)){
				global $conexion;
				$topic_name = $_POST["topic_name"];
				$topic_id = $_POST["topicID"];
				$topic_slug = makeSlug($topic_name); 
				if($topic_id == 'newCat'){
					$sql = "INSERT INTO topics (name, slug) VALUE ('$topic_name', '$topic_slug')";
				}else {
					$sql = "INSERT INTO subtopic (id_topic, nombre) VALUES ('$topic_id', '$topic_name')";
				}
				
				$result = mysqli_query($conexion, $sql);
				$isNewTopic = false;
			}
		}else if($action=="delete"){
			global $conexion;
			$sql = "DELETE FROM category WHERE id=$_GET[id]";
			$con->query($sql);
		}else if($action=="update"){
			if(!empty($_POST)){
				global $conexion;
				$topic_name = $_POST["topic_name"];
				$topic_id = $_POST["topicID"];
				$topic_slug = makeSlug($topic_name); 
				if($topic_id == 'newCat'){
					$sql = "UPDATE topics SET name='$topic_name', slug='$topic_slug' WHERE id=$topic_id";
				}else {
					$sql = "UPDATE subtopic SET id_topic='$topic_id', nombre='$topic_name' WHERE id_topic=$topic_id";
				}
				
				$result = mysqli_query($conexion, $sql);
				$isEditingTopic = false;
			}
		}
	}else if(isset($_GET['edit-topic-id'])){
		$isEditingTopic = true;
	}
?>