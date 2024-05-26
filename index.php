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
  <title>Progetto Eco</title>

  <link rel="stylesheet" href="assets/styles/styles.css">
  <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="./index.php" class="nav__logo" style="display: flex; align-items: center;">
        <img src="./assets/images/logo.png" alt="logo" draggable="false" style="height: 40px; width: 40px; margin-right: 15px;">
        <p>Progetto Eco</p>
      </a>
      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item" id="home">
            <a href="index.php" class="nav__link">Home</a>
          </li>

          <li class="nav__item" id="articoli">
            <a href="./pages/listaArticoli.php" class="nav__link">Articoli</a>
          </li>

          <li class="nav__item" id="crea">
            <a href="./pages/crea.php" class="nav__link">Crea</a>
          </li>

          <li class="nav__item" id="chisiamo">
            <a href="./pages/chisiamo.php" class="nav__link">Chi siamo</a>
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
    <form action="controllers/login.php" name="login_form" method="POST" class="login__form">
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
          Non hai ancora creato un account? <a href="./pages/registrati.php">Registrati</a>
        </p>
        <!-- <a href="#" class="login__forgot">
          Password dimenticata?
        </a> -->

        <button type="submit" class="login__button">Accedi</button>
      </div>
    </form>

    <i class="ri-close-line login__close" id="login-close"></i>
  </div>

  <!--==================== MAIN ====================-->
  <main class="main">
    <!--==================== FEATURED ARTICLES ====================-->
    <section class="wrapper">
      <div class="box" id="item1">
        <p class="category">Energia</p>
        <h2 class="title">Energia solare</h2>
        <p class="description">L'energia solare è una fonte di energia rinnovabile
          ottenuta dalla conversione della luce del sole in
          elettricità o calore utilizzabile. Questa forma di energia è ecologica...
        </p>
        <a href="pages/articolo.php?id=7" class="articleLink">Leggi altro</a>
      </div>

      <div class="box" id="item2">
        <p class="category">Ambiente</p>
        <h2 class="title">Le implicazioni distruttive del disboscamento</h2>
        <a href="pages/articolo.php?id=8" class="articleLink">Leggi altro</a>
      </div>

      <div class="box" id="item3">
        <p class="category">Riciclaggio</p>
        <h2 class="title">Il potere trasformativo del riciclaggio</h2>
        <a href="pages/articolo.php?id=9" class="articleLink">Leggi altro</a>
      </div>
    </section>
    

    <!--==================== FOOTER ====================-->
    <?php @include("includes/footer.html"); ?>
  </main>

  <!--=============== MAIN JS ===============-->
  <script src="assets/main.js"></script>  
</body>
</html>