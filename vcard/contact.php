<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "comment";
// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
   $message=htmlspecialchars($_POST['message']);
 // Prepare an SQL statement to insert the data into the database
 $stmt = $conn->prepare("INSERT INTO msg (name, email, msg_text) VALUES (?, ?, ?)");
 $stmt->bind_param("sss", $name, $email, $message);
 
 // Execute the statement and check for errors
 if ($stmt->execute()) {
     echo "New record created successfully";
 } else {
     echo "Error: " . $stmt->error;
 }
 
 // Close the statement and connection
 $stmt->close();
 $conn->close();
}
?>