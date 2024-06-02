<?php include_once '../controllers/fetch_articles.php'; 
// Starting a session
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="../assets/styles/styles.css">
  <link rel="stylesheet" href="../assets/styles/articlesList.css">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  <title>Progetto Eco</title>
</head>
<body>
	<!--==================== HEADER ====================-->
	<?php @include("../includes/header.php"); ?>
  
  <div style="width: 100%; height: 100px;"></div>
  <!--==================== MAIN ====================-->
  <main class="main">
    <!--==================== ARTICLE SEARCH ====================-->

    <!--==================== ARTICLES LIST ====================-->
    <div class="container">
      <!-- Posts Section -->
      <section class="posts-section">

        <?php
          // Check if there are any articles
          if (!empty($articles)) {
            // Maximum length of the article's body to truncate
            $max_length = 500;
            
            // Output articles
            foreach ($articles as $article) {
              $articleId = $article['id'];
              $title = $article['title'];
              $complete_body = $article['body'];
              $writer = $articleModel->getUsernameByArticleId($articleId);
              $creationDate = $article['creation_date'];
              $category = $articleModel->getCategoryNameFromArticleId($articleId);
              $imagePath = $articleModel->getImagePathByArticleId($articleId);

              // Truncate the string
              $body = (strlen($complete_body) > $max_length) ? substr($complete_body, 0, $max_length) . '...' : $complete_body;

        ?>
              <!-- Article Container -->
              <article class="post">
                <!-- Article Image -->
                <a class="image-link" draggable="false">
                  <img src="<?php echo $imagePath;?>" alt="<?php echo $title; ?>" loading="lazy" draggable="false" style="max-height: 600px;">
                </a>
                <div class="post-content">
                  <a class="category"><?php echo $category; ?></a>
                  <a href="articolo.php?id=<?php echo $articleId; ?>" class="title"><?php echo $title; ?></a>
                  <span class="meta">Scritto da <span class="author"><?php echo $writer; ?></span>, il <?php echo $creationDate; ?></span>
                  <p class="excerpt"><?php echo $body; ?></p>
                  <a href="articolo.php?id=<?php echo $articleId; ?>" class="read-more">Continua la lettura</i></a>
                </div>
              </article>
        <?php
            }
          } else {
              echo "<p>Nessun articolo trovato.</p>";
          }
        ?>

        <!--
        <div class="pagination-container">
          <a href="#" class="pagination-button active">1</a>
          <a href="#" class="pagination-button">2</a>
          <a href="#" class="pagination-button arrow">&rarr;</a>
        </div>
        -->
      </section>
      
      <!-- Sidebar Section -->
      <aside class="sidebar">
        <?php $commentsLimit = 5 ?>
        <h2 class="sidebar-title">Ultimi <?= $commentsLimit ?> commenti</h2>
        <?php
          require_once '../models/Comment.php'; // Comment model
          $commentModel = new Comment($conn);
          $latestComments = $commentModel->getLatestComments($commentsLimit);
          
          if (!empty($latestComments)) {
            foreach ($latestComments as $comment) {
              $commentContent = $comment['content'];
              $commentAuthor = $comment['username'];
              $articleId = $comment['article_id'];
        ?>
              <!-- Comments -->
              <div class="comment">
                <p class="comment-author"><?php echo $commentAuthor; ?></p>
                <p class="comment-text"><?php echo $commentContent; ?></p>
                <a href="articolo.php?id=<?php echo $articleId; ?>" class="read-article-button">Leggi l'articolo</a>
              </div>
        <?php
            }
          } else {
            echo "<p>Nessun commento trovato.</p>";
          }
        ?>
      </aside>
    </div>
  </main>

  <!--==================== FOOTER ====================-->
  <?php @include("../includes/footer.html"); ?>
</body>
</html>

<?php
  // Closing database connection
  mysqli_close($conn);
?>