<?php include('conexion.php'); ?>
<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
<?php

  ?>
       <div class="large-12">
       <table align="center" cellpadding="1" cellspacing="1">
           <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="100" align="center"><strong>Titulo</strong></td>
            <td width="100" align="center"><strong>Autor</strong></td>
            <td width="100" align="center"><strong>Resumen</strong></td>
            <td width="100" align="center"><strong>Fecha de publicacion</strong></td>
       </tr> 
       
    <?php
    $sql = "SELECT * FROM mydb.tenlast LIMIT 10";
    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0)
       { 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <tr>
               <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
               cadena insertada en nuestro formulario-->
               <td class="estilo-tabla" align="center">
                <a href=" "><?=$row['title']?></a>
              </td>
               <td class="estilo-tabla" align="center"><?=$row['username']?></td>
               <td class="estilo-tabla" align="center"><?=$row['slug']?></td>
               <td class="estilo-tabla" align="center"><?=$row['created_at']?></td>
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
