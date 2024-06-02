<?php
require_once '../includes/db_connect.php'; // Database connection
require_once '../models/Article.php'; // Article model

// Starting the session
session_start();

// Checking if the user_id is in the session and if the article_id was found
if (isset($_SESSION['user_id']) && isset($_GET['article_id'])) {
  $user_id = $_SESSION['user_id'];
  $article_id = $_GET['article_id'];

  $articleModel = new Article($conn);

  // Checking if the user_id is 1 (admin) or the id in the session is equal to the article's author's id
  if($user_id == 1 || $user_id == $articleModel->getAuthorId($article_id)) {
    // Calling the delete article method in the article model
    if ($articleModel->deleteArticle($article_id)) {
      echo "<script type='text/javascript'>alert('Articolo rimosso con successo.');
              window.location.href = '../views/profilo.php';  
            </script>";
    } else {
      echo "<script type='text/javascript'>alert('Errore nella rimozione dell'articolo. Controlla se hai i permessi.');
              window.location.href = '../views/profilo.php';  
            </script>";
      exit();
    }
  } else {
    echo "<script type='text/javascript'>alert('Non si possiede l'autorizzazione per eliminare l'articolo.');
            window.location.href = '../views/profilo.php';  
          </script>";
    exit();
  }
} else {
  echo "<script type='text/javascript'>alert('Utente non connesso o ID dell'articolo non fornito.');
          window.location.href = '../views/profilo.php';  
        </script>";
  exit();
}
?>
