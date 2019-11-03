
      <div class="success callout">
      	<h5>Veces visto artículo</h5>
      	<?php  
          $sql = "SELECT sum(views) FROM mydb.posts"; 
           $result = mysqli_query($conexion, $sql);

           if (mysqli_num_rows($result) > 0){ 
           while($row = mysqli_fetch_assoc($result)) 
           {
               ?>
               <p>El total de vistas por todos los artiuclos es de: <b><?=$row['sum(views)']?></b></p>
               <p>Desgloce por artículo</p>
               <a href="vva.php" class="button">Revisar</a>            
               <?php 
           }//fin blucle
          } else
          {
            echo "0 resultados";
          }
              ?>
      </div>
 