
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
    $sql = "SELECT * FROM mydb.modartc";

    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <tr>
               
               <td class="estilo-tabla" align="center"><?=$row['Id']?></td>
               <td class="estilo-tabla" align="center"><?=$row['Titulo']?></td>
               <td class="estilo-tabla" align="center"><?=$row['Numero de reportes']?></td>
               <form action="reporteartc.php" method="get">
               <td class="estilo-tabla" align="center"><input type="submit" value="Censurar" name="censurar"></td>
               <td class="estilo-tabla" align="center"><input type="submit" value="No Censurar" name="nocensurar"></td>
               </form>
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

    
