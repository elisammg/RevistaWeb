<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
       <div class="large-12">
        <h2>ULTIMOS 10 PUBLICADOS</h2>
        <table align="center" cellpadding="1" cellspacing="1">
          <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="100" align="center"><strong>Titulo</strong></td>
            <td width="100" align="center"><strong>Autor</strong></td>
            <td width="100" align="center"><strong>Fecha de publicacion</strong></td>            
            <td width="100" align="center"><strong>Leer mas</strong></td>
          </tr> 
        
          <?php
            $sql = "SELECT * FROM tenlast LIMIT 10";
            $result = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($result) > 0)
            { 
                while($row = mysqli_fetch_assoc($result)) 
            {
          ?> 
          <tr>
              <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
              cadena insertada en nuestro formulario-->
              <td class="estilo-tabla" align="center"><?=$row['title']?></td>
              <td class="estilo-tabla" align="center"><?=$row['username']?></td>
              <td class="estilo-tabla" align="center"><?=$row['created_at']?></td>
              <td class="estilo-tabla" align="center">
              <!--conteo de visitas -->
              <form action="articulo.php" method="get">
                  <input type="hidden" name="post-slug" value="<?php echo $row['id'];?>">
                  <input type="submit" class="button" name="leer" value="Leer mas">
              </form>
            </td>
          </tr> 
          <?php 
            }//fin blucle if
            } else {
              echo "0 resultados";
            }
          ?>
        </table>
      </div>
    </div>
  </div>
  </div>
