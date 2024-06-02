<?php
session_start();
require_once '../includes/db_connect.php';
require_once '../models/Comment.php';

// Checking if comment data is set and user is logged in
if (isset($_POST['comment']) && isset($_POST['article_id']) && isset($_SESSION['user_id'])) {
  $commentContent = nl2br($_POST['comment']);
  $articleId = $_POST['article_id'];
  $userId = $_SESSION['user_id'];

  // Creating a new Comment object
  $commentModel = new Comment($conn);

  // Saving the comment to the database
  $inserted = $commentModel->createComment($userId, $articleId, $commentContent);

  if ($inserted) {
    // Redirect back to the article page
    header("Location: ../views/articolo.php?id=" . $articleId);
    exit();
  } else {
    echo "<script type='text/javascript'>alert('Errore durante l'inserimento del commento.');</script>";
  }

  // Close the database connection
  $conn->close();
} else {
  echo "<script type='text/javascript'>alert('Dati mancanti.');
          window.location.href = '../views/listaArticoli.php';
        </script>";
  exit();
}
?>
