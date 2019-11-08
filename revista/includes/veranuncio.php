  
    <?php
    $postid = $post['id'];
    $sqlwer = "SELECT posts.id, posts.title, anuncios.id, anuncios.imagen, anuncios.titulo, postanuncio.id FROM mydb.postanuncio 
    INNER JOIN mydb.posts ON postanuncio.id_post = posts.id 
    INNER JOIN mydb.anuncios ON postanuncio.id_anuncio = anuncios.id 
    WHERE posts.id = '$postid' ORDER BY RAND() LIMIT 1";
       $resultwer = mysqli_query($conexion, $sqlwer);

       if (mysqli_num_rows($resultwer) > 0){ 
       while($rowwer = mysqli_fetch_assoc($resultwer)) 
       {
           ?> 
           <div class="grid-container">
              <div class="grid-x grid-padding-x">
                <div class="large-4 cell">
                  <div class="callout">
                  <form class="includes/veranuncio.php" method="get">
                    <img src="<?=$rowwer['imagen']?>">
                    <input type="submit" name="veranuncio" value="Ver anuncio"> 
                  </form>
                  </div>
                </div>
              </div>
            </div>
        
           <?php 
       }//fin blucle
      } else
      {
        echo "no hay anuncios";
      }
    ?> 




 <?php 
    if (isset($_GET['veranuncio'])) {
    $sql1 = "UPDATE postanuncio SET click = click + '1' WHERE postanuncio.id = 1";
    $result1 = mysqli_query($conexion, $sql1);
    if($result1){
    echo "Ver anuncio";
    }else{
    echo "No se ingresaron los datos.";
    }
    }
  ?>