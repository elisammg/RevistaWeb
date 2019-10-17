<link rel="stylesheet" href="css/comment.css">

<div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <ul class="accordion" data-accordion>
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Comentarios Reglas</a>
            <div class="accordion-content" data-tab-content >
              <p>Solo puedes comentar si eres un usuario loggeado, registrate!</p>
              <a href="signup.php">Registrarme</a>
            </div>
          </li>
          <li class="accordion-item" data-accordion-item>
            <a href="#" class="accordion-title">Comentarios</a>
            <div class="accordion-content" data-tab-content>
              <!-- comments -->
    <div class="comment-section-container">
      <h3>Comments (2)</h3>
      <div class="comment-section-author">
        <img src="https://placehold.it/50x50" alt="">
        <div class="comment-section-name">
          <h5><a href="">Janice Jones</a></h5>
          <p>March 12, 2017 at 1:28pm</p>
        </div>
      </div>
      <div class="comment-section-text">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum facilis tenetur a voluptatibus quia
          deserunt.
        </p>
      </div>
      <div class="comment-section-author">
        <img src="https://placehold.it/50x50" alt="">
        <div class="comment-section-name">
          <h5><a href="">Janice Jones</a></h5>
          <p>March 12, 2017 at 1:28pm</p>
        </div>
      </div>
      <div class="comment-section-text">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum facilis tenetur a voluptatibus quia deserunt.
        </p>
      </div>
    </div>
    <!--/comments-->
    </div>
    </li>
    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">Deja un comentario</a>
      <div class="accordion-content" data-tab-content>
        <!-- comment form -->
        <form class="comment-section-form">
          <div class="comment-section-box">
            <div class="row">
              <div class="small-12 column">
                <h4>Leave a Comment</h4>
                <label>Name
                  <input type="text">
                </label>
                <label>Email
                  <input type="text">
                </label>
                <label>Comment
                  <textarea rows="10" type="text"></textarea>
                </label>
                <button class="button expanded">Submit</button>
              </div>
            </div>
          </div>
        </form>
        </div>
        </div>
        </div>
        <!--/comment box-->
      </div>
    </li>
    ?>
  </ul>
  <?php  
    if (is_user_logged_in()) :
  ?>
  <p>Este mensaje sólo se mostrará en pantalla a los usuarios registrados e identificados. Los invitados no podrán verlo.</p>
  <?php
    endif;
  ?>
