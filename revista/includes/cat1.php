<div class="grid-container">
  <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <h1><?php echo $topics['name'] ?></h1>
        <h4><?php echo $topics['slug'] ?></h4>        
          <div class="grid-x grid-padding-x">
        <div class="large-6 medium-6 cell">
          <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg">
        </div>

       <div class="large-6 medium-6 cell">
        <div class="callout">
                <h2>SubCategorias</h2>
                <hr>
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
                <dl>
                  <dt><a href="subcategoria.php?topic-slug=<?php echo navcat($row['slug']);?>">
              <?php navcat($row["id"]); ?></a></dt>
                  <dd>Frase subcategoria</dd>
                  <input type="button" name="leer" value="Leer mas">
                </dl>
<?php
} //end while
} //end if
?>
                <!-- esto se repite -->
              </div>
          </div>
        </div>
         
      </div>
  </div>
</div>


    
            