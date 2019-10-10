<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de busqueda</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <head>
    <?php require_once('includes/navbar.php') ?>
    <?php require_once('includes/header.php') ?>
  </head>
  <body>
  <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
<?php
$categoria=$_GET['nombre'];
$autor=$_GET['username'];
$creado=$_GET['created_at'];
$texto=$_GET['body'];

if($_GET['buscar']) 
{   
   ?>
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
       $search = $_GET[$categoria] or $_GET[$autor] or $_GET[$creado] or $_GET[$texto];
 
       //$sql= "SELECT * FROM users WHERE username like '%$buscar%'";
    $sql = "SELECT users.username, subtopic.nombre, posts.body, posts.created_at FROM mydb.posts \n"

    . "INNER JOIN mydb.users \n"

    . "ON posts.user_id = users.id\n"

    . "JOIN mydb.subtopic\n"

    . "ON posts.id_subtopic = subtopic.id\n"

    . "WHERE username= '%$search%' or nombre= '%$search%' or body= '%$search%' or created_at= '%$search%'";

       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <tr>
               <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
               cadena insertada en nuestro formulario-->
               <td class="estilo-tabla" align="center"><?=$row['nombre']?></td>
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
  </div>
    </div>
      </div>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
<footer>
  <?php require_once('includes/footer.php') ?>
</footer>
</html>

        