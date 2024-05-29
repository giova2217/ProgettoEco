<header class="header" id="header">
  <nav class="nav container">
    <a href="home.php" class="nav__logo" style="display: flex; align-items: center;">
      <img src="../assets/images/logo.png" alt="logo" draggable="false" style="height: 40px; width: 40px; margin-right: 15px;">
      <p>Progetto Eco</p>
    </a>
    <div class="nav__menu" id="nav-menu">
      <ul class="nav__list">
        <li class="nav__item" id="home">
          <a href="home.php" class="nav__link">Home</a>
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

      <?php if (isset($_SESSION['username'])): ?>
        <!-- Display Username when logged in -->
        <span class="nav__username"><?php echo "<a href='../views/profilo.php' class='nav__link' title='Vai al tuo profilo.'>" . htmlspecialchars($_SESSION['username']); "</a>"?></span>
      <?php else: ?>
        <!-- Login button when not logged in -->
        <i class="ri-user-line nav__login" id="login-btn"></i>
      <?php endif; ?>

      <!-- Toggle button -->
      <div class="nav__toggle" id="nav-toggle">
        <i class="ri-menu-line"></i>
      </div>
    </div>
  </nav>

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
        <p class="login__signup" style="font-size: 1rem;">
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
</header>

<!--=============== MAIN JS ===============-->
<script src="../assets/js/main.js"></script>   
