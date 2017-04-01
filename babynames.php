<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "HW3";
// Create connection
$con = new mysqli($servername, $username, $password,$dbname);

if (!$con) {
    die("HW3-Database connection failed: " . $conn->connect_error);
}
echo "HW3-Database connected successfully <br><br>";

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM babynames WHERE year =  '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>year</th>
<th>name</th>
<th>ranking</th>
<th>gender</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['ranking'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>