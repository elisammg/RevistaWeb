<?php
// Post variables
$post_id = 0;
$postId = 0;
$draft_id = 0;
$isEditingPost = false;
$isEditingDraft = false;
$published = 0;
$checked = 0;
$title = "";
$post_slug = "";
$body = "";
$featured_image = "";
$post_topic = "";
//$images = addslashes(get_included_files($_FILES['featured_image']['tmp_name']));

// if user clicks the create post button
if (isset($_POST['create_post'])) { 
    createPost($_POST); 
}
// if user clicks the Edit post button
if (isset($_GET['edit-post'])) {
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}
// if user clicks the Edit draft button
if (isset($_GET['edit-draft'])) {
	$isEditingDraft = true;
	$draft_id = $_GET['edit-draft'];
	editDraft($draft_id);
}
// if user clicks the update post button
if (isset($_POST['update_post'])) {
	updateDraft($_POST);
}
// // if user clicks the Delete post button
// if (isset($_GET['delete-post'])) {
// 	$post_id = $_GET['delete-post'];
// 	deletePost($post_id);
// }

function createPost($request_values){
	global $conexion, $errors, $title, $featured_image, $topic_id, $body, $published;
	if(isset($request_values['user_id'])){
		$userID = esc($request_values['user_id']);
	} else {
		$userID = $_SESSION['users']['id'];
	}

	$postId = esc($request_values['post_id']);
	$title = esc($request_values['title']);
	$body = esc($request_values['body']);
	if (isset($request_values['topic_id'])) {
		$topic_id = esc($request_values['topic_id']);
	}
	if (isset($request_values['publish'])) {
		$published = esc($request_values['publish']);
	}
	$template = esc($request_values['pokemon']);
	// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
	$post_slug = makeSlug($title);
	// validate form
	if (empty($title)) { array_push($errors, "Post title is required"); }
	if (empty($body)) { array_push($errors, "Post body is required"); }
	if (empty($topic_id)) { array_push($errors, "Post topic is required"); }
	// Get image name
	$blob_image = addslashes(file_get_contents($_FILES['featured_image']['tmp_name']));
	$featured_image = $_FILES['featured_image']['name'];
	if (empty($featured_image)) { 
		array_push($errors, "Featured image is required"); 
	}
	// image file directory
	$target = "../static/images/" . basename($featured_image);
	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
		array_push($errors, "Failed to upload image. Please check file settings for your server");
	}
	// Ensure that no post is saved twice. 
	$post_check_query = "SELECT * FROM draft WHERE slug='$post_slug' LIMIT 1";
	$result = mysqli_query($conexion, $post_check_query);

	if (mysqli_num_rows($result) > 0) { // if post exists
		array_push($errors, "A post already exists with that title.");
	}
	// create post if there are no errors in the form
	if (count($errors) == 0) {
		// Insert blob in DB
		$blob_query = "INSERT INTO blobimage (image) VALUES ('$blob_image')";
		mysqli_query($conexion, $blob_query);
		$query = "INSERT INTO draft (id, user_id, id_subtopic, title, slug, image, body, published, plantilla, created_at, updated_at, premium, revision) 
			VALUES($postId, '$userID', '$topic_id', '$title', '$post_slug', '$featured_image', '$body', 0, '$template', now(), now(), 0, '$published')";
		if(mysqli_query($conexion, $query)){ // if post created successfully
			if($_SESSION['users']['role'] == "Author" ){
				header('location: ../autor.php');
			} elseif ($_SESSION['users']['role'] == "Moderador" ) {
				header('location: ../modarticulo.php');
			}
			exit(0);
		}else{
			echo "Sfsfsd";
		}
	}
}

// seleccionca campos del artículo para editar
function editPost($post_id){
	global $conexion, $user_id, $postId, $title, $post_slug, $body, $published, $isEditingPost;
	$sql = "SELECT * FROM posts WHERE id=$post_id LIMIT 1";
	$result = mysqli_query($conexion, $sql);
	$post = mysqli_fetch_assoc($result);
	// set form values on the form to be updated
	$user_id = $post['user_id'];
	$postId = $post['id'];
	$title = $post['title'];
	$body = $post['body'];
	$published = $post['published'];
}
function editDraft($draft_id){
	global $conexion, $user_id, $draftId, $title, $post_slug, $body, $published, $isEditingDraft;
	$sql = "SELECT * FROM draft WHERE id=$draft_id LIMIT 1";
	$result = mysqli_query($conexion, $sql);
	$draft = mysqli_fetch_assoc($result);
	// set form values on the form to be updated
	$user_id = $draft['user_id'];
	$title = $draft['title'];
	$body = $draft['body'];
	$checked = $draft['revision'];
}


function updateDraft($request_values){
	global $conexion, $errors, $draft_id, $title, $featured_image, $topic_id, $body, $published;
	$title = esc($request_values['title']);
	$body = esc($request_values['body']);
	$draft_id = esc($request_values['draft_id']);
	if (isset($request_values['topic_id'])) {
		$topic_id = esc($request_values['topic_id']);
	}
	if (isset($request_values['publish'])) {
		$published = esc($request_values['publish']);
	}
	$template = esc($request_values['pokemon']);
	// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
	$post_slug = makeSlug($title);
	// validate form
	if (empty($title)) { array_push($errors, "Post title is required"); }
	if (empty($body)) { array_push($errors, "Post body is required"); }
	if (empty($topic_id)) { array_push($errors, "Post topic is required"); }
	// Get image name
	$blob_image = addslashes(file_get_contents($_FILES['featured_image']['tmp_name']));
	$featured_image = $_FILES['featured_image']['name'];
	if (empty($featured_image)) { 
		array_push($errors, "Featured image is required"); 
	}
	// image file directory
	$target = "../static/images/" . basename($featured_image);
	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
		array_push($errors, "Failed to upload image. Please check file settings for your server");
	}
	// Ensure that no post is saved twice. 
	$post_check_query = "SELECT * FROM draft WHERE slug='$post_slug' LIMIT 1";
	$result = mysqli_query($conexion, $post_check_query);

	if (mysqli_num_rows($result) > 0) { // if post exists
		array_push($errors, "A post already exists with that title.");
	}
	// update post if there are no errors in the form
	if (count($errors) == 0) {
		// Insert blob in DB
		$blob_query = "UPDATE blobimage SET image='$blob_image'";
		mysqli_query($conexion, $blob_query);
		$query = "UPDATE draft SET title='$title', slug='$post_slug', image='$featured_image', 
						body='$body', updated_at=now(), plantilla='$template', revision='$published'
					WHERE id=$draft_id";
		if(mysqli_query($conexion, $query)){ // if post updated successfully
			if($_SESSION['users']['role'] == "Author" ){
				header('location: ../autor.php');
			} elseif ($_SESSION['users']['role'] == "Moderador" ) {
				header('location: ../modarticulo.php');
			}
			exit(0);
		}
	}
}

// get all posts from DB
function getAllPosts()
{
	global $conexion;
	
	// Admin can view all posts
	// Author can only view their posts
	if ($_SESSION['users']['role'] == "Moderador") {
		$sql = "SELECT * FROM posts";
	} elseif ($_SESSION['users']['role'] == "Author") {
		$user_id = $_SESSION['users']['id'];
		$sql = "SELECT * FROM posts WHERE user_id=$user_id";
	}
	$result = mysqli_query($conexion, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getAllDrafts()
{
	global $conexion;
	
	// Admin can view all posts
	// Author can only view their posts
	if ($_SESSION['users']['role'] == "Moderador") {
		$sql = "SELECT * FROM draft WHERE revision = 1";
	} elseif ($_SESSION['users']['role'] == "Author") {
		$user_id = $_SESSION['users']['id'];
		$sql = "SELECT * FROM draft WHERE user_id=$user_id";
	}
	$result = mysqli_query($conexion, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}

// get the author/username of a post
function getPostAuthorById($user_id){
	global $conexion;
	$sql = "SELECT username FROM users WHERE id=$user_id";
	$result = mysqli_query($conexion, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result)['username'];
	} else {
		return null;
	}
}

// get the user_id of a post
function getUserId(){
	global $conexion;
	if(isset($_GET['publicar-post']))
		$post_id = $_GET['publicar-post'];
		$sql = "SELECT user_id FROM draft WHERE ";
}

// if para las funciones de artículos
if (isset($_GET['publicar-post']) || isset($_GET['no-publicar-post'])) {
	if (isset($_GET['publicar-post'])) {
		$post_id = $_GET['publicar-post'];
		global $conexion;
		$sql = "UPDATE posts SET published=1 WHERE id=$post_id";
		$result = mysqli_query($conexion, $sql);
	} else if (isset($_GET['no-publicar-post'])) {
		$post_id = $_GET['no-publicar-post'];
		global $conexion;
		$sql = "UPDATE posts SET published=0 WHERE id=$post_id";
		$result = mysqli_query($conexion, $sql);
	}
}

// if para las funciones de drafts
if (isset($_GET['revisar']) || isset($_GET['publicar-draft']) || isset($_GET['no-publicar-draft'])) {
	if (isset($_GET['revisar'])) {
		$draft_id = $_GET['revisar'];
		global $conexion;
		$sql = "UPDATE draft SET revision=1 WHERE id=$draft_id";
		$result = mysqli_query($conexion, $sql);
	} else if (isset($_GET['publicar-draft'])) {
		$draft_id = $_GET['publicar-draft'];
		global $conexion;
		$update_sql = "UPDATE draft SET published = 1 WHERE id=$draft_id AND revision = 1";
		if(mysqli_query($conexion, $update_sql)){
			$delete_post = "DELETE FROM posts WHERE id = $draft_id";
			mysqli_query($conexion, $delete_post);
			$delete_draft = "DELETE FROM draft WHERE id = $draft_id AND published = 1 AND revision = 1";
		}
		$result = mysqli_query($conexion, $delete_draft);
	}else if (isset($_GET['no-publicar-draft'])) {
		$draft_id = $_GET['no-publicar-draft'];
		global $conexion;
		$sql = "UPDATE draft SET revision=0 WHERE id=$draft_id";
		$result = mysqli_query($conexion, $sql);

		/* Sending email section */
		$email_sql = "SELECT email FROM users WHERE id = 
						(SELECT user_id FROM draft WHERE id = $draft_id LIMIT 1)";
		$email = mysqli_query($conexion, $email_sql);
		$row = mysqli_fetch_assoc($email);
		$to = $row['email'];
		$subject = "Unpublished post - RevistaWeb";
		$message = "Sorry, your post could not be published.";
		mail($to,$subject,$message);
	}
}

// if para funciones censurar/no censurar artículos.
if(isset($_GET['censurar']) || isset($_GET['no-censurar'])){
	if (isset($_GET['censurar'])){
		$post_id = $_GET['censurar'];
		global $conexion;
		$sql = "UPDATE posts SET published = 0 WHERE id = '$post_id' AND published = 1";
		$result = mysqli_query($conexion, $sql);
	} elseif (isset($_GET['no-censurar'])){
		$post_id = $_GET['no-censurar'];
		global $conexion;
		$sql = "UPDATE posts SET reportes = NULL WHERE id = '$post_id' AND reportes > 0";
		$result = mysqli_query($conexion, $sql);
	}
}

function esc(String $value){
	// bring the global db conexionect object into function
	global $conexion;
	// remove empty space sorrounding string
	$val = trim($value); 
	$val = mysqli_real_escape_string($conexion, $value);
	return $val;
}
// Receives a string like 'Some Sample String'
// and returns 'some-sample-string'
function makeSlug(String $string){
	$string = strtolower($string);
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}
?>