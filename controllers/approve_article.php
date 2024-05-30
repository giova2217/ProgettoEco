<?php
// Starting a session
session_start();

require_once '../models/Article.php'; // Article model
require_once '../includes/db_connect.php'; // Database connection

$articleId = $_GET["article_id"];

// Creating a new Article instance
$article = new Article($conn); // Passing the database connection to the Article model
$result = $article->approveArticle($articleId);

// Redirecting after the approval
if ($result) {
  echo "<script type='text/javascript'>alert('Approvazione riuscita.');
          window.location.href = '../views/profilo.php';  
        </script>";
  exit();
} else {
  echo "<script type='text/javascript'>alert('Errore nell'approvazione dell'articolo.');
          window.location.href = '../views/profilo.php';  
        </script>";
  exit();
}