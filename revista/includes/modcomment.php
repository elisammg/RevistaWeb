
<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
<?php

  ?>
       <div class="large-12">
       <table align="center" cellpadding="1" cellspacing="1">
           <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="100" align="center"><strong>Usuario</strong></td>
            <td width="100" align="center"><strong>Comentario</strong></td>
            <td width="100" align="center"><strong>Articulo Ref</strong></td>
            <td width="100" align="center"><strong>Eliminar</strong></td>
       </tr> 
       
    <?php
    $sql = "SELECT * FROM mydb.modcomment";
    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <tr>
               
               <td class="estilo-tabla" align="center"><?=$row['Usuarios']?></td>
               <td class="estilo-tabla" align="center"><?=$row['Comentarios']?></td>
               <td class="estilo-tabla" align="center"><?=$row['Titulo Articulo']?></td>
               <td class="estilo-tabla" align="center"><a href="modcomentarios.php" class="button">Eliminar</a></td>
           </tr> 
           <?php 
       }//fin blucle
      } else
      {
        echo "0 resultados";
      }
    ?>
    </table>
    </div>
  </div>
    </div>
      </div>
