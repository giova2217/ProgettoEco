<?php
include_once '../includes/db_connect.php'; // Database connection
include_once '../models/Comment.php'; // Comment model

session_start();

// Checking if the user is logged in and if the comment ID is provided
if (isset($_SESSION['user_id']) && isset($_GET['comment_id'])) {
  // Getting the user ID and comment ID
  $user_id = $_SESSION['user_id'];
  $comment_id = $_GET['comment_id'];

  // Creating an instance of the Comment model
  $commentModel = new Comment($conn);

  $comment = $commentModel->getCommentById($comment_id);

  // If user_id == 1 (admin) or user_id is equal to the own writer of the comment
  if($user_id == 1 || $user_id == $comment['user_id']) {
    // Calling the deleteComment method of the Comment model
    if ($commentModel->deleteComment($comment_id)) {
      echo "<script type='text/javascript'>alert('Commento rimosso con successo.');
              window.location.href = '../views/profilo.php';  
            </script>";
      exit();
    } else {
      echo "<script type='text/javascript'>alert('Errore nella rimozione del commento. Controlla se hai i permessi.');
              window.location.href = '../views/profilo.php';  
            </script>";
      exit();
    }
  }

 
} else {
  echo "<script type='text/javascript'>alert('Utente non connesso o ID del commento non fornito');
          window.location.href = '../views/profilo.php';  
        </script>";
  exit();
}
?>