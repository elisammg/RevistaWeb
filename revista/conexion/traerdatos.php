<?php
  include 'conexion.php';



$sql = "SELECT * FROM employees WHERE emp_no = 10000";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Numero de empleado: " . $row["emp_no"]. "<br>";
        echo "Primer Nombre: " . $row["first_name"]. "<br>";
        echo "Apellido: " . $row["last_name"]. "<br>";
    }
} else {
    echo "0 results";
}
?>
