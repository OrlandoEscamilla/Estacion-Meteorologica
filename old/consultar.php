<?php
$servername = "localhost";
$username = "root";
$password = "6431";
$dbname = "estacion";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT temperatura FROM datos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["Id"]. " - Temperatura: ". $row["Temperatura"]. "- Fecha: " . $row["Hora"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>