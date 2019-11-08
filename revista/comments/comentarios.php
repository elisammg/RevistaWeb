<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
      <h5>Comentarios</h5>
      <div class="warning callout">
          <?php
            $postId = $post['id'];
            $comments = getPostComments($postId);
          
            if(count($comments) > 0):?>
              <ul style="list-style-type:none">
                <?php foreach($comments as $comment):?>
                  <li>
                    <div class="grid-x grid-padding-x">
                      <div class="large-1 medium-6 cell">
                        <img src="<?=$comment['user_foto']?>">
                      </div>
                      <div class="large-11 medium- cell">
                        <h4><?php echo getUsernameById($comment['user_id']) ?></h4>
                        <p><?= $comment['comentarios_contenido'] ?></p>
                        <?php if (isset($_SESSION['users'])) { ?>
                          <form action="comentarios/respuesta.php" method="get">
                            <label>Reply</label>
                            <?php $userid = $_SESSION['users']['id'];?>
                            <!-- Hidden inputs -->
                            <input type="hidden" name="useridanswer" value="<?php echo $userid ?>">
                            <input type="hidden" name="postidanswer" value="<?php echo $comment['id_post'] ?>">
                            <input type="hidden" name="postSlug" value="<?php echo $comment['slug'] ?>">
                            <input type="hidden" name="answerId" value="<?php echo $comment['comentarios_id'] ?>">
                            <!-- Reply section -->
                            <input type="text" name="comment" placeholder="Ingrese comentario">
                            <input type="submit" class="tiny success button" name="contestar" value="Comentar">
                            <input type="submit" class="tiny alert button" name="reportarcoment" value="Reportar comentario">
                          </form>
                        <?php } ?>
                      </div>
                    </div>
                  </li>
                  <?php showCategoryTree($comment['id_post'], $comment['comentarios_id']); ?>
                  <?php  ?>
                <?php endforeach;?>
              </ul>
            <?php else:?>
              <p class="alert alert-danger">No hay comentarios.</p>
            <?php endif;?> 

            <?php if (isset($_SESSION['users'])) { ?>
              <div class="grid-container">
                <div class="grid-x grid-padding-x">
                  <div class="large-12 cell">
                    <div class="callout">
                      <q>Comentar articulo <?php echo $post['title'] ?></q>
                      <hr>
                      <p>Usted está comentado como <?php echo $_SESSION['users']['nombre'] ?></p>
                      <form action="comentarios/respuesta.php" method="get">
                        <h4 class="text-center">Comentar</h4>
                        <label>Comentario</label>
                        <?php $postId = $post['id']; 
                        $userid = $_SESSION['users']['id'];?>
                        <input type="hidden" name="useridcomment" value="<?php echo $userid ?>">
                        <input type="hidden" name="postidcomment" value="<?php echo $postid ?>">
                        <input type="text" name="comentario" placeholder="Ingrese comentario">

                        <input type="submit" value="Comentar" name="comentar">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php }else{
              echo "Inicia sesion para comentar";
            } ?>


      </div>
    </div>
  </div>
</div>