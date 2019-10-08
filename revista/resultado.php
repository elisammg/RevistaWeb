<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBCATEROGRÍA 2</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <head>
    <?php require_once('includes/navbar.php') ?>
    <?php require_once('includes/header.php') ?>
  </head>
  <body>
<?php

if($_GET['buscar']) 
{   
   ?>
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
   <div class="large-12">
   <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
       <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="100" align="center"><strong>Categoria</strong></td>
            <td width="100" align="center"><strong>Autor</strong></td>
            <td width="100" align="center"><strong>Fecha de publicacion</strong></td>
            <td width="100" align="center"><strong>Texto</strong></td>
       </tr> 
       <?php
       //obtenemos la información introducida anteriormente desde nuestro buscador PHP
       $buscar = $_GET["categoria"] or ["autor"] or ["fecha"] or ["texto"];
       /* ahora ejecutamos nuestra sentencia SQL, lo que hemos vamos a hacer es usar el 
       comando like para comprobar si existe alguna coincidencia de la cadena insertada 
       en nuestro campo del formulario con nuestros datos almacenados en nuestra base de 
       datos, la cadena insertada en el buscador se almacenará en la variable $buscar */
 
       /* hemos usado también la sentencia or para indicarle que queremos que nos encuentre
       las coincidencias en alguno de los campos de nuestra tabla (apellidos o nombre), 
       si hubiéramos puesto un and solo nos devolvería el resultado del filtro en el 
       caso de cumplirse las dos condiciones */
      // "SELECT first_name, last_name, dept_no, s.emp_no FROM employees e INNER JOIN dept_emp d ON e.emp_no = d.emp_no INNER JOIN salaries s ON s.emp_no = d.emp_no WHERE salary = $Salary LIMIT 5;";
 
       $sql= "SELECT * FROM users WHERE username like '%$buscar%'";
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <tr>
               <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
               cadena insertada en nuestro formulario-->
               <td class="estilo-tabla" align="center"><?=$row['name']?></td>
               <td class="estilo-tabla" align="center"><?=$row['username']?></td>
               <td class="estilo-tabla" align="center"><?=$row['created_at']?></td>
               <td class="estilo-tabla" align="center"><?=$row['body']?></td>
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
    <?php
} // fin if 
?>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
<footer>
  <?php require_once('includes/footer.php') ?>
</footer>
</html>

               <!--<td class=”estilo-tabla” align="center"><?=$registro['apellidos']?></td>-->