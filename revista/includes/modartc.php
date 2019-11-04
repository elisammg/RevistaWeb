
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
            <td width="100" align="center"><strong>Modificar</strong></td>
            <td width="100" align="center"><strong>No publicar</strong></td>

       </tr> 
       
    <?php
    $sql = "SELECT * FROM mydb.modenewartc";
    
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
               <td class="estilo-tabla" align="center"><input type="submit" value="Modificar" name="modificar"></td>
               <td class="estilo-tabla" align="center"><input type="submit" value="No publicar" name="draft"></td>
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
