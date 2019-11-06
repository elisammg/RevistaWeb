<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
      <h5>Moderación y Comentarios</h5>
      <div class="alert callout"> 
      <div class="grid-x grid-padding-x">
      <div class="large-6 medium-6 cell">     
      <h6>¿Quierés dejar un comentario?</h6>
      <p>Da click al boton "comentar" para dejar un comentario</p>
      </div>
      <div class="large-6 medium-6 cell"> 
      <h6>¿Consideras que este articulo puede dañar la sensibilidad del lector?</h6>
      <p>Puedes dar click al boton "reportar" y será evaluado por un moderador</p>
      </div>
      
       </div>
       <hr>
       <center>
        <form action="comentarios/answer.php" method="get">
        <input type="submit" class="tiny success button" name="contestar" value="Comentar <?php echo $post['title'] ?>">
        <input type="submit" class="tiny alert button" name="reportarartc" value="Reportar Articulo <?php echo $post['title'] ?>">
        </form>          
        </center>
     </div>
     <!-- -->
      
    </div>
  </div>
</div>

  
