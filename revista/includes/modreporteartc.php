
<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
<?php

  ?>
       <div class="large-12">
       <table align="center" cellpadding="1" cellspacing="1">
           <tr>
            <td width="100" align="center"><strong>Id</strong></td>
            <td width="100" align="center"><strong>Titulo</strong></td>          
            <td width="100" align="center"><strong>Veces reportado</strong></td>
            <td width="100" align="center"><strong>Censurar</strong></td>            
            <td width="100" align="center"><strong>No Censurar</strong></td>
       </tr> 
       
    <?php
    $sql = "SELECT * FROM modartc";

    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <tr>
              <td class="estilo-tabla" align="center"><?=$row['Id']?></td>
              <td class="estilo-tabla" align="center"><?=$row['Titulo']?></td>
              <td class="estilo-tabla" align="center"><?=$row['Numero de reportes']?></td>
                <td class="estilo-tabla" align="center">
                  <a href="reporteartc.php?censurar=<?php echo $row['Id'] ?>">Censurar</a>
                </td>
                <td class="estilo-tabla" align="center">
                  <a href="reporteartc.php?no-censurar=<?php echo $row['Id'] ?>">Ignorar</a>
                </td>
           </tr> 
           <?php 
       }//fin blucle
      } 
    ?>
    </table>
    </div>
  </div>
    </div>
      </div>

    
