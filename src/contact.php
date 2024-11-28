<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Your message has been sent successfully. Thank you!');
                window.location.href = window.location.href; // Reloads the same page
              </script>"; 
    } else {
        echo "<script>
                alert('Sorry, there was an error saving your message. Please try again later.');
                window.location.href = window.location.href; // Reloads the same page
              </script>"; 
    }
}    

$conn->close();
?>
