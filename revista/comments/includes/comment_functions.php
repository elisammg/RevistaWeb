<?php

    //Variables
    $post_id = 0;

    function getPostComments($post_id){
        global $conexion;
        $sql = "SELECT * FROM comentariosartc WHERE id_post = '$post_id' AND censurar = 0 AND reply = 0";
        $result = mysqli_query($conexion, $sql);
        $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $comments;        
    }

    function getReplyComments($post_id, $comment_id){
        global $conexion;
        $sql = "SELECT * FROM comentariosartc WHERE id_post = '$post_id' AND censurar = 0 AND reply = '$comment_id'";
        $result = mysqli_query($conexion, $sql);
        $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $comments;        
    }

    function showCategoryTree($post_id, $comment_id){
        $replies = getReplyComments($post_id, $comment_id);
        if (count($replies) > 0){
            echo "<ul style=\"list-style-type:none\">";
                foreach ($replies as $reply){ ?>
                    <li>
                        <div class="grid-x grid-padding-x">
                        <div class="large-1 medium-6 cell">
                            <img src="<?=$reply['user_foto']?>">
                        </div>
                        <div class="large-11 medium-6 cell">
                            <h4><?php echo getUsernameById($reply['user_id']) ?></h4>
                            <p><?=$reply['comentarios_contenido']?></p>
                            <?php if (isset($_SESSION['users'])) { ?>
                                <form action="comentarios/respuesta.php" method="get">
                                <label>Reply</label>
                                <?php $userid = $_SESSION['users']['id'];?>
                                <!-- Hidden inputs -->
                                <input type="hidden" name="useridanswer" value="<?php echo $userid ?>">
                                <input type="hidden" name="postidanswer" value="<?php echo $reply['id_post'] ?>">
                                <input type="hidden" name="answerId" value="<?php echo $reply['comentarios_id'] ?>">
                                <input type="hidden" name="postSlug" value="<?php echo $reply['slug'] ?>">
                                <!-- Reply section -->
                                <input type="text" name="comment" placeholder="Ingrese comentario">
                                <input type="submit" class="tiny success button" name="contestar" value="Comentar">
                                <input type="submit" class="tiny alert button" name="reportarcoment" value="Reportar comentario">
                                </form>
                            <?php } ?>
                            </div>
                        </div>
                    </li>
                    <?php showCategoryTree($reply['id_post'], $reply['comentarios_id']); ?>
                <?php }
            echo "</ul>";
        }
    }

    // Receives a user id and returns the username
	function getUsernameById($id){
        global $conexion;
        $sql = "SELECT username FROM users WHERE id='$id' LIMIT 1";
		$result = mysqli_query($conexion, $sql);
		return mysqli_fetch_assoc($result)['username'];
	}
?>