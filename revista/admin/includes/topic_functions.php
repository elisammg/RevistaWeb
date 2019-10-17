<?php
// Topics variables
$topic_id = 0;
$isEditingTopic = false;
$topic_name = "";

// get all topics from DB
function getAllTopics() {
	global $conexion;
	$sql = "SELECT * FROM subtopic";
	$result = mysqli_query($conexion, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}

?>