<?php
    $sql = "SELECT * FROM mydb.anunciopost WHERE id_post = '11'";
    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           
			  <div class="grid-x grid-padding-x">
			    <div class="large-4 cell">
			    	<img src="<?=$row['anuncios_imagen']?>"> 
			  </div>
			</div>
        
           <?php 
       }//fin blucle
      } else
      {
        echo "0 resultados";
      }
    ?>