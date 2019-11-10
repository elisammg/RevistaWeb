
<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
      <div class="large-12">
        <table align="center" cellpadding="1" cellspacing="1">
          <tr>
            <td align="center"><strong>Usuario</strong></td>
            <td align="center"><strong>Comentario</strong></td>
            <td align="center"><strong>Articulo Ref</strong></td>            
            <td align="center"><strong>Veces reportado</strong></td>
            <td align="center" colspan="2"><strong>Acción</strong></td>
          </tr>   
          <?php
            $sql = "SELECT * FROM modcomment";    
            $result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0){ 
              while($row = mysqli_fetch_assoc($result)){ ?> 
                <tr> 
                  <td class="estilo-tabla" align="center"><?=$row['Usuarios']?></td>
                  <td class="estilo-tabla" align="center"><?=$row['Comentarios']?></td>
                  <td class="estilo-tabla" align="center">
                    <a href="articulo.php?post-slug=<?=$row['slug'] ?>"><?=$row['Titulo Articulo']?></a>
                  </td>
                  <?php if($row['Reportes'] >= 25){ ?>
                    <td class="estilo-tabla" align="center">Comentario no revisado (Censurado automático)</td>
                  <?php } else { ?>
                    <td class="estilo-tabla" align="center"><?=$row['Reportes']?></td>
                  <?php } ?>
                  <?php if($row['censurado'] == false){ ?>
                    <td class="estilo-tabla" align="center">
                      <a href="modcomentarios.php?censurar-comment=<?php echo $row['id'] ?>">Censurar</a>
                    </td>
                  <?php } else { ?>
                    <td class="estilo-tabla" align="center">Comentario censurado</td>
                  <?php } ?>
                  <?php if($row['censurado'] == true){ ?>
                    <td class="estilo-tabla" align="center">
                      <a href="modcomentarios.php?no-censurar-comment=<?php echo $row['id'] ?>">Descensurar</a>
                    </td>
                  <?php } else { ?>
                    <td>
                      <a href="modcomentarios.php?ignorar=<?php echo $row['id'] ?>">Ignorar reportes</a>
                    </td>
                  <?php } ?>
                </tr> 
              <?php  }//fin blucle
            } else {
              echo "0 resultados";
            } 
          ?>
        </table>
      </div>
    </div>
  </div>
</div>

    
