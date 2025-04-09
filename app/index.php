<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "sampledb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to MySQL DB<br>";

$result = $conn->query("SELECT * FROM users");
while ($row = $result->fetch_assoc()) {
    echo "User: " . $row["name"] . "<br>";
}
?>
