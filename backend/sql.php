<?php
$servername = "sql210.epizy.com";
$username = "epiz_30462177";
$password = "rNKJXDqzA9";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = mysqli_query($conn,"SELECT * FROM epiz_30462177_mul.events");

$result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
exit(json_encode($result));
//while($row = $result->fetch_assoc()){
//    echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["date"] . "<br>";
//    }