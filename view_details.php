<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/viewdetails.css">
</head>
<body>
<p>Registration Records<p>
<?php
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this to your MySQL username (default is root for WAMP)
$password = ""; // By default, there's no password for root in WAMP
$dbname = "register_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the table
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Password</th><th>Address</th><th>Phone no.</th><th>Email address</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["Name"]."</td><td>".$row["Password"]."</td><td>".$row["Address"]."</td><td>".$row["Phone"]."</td><td>".$row["Email"]."</td></tr>";
    }
    echo "</table>";
$conn->close();
?> 
</body>
</html>