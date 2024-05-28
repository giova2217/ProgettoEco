<?php
// Starting a session
session_start();

// Include necessary files
include_once '../models/User.php'; // Include the User model
include_once '../includes/db_connect.php'; // Include the database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username and password
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Errore: Le password non coincidono. <a href='../views/registrati.php'>Riprova.</a>";
        exit;
    }

    // Check if user already exists
    $user = new User($conn); // Create a new User object
    if ($user->userExists($username)) {
        echo "Errore: L'utente esiste gi&agrave;. <a href='../views/registrati.php'>Riprova.</a>";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $inserted = $user->insertUser($username, $hashedPassword);

    // Check for successful insertion
    if ($inserted) {
        // Inserting the username in the created session
        $_SESSION['username'] = $username;
        echo "<script type='text/javascript'>alert('Registrazione effettuata.');
                window.location.href = '.../views/home.php';  
              </script>";
        exit();
    } else {
        session_destroy();
        echo "<script type='text/javascript'>alert('Errore durante la registrazione dell'utente.');
                window.location.href = '../views/registrati.php';
              </script>";
        exit();
    }
}

// Closing the database connection
mysqli_close($conn);
?>
