<?php
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
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  <title>Progetto Eco</title>
</head>
<body>
	<!--==================== HEADER ====================-->
	<?php @include("../includes/header.html"); ?>
  
  <div style="width: 100%; height: 150px;"></div>
  <!--==================== MAIN ====================-->
  <main class="main">

    <!--==================== CREATION SECTION ====================-->
    <form action="../controllers/create_article.php" method="post" class="login__form" name="create_article" id="create_article" enctype="multipart/form-data">
      <h2 class="login__title">Pubblica un nuovo articolo</h2>

      <div class="login__group">
        <div>
          <label for="article-name" class="login__label">Inserisci il titolo dell'articolo</label>
          <input type="text" placeholder="Inserisci un titolo" id="article-name" name="article-name" class="login__input" required>
        </div>

        <div>
          <label for="article-body" class="login__label">Inserisci il contenuto dell'articolo</label>

          <div id="editor-toolbar" class="toolbar">
            <button class="editor-btn" type="button" id="italic"><i class="fa-solid fa-italic"></i></button>
            <button class="editor-btn" type="button" id="underline"><i class="fa-solid fa-underline"></i></button>
            <button class="editor-btn" type="button" id="bold"><i class="fa-solid fa-bold"></i></button>
          </div>
          
          <div id="text-input" contenteditable="true" class="editor"></div>
          <textarea name="article-body" id="hidden-article-body" style="display: none;"></textarea>
        </div>

        <div>
          <label for="article-image" class="login__label">Inserisci un'immagine</label>
          <input class="login__input" type="file" id="article-image" name="article-image" accept="image/png, image/jpeg"/>
        </div>

        <div>
          <label for="article-category" class="login__label">Seleziona la categoria da assegnare all'articolo</label>
          <?php include_once '../controllers/fetch_categories.php'; ?>
        </div>

      </div>

      <button type="submit" class="login__button">Pubblica</button>
    </form>
  </main>
  
  <!--==================== FOOTER ====================-->
  <?php @include("../includes/footer.html"); ?>

  <script src="../assets/js/create_article.js"></script>
</body>
</html>