<?php
// Starting a session
session_start();

require_once '../models/User.php'; // User model
require_once '../includes/db_connect.php'; // Database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username and password
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Calling a method from User model to validate login
    $user = new User($conn); // Passing the database connection to the User model
    $loggedInUser = $user->login($username, $password);

    if ($loggedInUser) {
        // User authenticated successfully, setting session variables
        $_SESSION['user_id'] = $loggedInUser['id'];
        $_SESSION['username'] = $loggedInUser['username'];

        echo "<script type='text/javascript'>alert('Accesso riuscito.');
                window.location.href = '../views/profilo.php';  
              </script>";
        exit();
    } else {
        session_destroy();
        echo "<script type='text/javascript'>alert('Accesso fallito.');
                window.location.href = '../views/home.php';  
              </script>";
        exit();
    }
}


// Closing the database connection
mysqli_close($conn);
?>
