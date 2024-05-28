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

  <link rel="stylesheet" href="../assets/styles/styles.css">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
<body>
  <!--==================== HEADER ====================-->
  <?php @include("../includes/header.html"); ?>

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
        <a href="articolo.php?id=7" class="articleLink">Leggi altro</a>
      </div>

      <div class="box" id="item2">
        <p class="category">Ambiente</p>
        <h2 class="title">Le implicazioni distruttive del disboscamento</h2>
        <a href="articolo.php?id=8" class="articleLink">Leggi altro</a>
      </div>

      <div class="box" id="item3">
        <p class="category">Riciclaggio</p>
        <h2 class="title">Il potere trasformativo del riciclaggio</h2>
        <a href="articolo.php?id=9" class="articleLink">Leggi altro</a>
      </div>
    </section>
  </main>

  <!--==================== FOOTER ====================-->
  <?php @include("../includes/footer.html"); ?>
</body>
</html>