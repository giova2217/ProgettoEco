<?php
session_start();
include_once '../includes/db_connect.php';

if (isset($_POST['comment']) && isset($_POST['article_id']) && isset($_SESSION['user_id'])) {
  $comment = nl2br($_POST['comment']);
  $article_id = $_POST['article_id'];
  $user_id = $_SESSION['user_id'];

  // Save the comment to the database
  $query = "INSERT INTO comments (article_id, user_id, content, date) VALUES (?, ?, ?, NOW())";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("iis", $article_id, $user_id, $comment);

  if ($stmt->execute()) {
    // Redirect back to the article page
    header("Location: ../views/articolo.php?id=" . $article_id);
    exit();
  } else {
    echo "<script type='text/javascript'>alert('Errore durante l'inserimento del commento.');
          </script>";
  }

  $stmt->close();
  $conn->close();
} else {
  echo "<script type='text/javascript'>alert('Dati mancanti.');
          window.location.href = '../views/listaArticoli.php
        </script>";
  exit();
}
?>
