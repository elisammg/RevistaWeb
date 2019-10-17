<?php 

//Función para tomar los articulos que han sido publicados.
function getPublishedPosts() {
	// use global $conn object in function
	global $conexion;
	$sql = "SELECT * FROM posts WHERE published=true";
	$result = mysqli_query($conexion, $sql);
	// fetch all posts as an associative array called $posts
	
	//Arreglar lo de la referencia a la pagina articulos.-------------------------------------------------------------------------------------
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
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($conexion, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

//Funcion para verificar el slug del artículo
function getPost($slug){
	global $conexion;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
	$result = mysqli_query($conexion, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}
?>