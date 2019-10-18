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

	function topicData ($id){
		global $conexion;
		$sql = "SELECT * FROM topics WHERE id=$id";
		$result = mysqli_query($conexion, $sql);
		$topicData = mysqli_fetch_all($result, MYSQLI_ASSOC);
	}


	if(isset($_GET["new-topic"]) && $_GET["new-topic"]!=""){
		$isNewTopic = true;
		$action = $_GET["new-topic"];
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
			//header("Location: topic.php");
		}else if($action=="delete"){
			global $conexion;
			$sql = "delete from category where id=$_GET[id]";
			$con->query($sql);
			//header("Location: ../");
		}else if($action=="update"){
			if(!empty($_POST)){
				global $conexion;
				$id = $_POST["id"];
				$name = $_POST["name"];
				$category_id = $_POST["category_id"]!=""? $_POST["category_id"]:"NULL";
				$sql = "update category set name=\"$name\", category_id=$category_id where id=$id";
				$con->query($sql);
			}
			//header("Location: ../");
		}
	}

	// and returns 'some-sample-string'
	function makeSlug(String $string){
		$string = strtolower($string);
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}
?>