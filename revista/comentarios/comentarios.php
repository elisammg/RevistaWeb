<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
      <h5>Comentarios</h5>
      <div class="warning callout">
        <dl>
          <?php
            $postid = $post['id'];
            $comments = getAllComments($postid);
          
            if(count($comments) > 0):?>
              <dt>
              <?php foreach($comments as $comment):?>
                <div class="grid-x grid-padding-x">
                  <div class="large-1 medium-6 cell">
                    <img src="<?=$comment['user_foto']?>">
                  </div>
                  <div class="large-11 medium- cell">
                    <h4>Usuario 1</h4>
                    <p><?=$comment['comentarios_contenido']?></p>
                    <form action="comentarios/respuesta.php" method="get">
                      <label>Comentar</label>
                      <?php $userid = $_SESSION['users']['id'];?>
                      <input type="hidden" name="useridanswer" value="<?php echo $userid ?>">
                      <input type="hidden" name="postidanswer" value="<?php echo $comment['id_post'] ?>">
                      <input type="hidden" name="answerId" value="<?php echo $comment['comentarios_id'] ?>">

                      <input type="text" name="comment" placeholder="Ingrese comentario">
                      <input type="submit" class="tiny success button" name="contestar" value="Comentar">
                      <input type="submit" class="tiny alert button" name="reportarcoment" value="Reportar comentario">
                    </form>
                  </div>
                </div>
              <?php endforeach;?>
              </dt>
            <?php else:?>
              <p class="alert alert-danger">No hay comentarios.</p>
            <?php endif;?>
              





          
        </dl>
      </div>
    </div>
  </div>
</div>