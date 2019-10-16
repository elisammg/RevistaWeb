<?php 




//Funcion para verificar el slug del artículo
function getPost($slug){
	global $conexion;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$slug' AND published=true";
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