<?php
// Starting a session
session_start();

include_once '../controllers/fetch_featured_articles.php';  // Getting the featured articles' info
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Progetto Eco</title>

  <link rel="stylesheet" href="../assets/styles/styles.css">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
<body>
  <!--==================== HEADER ====================-->
  <?php @include("../includes/header.php"); ?>

  <div style="width: 100%; height: 100px;"></div>
  <!--==================== MAIN ====================-->
  <main class="main">
    <!--==================== FEATURED ARTICLES ====================-->
    <section class="featured">
      <p>Articoli in evidenza</p>
    </section>

    <section class="wrapper">
    <?php
      if (!empty($featuredArticles)):
        // Maximum length of the article's body to truncate
        $max_length = 100;
        
        // Number of articles in the foreach loop
        $cont = 0;

        // Output featured articles
        foreach ($featuredArticles as $featuredArticle):
          $cont++;
          $articleId = $featuredArticle['id'];
          $title = $featuredArticle['title'];
          $complete_body = $featuredArticle['body'];
          $writer = $articleModel->getUsernameByArticleId($articleId);
          $creationDate = $featuredArticle['creation_date'];
          $category = $articleModel->getCategoryNameFromArticleId($articleId);
          $imagePath = $articleModel->getImagePathByArticleId($articleId);
          
          // Truncate the string
          $body = (strlen($complete_body) > $max_length) ? substr($complete_body, 0, $max_length) . '...' : $complete_body;
          $body = htmlspecialchars($body);
          
          if ($cont == 1):
    ?>      
            <div class="box" id="item<?= $cont; ?>" style="background-image: url(<?=$imagePath;?>);">
              <p class="category"><?= $category; ?></p>
              <h2 class="title"><?= $title; ?></h2>
              <p class="description"><?= $body; ?></p>
              <a href="articolo.php?id=<?= $articleId; ?>" class="articleLink">Continua</a>
            </div>

      <?php
          else: ?>
            <div class="box" id="item<?= $cont; ?>" style="background-image: url(<?=$imagePath;?>);">
              <p class="category"><?= $category; ?></p>
              <h2 class="title"><?= $title; ?></h2>
              <a href="articolo.php?id=<?= $articleId; ?>" class="articleLink">Leggi</a>
            </div>
      <?php
          endif;
        endforeach;
      else:
        echo "<p>Nessun articolo in evidenza trovato.</p>";
      endif;
      ?>
    </section>

    <section class="read-articles">
      <a href="listaArticoli.php">Leggi gli articoli degli altri utenti...</a>
    </section>
  </main>

  <!--==================== FOOTER ====================-->
  <?php @include("../includes/footer.html"); ?>
</body>
</html>