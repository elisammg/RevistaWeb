<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
    <center>
<br>
     <form class="" action="db_insertar.php" method="get" enctype="multipart/form-data">
        <div class="">
        <label for="id">Identificacion</label>
        <input type="number" name="id" required placeholder="Ingrese identificacion">
        </div>
      <br>
        <div class="">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" required placeholder="Ingrese nombre">
        </div>
<br>
        <div class="">
          <label for="birthdate">Fecha de Nacimiento</label>
          <input type="date" name="birthdate" required placeholder="Ingrese fecha de nacimiento">
        </div>
<br>
        <div class="">
          <label for="apellido">Apellido</label>
          <input type="text" name="apellido" required placeholder="Ingrese apellido">
        </div>
<br>
        <div class="">
          <label for="genero">Genero</label>
          <input type="text" name="genero" required placeholder="Ingrese genero">
        </div>
<br>
        <div class="">
          <label for="contratacion">Fecha de contratacion</label>
          <input type="date" name="contratacion" required placeholder="Ingrese fecha de contratacion">
        </div>
<br>
          <button type="submit" name="enviar">Enviar</button>

        </form>

            </center>
          </body>
        </html>

        <!--
        <div class="foto"><label for=""></label>
          <input type="file" name="foto" required>
        </div>




      <form action="formget.php" method="get">
    Nombre: <input type="text" name="nombre"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" value="Enviar">
      </form>

      Hola <?php isset($_GET["nombre"]) ? print $_GET["nombre"] : ""; ?><br>
      Tu email es: <?php isset($_GET["email"]) ? print $_GET["email"] : ""; ?> -->
