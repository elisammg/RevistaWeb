<div class="grid-container">
  <div class="grid-x grid-padding-x">
<div class="large-6 medium-6 cell">
<h2><?php echo $topics['name'] ?></h2>
</div>
<div class="large-6 medium-6 cell">
<div class="callout">
<q><?php echo $topics['slug'] ?></q>
</div>
</div>
</div>
<div class="grid-x grid-padding-x">
<div class="large-6 medium-6 cell">
<!-- esto se repite -->
<?php
$topics['id'] = $topicid;  
$sql = "SELECT * FROM mydb.topics WHERE '$topicid' = (SELECT subtopic.id_topic FROM mydb.subtopic LIMIT 1)";
$result = mysqli_query($conexion, $sql);
if (mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result))
{
?>
<div class="callout">
<h2><a href="subcategoria.php?topic-slug=<?php echo navcat($row['slug']);?>">
              <?php navcat($row["id"]); ?></a></h2>
<q>Frase subcategoria</q>
<hr>
<input type="button" name="mas" value="Leer mas">         
</div>
<hr>
 <?php
       } //end while
     } //end if
       ?>
<!-- esto se repite -->
</div>
<div class="large-6 medium-6 cell">
<img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg">
</div>
</div>
<hr>
</div>
          
