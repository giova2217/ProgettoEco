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
  <link rel="stylesheet" href="../assets/styles/aboutus.css">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  <title>Progetto Eco</title>
</head>
<body>
  <!--==================== HEADER ====================-->
	<?php @include("../includes/header.php"); ?>
  
  <div style="width: 100%; height: 150px;"></div>
  <!--==================== MAIN ====================-->
  <main class="main">
    <section class="row-div" id="section2" style="scroll-margin-top: 90px;">
      <div class="row-content fade-in-left">
        <h1 class="title">Il nostro progetto</h1>

        <p>
          Benvenuti a Progetto Eco! Il nostro blog è una piattaforma dedicata all'ecosostenibilit&agrave; e alla natura. 
          Sentiti libero di creare e condividere blog e articoli approfonditi su questi argomenti. 
          Unisciti a noi nella diffusione della consapevolezza e della conoscenza sulla protezione del nostro ambiente.
        </p><br>
        
        <a title="Clicca per creare un nuovo articolo!" href="crea.php">
          <button type="button" class="login__button" action="crea.php" style="width: 200px;">Crea un nuovo articolo</button>
        </a>
      </div>
      <img src="../assets/images/logo.png" alt="Logo" class="image fade-in-right" draggable=false id="logo">
    </section>
  </main>

  <!--==================== FOOTER ====================-->
  <?php @include("../includes/footer.html"); ?>
</body>
</html>