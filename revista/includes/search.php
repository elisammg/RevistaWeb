
<div class="grid-container">
<div class="grid-x grid-padding-x">
<div class="large-12 cell">
<form class="log-in-form" action="resultado.php" method="get">
<h4 class="text-center">Buscar</h4>

<label>Categoria</label>
<input type="text" name="categoria" placeholder="Ingrese categoria">

<label>Autor</label>
<input type="text" name="nombre" placeholder="Ingrese Autor">

<label>Fecha de Publicacion</label>
<input type="hidden" name="fechahoy" value="<?php echo "" . date("Y-m-d h:i:s");
?>">
<input type="datetime-local" name="created_at" placeholder="Ingrese fecha de publicacion">

<label>Texto</label>
<input type="text" name="body" placeholder="Ingrese texto">

<input class="button" type="submit" value="Buscar" name="buscaruno">
<hr>
<h4>Seleccione ordenamiento</h4>
<input type="checkbox" name="search[]" value="categoriartc">Categoria
<input type="checkbox" name="search[]" value="nombreautor">Nombre Autor
<input type="checkbox" name="search[]" value="fechaartc">Fecha
<br>
<input class="button" type="submit" value="Buscar filtrado" name="buscardos">


</form>
</div>
</div>
</div>


