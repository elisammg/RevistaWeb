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
                                <!-- Reply section -->
                                <input type="text" name="comment" placeholder="Ingrese comentario">
                                <input type="submit" class="tiny success button" name="contestar" value="Comentar">
                                <?php if($reply['reporte'] != NULL){ ?>
                                    <input type="submit" class="tiny alert button" name="reportarcoment" value="Reportar comentario">
                                <?php } ?>
                                <?php if($reply['reporte'] > 0){ ?>
                                    <?php if($_SESSION['users']['role'] == 'Moderador') { ?>
                                        <input type="submit" class="tiny warning button" name="censurar-comment" value="Censurar comentario">
                                        <input type="submit" class="tiny warning button" name="ignorar" value="Ignorar reportes">
                                    <?php } ?>
                                <?php } ?>
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
    
    // if para las funciones de comentarios
    if (isset($_GET['censurar-comment']) || isset($_GET['no-censurar-comment']) || isset($_GET['ignorar'])){
        if (isset($_GET['censurar-comment'])){
            global $conexion;
            $comment_id = $_GET['censurar-comment'];
            $sql = "UPDATE comentarios SET censurar = 1 WHERE id = $comment_id";
            $result = mysqli_query($conexion, $sql);
            header("Location: modcomentarios.php");
        } elseif (isset($_GET['no-censurar-comment'])){
            global $conexion;
            $comment_id = $_GET['no-censurar-comment'];
            $sql = "UPDATE comentarios SET censurar = 0, vecesreporte = 0 WHERE id = $comment_id";
            $result = mysqli_query($conexion, $sql);
            header("Location: modcomentarios.php");
        } elseif (isset($_GET['ignorar'])){
            global $conexion;
            $comment_id = $_GET['ignorar'];
            $sql = "UPDATE comentarios SET vecesreporte = null WHERE id = $comment_id";
            $result = mysqli_query($conexion, $sql);
            header("Location: modcomentarios.php");
        }
    }
?>