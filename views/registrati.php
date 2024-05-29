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
<body>
	<!--==================== HEADER ====================-->
	<?php @include("../includes/header.php"); ?>
  
  <div style="width: 100%; height: 150px;"></div>
  <main class="main">
    <!--==================== SIGNUP ====================-->
    <form action="../controllers/signup.php" method="post" class="login__form">
      <h2 class="login__title">Registrati</h2>
      
      <div class="login__group">
        <div>
          <label for="username" class="login__label">Nome utente</label>
          <input type="text" placeholder="Inserisci il tuo username" id="username" name="username" class="login__input" required>
        </div>
          
        <div>
          <label for="password" class="login__label">Password</label>
          <input type="password" placeholder="Inserisci una password" name="password" class="login__input" required>
        </div>

        <div>
          <label for="confirm_password" class="login__label">Conferma password</label>
          <input type="password" placeholder="Inserisci la stessa password" name="confirm_password" class="login__input" required>
        </div>
      </div>

      <button type="submit" class="login__button">Registrati</button>
    </form>
  </main>
  
  <!--==================== FOOTER ====================-->
  <?php @include("../includes/footer.html"); ?>
</body>
</html>