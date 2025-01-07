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


// Insert data into the table 
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql = "INSERT INTO user (Name,Password,Address,Phone,Email) VALUES ('$name', '$password', '$address', '$phone', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// update data into the table
if (isset($_POST["update"])) 
{
    $name = $_POST["name"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql = "UPDATE user set Password='$password',Address='$address',Phone='$phone',Email='$email' where Name='$name'";
    if ($conn->query($sql) === TRUE) {
        echo " Record Updated";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Delete data into the table
if (isset($_POST["del"])) {
    $deleteId = $_POST["delete-id"];

    // SQL to check if the ID exists
    $checkSql = "SELECT * FROM user WHERE Name='$deleteId'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // If the ID exists, proceed to delete
        $sql = "DELETE FROM user WHERE Name='$deleteId'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted SUCCESSFULLY :)";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // If the ID does not exist, show an error message
        echo "Error: No record found with the given Name.";
    }

    $conn->close();
}

?>