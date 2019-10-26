
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
            <td width="100" align="center"><strong>Contenido</strong></td>
       </tr> 
       
    <?php
    $sql = "SELECT * FROM mydb.modartc";
    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <tr>
               <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
               cadena insertada en nuestro formulario-->
               <td class="estilo-tabla" align="center"><?=$row['Titulo']?></td>
               <td class="estilo-tabla" align="center"><?=$row['Autor']?></td>
               <td class="estilo-tabla" align="center"><?=$row['Contenido']?></td>
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
