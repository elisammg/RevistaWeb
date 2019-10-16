<?php
include('conexion.php');
include( ROOT_PATH . '/includes/public_functions.php');

if (isset($_GET['post-slug'])) {
    $post = getPost($_GET['post-slug']);
}
$topics = getAllTopics();


?>