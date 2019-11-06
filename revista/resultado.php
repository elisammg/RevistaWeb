<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>
<?php

  //Cantidad de resultados por página (debe ser INT, no string/varchar)
  $limit = 10;

  //Comprueba si está seteado el GET de HTTP
  if (isset($_GET["pagina"])) {

    //Si el GET de HTTP SÍ es una string / cadena, procede
    if (is_string($_GET["pagina"])) {

      //Si la string es numérica, define la variable 'pagina'
      if (is_numeric($_GET["pagina"])) {

        //Si la petición desde la paginación es la página uno
        //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
        if ($_GET["pagina"] == 1) {
          header("Location: resultado.php");
          die();
        } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
          $pagina = $_GET["pagina"];
        };

      } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
        header("Location: resultado.php");
        die();
      };
    };

  } else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
    $pagina = 1;
  };

  //Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
  $offset = ($pagina-1) * $limit;
  echo $pagina;
  echo " ";
  echo $offset;
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de busqueda</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">

    <?php require_once('includes/navbar.php') ?>
    <?php require_once('includes/header.php') ?>
  </head>
  <body>
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <?php 
          if (isset($_GET['buscar'])) {  
            $categoria=$_GET['categoria'];
            $autor=$_GET['nombre'];
            $creado=$_GET['created_at'];
            $texto=$_GET['body'];
            //query de busqueda
            $sql = "SELECT users.username, subtopic.nombre, posts.body, posts.created_at FROM mydb.posts \n"
                . "INNER JOIN mydb.users \n"
                . "ON posts.user_id = users.id\n"
                . "JOIN mydb.subtopic\n"
                . "ON posts.id_subtopic = subtopic.id\n"
                . "WHERE users.username LIKE '$autor' or subtopic.nombre LIKE '$categoria' or posts.body LIKE '$texto' or posts.created_at LIKE '$creado' ";

            $result = mysqli_query($conexion, $sql);

            //Cuenta el número total de registros
            $total_registros = mysqli_num_rows($result);

            //Obtiene el total de páginas existentes
            $total_paginas = ceil($total_registros / $limit);

            //query de busqueda con paginación
            $sqlPag = "SELECT users.username, subtopic.nombre, posts.body, posts.created_at FROM mydb.posts \n"
                . "INNER JOIN mydb.users \n"
                . "ON posts.user_id = users.id\n"
                . "JOIN mydb.subtopic\n"
                . "ON posts.id_subtopic = subtopic.id\n"
                . "WHERE users.username LIKE '$autor' or subtopic.nombre LIKE '$categoria' or posts.body LIKE '$texto' or posts.created_at LIKE '$creado' 
                  LIMIT $offset, $limit";

            $resultPag = mysqli_query($conexion, $sqlPag);

            echo "<table>
                    <tr>
                      <td><center>Categoria</center></td>
                      <td><center>Autor</center></td>
                      <td><center>Fecha</center></td>
                      <td><center>Texto</center></td>
                    </tr>";
            while ($consulta = mysqli_fetch_array($resultPag)) {
              echo "
                <tr>
                  <td><center>".$consulta['nombre']."</center></td>
                  <td><center>".$consulta['username']."</center></td>
                  <td><center>".$consulta['created_at']."</center></td>
                  <td><center>". substr($consulta['body'], 0, 50) ."...</center></td>
                </tr>";
            }
            echo "</table>";
          }
        ?>
        <hr><!----------------------------------------------->

      | <?php
          //Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
          //Nota: X = $total_paginas
          for ($i=1; $i<=$total_paginas; $i++) {
            //En el bucle, muestra la paginación
            echo "<a href='?pagina=".$i."'>".$i."</a> | ";
          }
        ?>
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

        