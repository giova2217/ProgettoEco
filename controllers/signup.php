<?php
require_once '../models/User.php'; // User model
require_once '../includes/db_connect.php'; // Database connection
require_once "../controllers/csrf_token_controller.php"; // CSRF controller that prevents CSRF attacks
// The session is already started in the csrf controller

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Validate username and password
	$username = trim($_POST["username"]);
	$password = $_POST["password"];
	$confirmPassword = $_POST["confirm_password"];

	// Validate CSRF token
	if (!isset($_POST['csrf_token']) || !validate_csrf_token($_POST['csrf_token'])) {
		// Invalid CSRF token
		exit("CSRF token invalido.");
	}

	// Check if passwords match
	if ($password !== $confirmPassword) {
		echo "Errore: Le password non coincidono. <a href='../views/registrati.php'>Riprova.</a>";
		exit();
	}

	// Check if user already exists
	$user = new User($conn); // Create a new User object
	if ($user->userExists($username)) {
		echo "Errore: L'utente esiste gi&agrave;. <a href='../views/registrati.php'>Riprova.</a>";
		exit();
	}

	// Hash the password
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	// Insert the user into the database
	$inserted = $user->insertUser($username, $hashedPassword);

	// Check for successful insertion
	if ($inserted) {
		// Inserting the username in the created session
		$_SESSION['username'] = $username;
		$insertedUserId = mysqli_insert_id($conn);
		$_SESSION['user_id'] = $insertedUserId;
		
		echo "<script type='text/javascript'>alert('Registrazione effettuata.');
						window.location.href = '../views/profilo.php';  
					</script>";
		exit();
	} else {
		// Deleting the session
		$_SESSION = array(); 
		session_unset();
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
