<?php
// Post variables
$post_id = 0;
$isEditingPost = false;
$published = 0;
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
// if user clicks the update post button
if (isset($_POST['update_post'])) {
	updatePost($_POST);
}
// if user clicks the Delete post button
if (isset($_GET['delete-post'])) {
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
}

function createPost($request_values)
	{
        global $conexion, $errors, $title, $featured_image, $topic_id, $body, $published;
        $userID = $_SESSION['users']['id'];
		$title = esc($request_values['title']);
		$body = esc($request_values['body']);
		if (isset($request_values['topic_id'])) {
			$topic_id = esc($request_values['topic_id']);
        }
        $template = esc($request_values['pokemon']);
		// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
		$post_slug = makeSlug($title);
		// validate form
		if (empty($title)) { array_push($errors, "Post title is required"); }
		if (empty($body)) { array_push($errors, "Post body is required"); }
		if (empty($topic_id)) { array_push($errors, "Post topic is required"); }
		// Get image name
		$featured_image = addslashes(file_get_contents($_FILES['featured_image']['tmp_name']));
	  	if (empty($featured_image)) { 
            array_push($errors, "Featured image is required"); 
        }
	  	// image file directory
	  	$target = "../static/images/" . basename($featured_image);
	  	/*if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  		array_push($errors, "Failed to upload image. Please check file settings for your server");
	  	}*/
		// Ensure that no post is saved twice. 
		$post_check_query = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1";
		$result = mysqli_query($conexion, $post_check_query);

		if (mysqli_num_rows($result) > 0) { // if post exists
			array_push($errors, "A post already exists with that title.");
		}
		// create post if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO posts (user_id, id_subtopic, title, slug, image, body, published, plantilla, created_at, updated_at, premium) 
                VALUES('$userID', '$topic_id', '$title', '$post_slug', '$featured_image', '$body', 1, '$template', now(), now(), 0)";
			if(mysqli_query($conexion, $query)){ // if post created successfully
				/*$inserted_post_id = mysqli_insert_id($conexion);
				// create relationship between post and topic
				$sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";
				mysqli_query($conexion, $sql);

				$_SESSION['message'] = "Post created successfully";
				//header('location: autor.php');
                exit(0);*/
                $_SESSION['message'] = "Post created successfully";
			}
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