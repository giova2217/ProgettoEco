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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
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
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="../index.php" class="nav__logo" style="display: flex; align-items: center;">
        <img src="../assets/images/logo.png" alt="logo" draggable="false" style="height: 40px; width: 40px; margin-right: 15px;">
        <p>Progetto Eco</p>
      </a>
      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item" id="home">
            <a href="../index.php" class="nav__link">Home</a>
          </li>

          <li class="nav__item" id="articoli">
            <a href="listaArticoli.php" class="nav__link">Articoli</a>
          </li>

          <li class="nav__item" id="crea">
            <a href="crea.php" class="nav__link">Crea</a>
          </li>

          <li class="nav__item" id="chisiamo">
            <a href="chisiamo.php" class="nav__link">Chi siamo</a>
          </li>
        </ul>

        <!-- Close button -->
        <div class="nav__close" id="nav-close">
          <i class="ri-close-line"></i>
        </div>
      </div>

      <div class="nav__actions">
        <!-- Search button -->
        <i class="ri-search-line nav__search" id="search-btn"></i>

        <!-- Login button -->
        <i class="ri-user-line nav__login" id="login-btn"></i>

        <!-- Toggle button -->
        <div class="nav__toggle" id="nav-toggle">
          <i class="ri-menu-line"></i>
        </div>
      </div>
    </nav>
  </header>

  <!--==================== SEARCH ====================-->
  <div class="search" id="search">
    <form action="" class="search__form">
      <i class="ri-search-line search__icon"></i>
      <input type="search" placeholder="Cosa stai cercando?" class="search__input">
    </form>

    <i class="ri-close-line search__close" id="search-close"></i>
  </div>

  <!--==================== LOGIN ====================-->
  <div class="login" id="login">
    <form action="../controllers/login.php" name="login_form" method="POST" class="login__form">
      <h2 class="login__title">Accedi</h2>
      
      <div class="login__group">
        <div>
          <label for="username" class="login__label">Nome utente</label>
          <input type="text" name="username" placeholder="Inserisci il tuo username" id="username" class="login__input" required>
        </div>
          
        <div>
          <label for="password" class="login__label">Password</label>
          <input type="password" name="password" placeholder="Inserisci la tua password" id="password" class="login__input" required>
        </div>
      </div>

      <div>
        <p class="login__signup">
          Non hai ancora creato un account? <a href="registrati.php">Registrati</a>
        </p>
        <!-- <a href="#" class="login__forgot">
          Password dimenticata?
        </a> -->

        <button type="submit" class="login__button">Accedi</button>
      </div>
    </form>

    <i class="ri-close-line login__close" id="login-close"></i>
  </div>

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
            <?php
        } else {
            echo "Articolo non trovato.";
        }
      } else {
        echo "Non &egrave stato fornito nessun id di un articolo.";
      }
    ?>
            
    <!--==================== FOOTER ====================-->
    <?php @include("../includes/footer.html"); ?>
  </main>

  <!--=============== MAIN JS ===============-->
  <script src="../assets/main.js"></script>  
</body>
</html>