<?php include('conexion.php'); ?>
<div class="grid-container">
<div class="grid-x grid-padding-x">
<div class="large-12 cell">
<form class="log-in-form" action="resultado.php" method="get" onsubmit="return validarForm(this)">
<h4 class="text-center">Buscar</h4>

<label for="categoria">Categoria</label>
<input type="text" name="categoria" placeholder="Ingrese categoria">

<label for="autor">Autor</label>
<input type="text" name="autor" placeholder="Ingrese Autor">

<label for="fecha">Fecha de Publicacion</label>
<input type="text" name="fecha" placeholder="Ingrese fecha de publicacion">

<label for="texto">Texto</label>
<input type="text" name="texto" placeholder="Ingrese texto similar">

<input type="submit" value="buscar" name="buscar">
</form>
</div>
</div>
</div>

