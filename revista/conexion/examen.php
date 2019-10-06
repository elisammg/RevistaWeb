<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<form action="" method="get">
    Salario: <input type="text" name="salarie"><br>
    <input type="submit" name = "submit" value="Submit Query">
</form>

<?php
$Salary = $_REQUEST["salarie"];

$sql = "SELECT first_name, last_name, dept_no, s.emp_no FROM employees e INNER JOIN dept_emp d ON e.emp_no = d.emp_no INNER JOIN salaries s ON s.emp_no = d.emp_no WHERE salary = $Salary LIMIT 5;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["first_name"]. " / ".  $row["last_name"]. " / ". $row["dept_no"]. " / ". $row["emp_no"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>