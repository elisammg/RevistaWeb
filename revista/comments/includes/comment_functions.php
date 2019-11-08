<?php

    //Variables
    $post_id = 0;

    function getAllComments($post_id){
        global $conexion;
        $sql = "SELECT * FROM comentariosartc WHERE id_post = '$post_id' AND censurar = 0 AND reply = 0";
        $result = mysqli_query($conexion, $sql);
        $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $comments;        
    }

?>