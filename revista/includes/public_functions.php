
<?php 

//Función para tomar los articulos que han sido publicados.
function getPublishedPosts() {
	// use global $conn object in function
	global $conexion;
	$sql = "SELECT * FROM posts WHERE published=true";
	$result = mysqli_query($conexion, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_assoc($result);

	$final_posts = array();
	/*foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}*/
	return $posts;
}

//Función para tomar la categoría del artículo
function getPostTopic($post_id){
	global $conexion;
	//subquery 1
	$sql = "SELECT * FROM subtopic WHERE id= 
				(SELECT id_subtopic FROM posts WHERE id= $post_id);";
	$result = mysqli_query($conexion, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

function getAuthorName($post_id){
	global $conexion;
	//subquery 2
	$sql = "SELECT * FROM `users` WHERE id=
				(SELECT user_id FROM posts WHERE id = $post_id)";
	$result = mysqli_query($conexion, $sql);
	$authorName = mysqli_fetch_assoc($result);
	return $authorName;
}

//Funcion para verificar el slug del artículo
function getPost($slug){
	global $conexion;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug'";
	$result = mysqli_query($conexion, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
		$post['user'] = getAuthorName($post['id']);
	}
	return $post;
}

//Funcion para verificar el slug del artículo
function getDraft($slug){
	global $conexion;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	if($_SESSION['users']['role'] != 'Moderador'){
		$sql = "SELECT * FROM draft WHERE slug='$post_slug' AND published=true";
	}else{
		$sql = "SELECT * FROM draft WHERE slug='$post_slug'";
	}
	$result = mysqli_query($conexion, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
		$post['user'] = getAuthorName($post['id']);
	}
	return $post;
}

//Funcion para tomar los datos de los topics 
function getTopic($slug){
	global $conexion;
	// Get single topics slug
	$topic_slug = $_GET['topics-slug'];
	$sql = "SELECT * FROM topics WHERE slug='$topic_slug'";
	$result = mysqli_query($conexion, $sql);

	// fetch query results as associative array.
	$topics = mysqli_fetch_assoc($result);
	
	return $topics;
}

//Funcion para tomar los datos de los subtopics 
function getSubTopic($slug){
	global $conexion;
	// Get single subtopics slug
	$subtopic_slug = $_GET['subtopic-slug'];
	$sql = "SELECT * FROM subtopic WHERE slug='$subtopic_slug'";
	$result = mysqli_query($conexion, $sql);

	// fetch query results as associative array.
	$subtopic = mysqli_fetch_assoc($result);
	
	return $subtopic;
}
?>

