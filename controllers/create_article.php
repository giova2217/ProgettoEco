<?php
// Starting a session
session_start();

require_once '../models/Article.php'; // Article model
require_once '../includes/db_connect.php'; // Database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!isset($_SESSION['username'])) {
		echo "<script type='text/javascript'>alert('Devi autenticarti prima di creare un articolo.');
						window.location.href = '../views/registrati.php';  
					</script>";
		exit();
	}
	
	// Validating article details
	$articleName = trim($_POST["article-name"]);
	$articleBody = $_POST["article-body"];
	$articleBody = nl2br($articleBody);
	$category_id = $_POST["category-id"];

	$user_id = $_SESSION['user_id'];

	// Defining the default image path
	$defaultImagePath = "../assets/images/default.jpg";

	// Handle image upload
	if (isset($_FILES["article-image"])) {
		// Defining the directory where uploaded images will be stored
		$uploadDirectory = '../assets/images/uploads/';

		// Getting the file details
		$file = $_FILES["article-image"];
		$fileName = str_replace(' ', '_', $file["name"]);
		
		$filePath = $uploadDirectory . $fileName;

		// Check if the file was uploaded successfully
		$imagePath = (move_uploaded_file($file["tmp_name"], $filePath)) ? $filePath : $defaultImagePath;
	} else {
		// If image is not set, the default image path will be used
		$imagePath = $defaultImagePath;
	}

	// Creating a new Article instance
	$article = new Article($conn); // Passing the database connection to the Article model
	$newArticleId = $article->createArticle($articleName, $articleBody, $user_id, $category_id, $imagePath);

	// Redirecting after article creation
	if ($newArticleId) {
		// If the user is the admin (id = 1) the article will get approved automatically
		if ($user_id == 1) {
			// Approving the article
			$approvalSuccess = $article->approveArticle($newArticleId);

			echo "<script type='text/javascript'>alert('Articolo creato e approvato.');
							window.location.href = '../views/articolo.php?id=$newArticleId'
						</script>";
			exit();
		}

		// If the article was created successfully, redirect to the newly created article page
		header("Location: ../views/articolo.php?id=" . $newArticleId);
		exit();
	} else {
		echo "<script type='text/javascript'>alert('Errore nella creazione dell'articolo.');
						window.location.href = '../views/crea.php'
					</script>";
		exit();
	}
}
?>
