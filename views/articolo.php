<?php 
include_once '../controllers/fetch_articles.php';
// Starting a session
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progetto Eco</title>

  <link rel="stylesheet" href="../assets/styles/styles.css">
  <link rel="stylesheet" href="../assets/styles/articlesList.css">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  <style>
    .post-content {
      font-size: x-large;
    }

    .meta {
      font-size: large;
    }

    .category {
      font-size: large;
    }

    article {
      margin: 0px 15vw;
    }

    .excerpt {
      font-size: x-large;
    }

    .article-image {
      height: 600px;
      max-width: 100%;
      object-fit: cover;
    }

    .title {
      font-size: xx-large;
    }
  </style>
</head>
<body>
<body>
	<!--==================== HEADER ====================-->
	<?php @include("../includes/header.php"); ?>
  
  <div style="width: 100%; height: 100px;"></div>
  <!--==================== MAIN ====================-->
  <main class="main">
    <?php
      // Checking if the article ID is provided in the URL
      if (isset($_GET['id'])) {
        // Retrieving the article ID from the URL
        $article_id = $_GET['id'];

        // Using the getArticleById function to fetch the article details
        $article = $articleModel->getArticleById($article_id);

        if ($article) {
            // If the article was found, it will store all of its details
            $articleId = $article['id'];
            $title = $article['title'];
            $body = $article['body'];
            $writer = $articleModel->getUsernameByArticleId($articleId);
            $creationDate = $article['creation_date'];
            $category = $articleModel->getCategoryNameFromArticleId($articleId);
            $imagePath = $articleModel->getImagePathByArticleId($articleId);
            ?>
            <!-- Article Container -->
            <article class="post">
              <!-- Article Image -->
              <a class="image-link" draggable="false">
                <img class="article-image" src="<?php echo $imagePath;?>" alt="<?php echo $title; ?>" draggable="false">
              </a>
              <div class="post-content">
                <p class="category"><?php echo $category; ?></p>
                <h2 class="title"><?php echo $title; ?></h2>
                <span class="meta">Scritto da <span class="author"><?php echo $writer; ?></span>, il <?php echo $creationDate; ?></span>
                <p class="excerpt"><?php echo $body; ?></p>
              </div>
            </article>

            <!-- Comment Form -->
            <?php if (isset($_SESSION['username'])): ?>
            <div class="post comment-form">
              <h2>Lascia un commento</h2>
              <form action="../controllers/add_comment.php" method="POST">
                <textarea name="comment" rows="5" required style="resize: none;" class="login__input"></textarea>
                <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                <button type="submit" class="login__button">Invia</button>
              </form>
            </div>
            <?php else: ?>
            <p class="post">Devi essere <a href="registrati.php">registrato</a> per lasciare un commento.</p>
            <?php endif; ?>
            
            <h1 class="post readers-comments">Commenti dei lettori</h1>

            <!-- Display Comments -->
            <?php
              $comments = $articleModel->getCommentsByArticleId($article_id);

              if ($comments) {
                foreach ($comments as $comment) {
                  $commentText = $comment['content'];
                  $commentDate = $comment['date'];
                  $userId = $comment['user_id'];
                  $username = $articleModel->getUsernameByUserId($userId);
                  ?>
                  <div class="post post-content article-comments">
                    <p class="author"><?php echo $username; ?></p>
                    <p><?php echo $commentText; ?></p>
                    <span class="meta"><?php echo $commentDate; ?></span>
                  </div>
                  <?php
                }
              } else {
                echo "<p class='post post-content' style='margin: 1rem 15vw; padding: 1rem;'>Ancora non &egrave; stato scritto nessun commento.</p>";
              }
            ?>

            <?php
        } else {
            echo "Articolo non trovato.";
        }
      } else {
        echo "Non è stato fornito nessun id di un articolo.";
      }
    ?>
  </main>

  <!--==================== FOOTER ====================-->
  <?php @include("../includes/footer.html"); ?>
</body>
</html>