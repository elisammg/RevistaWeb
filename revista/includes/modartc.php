
<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
<?php

  ?>
       <div class="large-12">
       <table align="center" cellpadding="1" cellspacing="1">
           <tr>
            <td width="100" align="center"><strong>Titulo</strong></td>
            <td width="100" align="center"><strong>Autor</strong></td>
            <td width="100" align="center"><strong>Contenido</strong></td>
            <td width="100" align="center"><strong>Publicar</strong></td>
       </tr> 
       
    <?php
    $sql = "SELECT * FROM mydb.modartc";
    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <tr>
               <td class="estilo-tabla" align="center"><?=$row['Titulo']?></td>
               <td class="estilo-tabla" align="center"><?=$row['Autor']?></td>
               <td class="estilo-tabla" align="center"><?=$row['Contenido']?></td>
               <td class="estilo-tabla" align="center"><input type="submit" value="Publicar" name="publicar"></td>
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
