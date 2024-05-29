<?php
// Starting the session
session_start();
include_once '../includes/db_connect.php'; // Database connection
include_once '../models/User.php'; // User model
include_once '../models/Article.php'; // Article model
include_once '../models/Comment.php'; // Comment model

// Check if the user_id is in the session
if (!isset($_SESSION['user_id'])) {
	header("Location: registrati.php");
	exit();
}

// Get user details
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Progetto Eco</title>

  <link rel="stylesheet" href="../assets/styles/styles.css">
  <link rel="stylesheet" href="../assets/styles/articlesList.css">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
	<style>
		.post-content {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
			gap: 20px;
		}

		.main-title {
			padding: 1rem;
		}

		.sub-title {
			padding: 1rem;
		}

		.items-list {
			justify-content: center;
			align-items: center;
			padding-left: 1rem;
		}

		.items-list a {
			padding-bottom: 0.2rem;
		}

		.items-list a:hover {
			color: var(--first-color);
		}

		.title {
			max-width: 100%;
		}
		
		.category:hover {
			cursor: pointer;
		}

		a.read-article-button {
			padding: 0;
			width: 8rem;
			height: 3rem;
		}

		.update-link {
			background-color: hsl(183, 100%, 25%);
		}
		
		.update-link:hover {
			background-color: hsl(112, 37%, 55%);
		}

		.delete-link {
			background-color: red;
		}
		
		.delete-link:hover {
			background-color: lightcoral;
		}

		.action-div {
			display: flex;
			gap: 10px;
		}

		.comment-content {
			font-size: x-large;
			margin: 1rem;
		}
		
		.comment-content .action-div a {
			font-size: var(--normal-font-size);
		}
	</style>
</head>
<body>
	<!--==================== HEADER ====================-->
	<?php @include("../includes/header.php"); ?>

	<div style="width: 100%; height: 100px;"></div>
	<main class="main">
		<h1 class="main-title">Benvenuto <?= $username ?>, nella pagina di gestione del tuo profilo.</h1>

		<!-- PUBLISHED ARTICLES LIST -->
		<h2 class="sub-title">Articoli che hai pubblicato</h2>
		<div class="post-container">
      <section class="posts-section" style="max-width: none;">
				<!-- Article Container -->
				<div class="post">
					<ol class="post-content">

        <?php
					$articleModel = new Article($conn);
					$articles = $articleModel->getArticlesByUserId($user_id);

          // Check if there are any created articles
          if (!empty($articles)) {
            
            // Output articles
            foreach ($articles as $article) {
              $articleId = $article['id'];
              $title = $article['title'];
              $creationDate = $article['creation_date'];
              $category = $articleModel->getCategoryNameFromArticleId($articleId);

        ?>
						<li class="items-list">
							<a class="category"><?= $category; ?></a>
							<a href="articolo.php?id=<?= $articleId; ?>" class="title"><?= $title; ?></a>
							<div class="action-div">
								<a href="articolo.php?id=<?= $articleId; ?>" class="read-article-button read-link" style="color: white;">Leggi</a>
								<a href="articolo.php?id=<?= $articleId; ?>" class="read-article-button update-link" style="color: white;">Modifica</a>
								<a href="../controllers/delete_article.php?article_id=<?= $articleId; ?>" class="read-article-button delete-link" style="color: white;">Elimina</a>
							</div>
						</li>
        <?php
            }
          } else {
              echo "<p>Nessun articolo trovato.</p>";
          }
        ?>
					</ol>
				</div>
      </section>
    </div>
		
		<!-- PUBLISHED COMMENTS LIST -->
    <h2 class="sub-title">Commenti che hai pubblicato</h2>
    <div class="post-container">
			<section class="posts-section" style="max-width: none;">
				<div class="post">
					<ol class="post-content">
						<?php
						$commentModel = new Comment($conn);
						$comments = $commentModel->getCommentsByUserId($user_id);

						// Check if there are any comments published by the user
						if (!empty($comments)) {
							foreach ($comments as $comment) {
								$commentId = $comment['id'];
								$content = $comment['content'];
								$creationDate = $comment['date'];

								$articleInfo = $commentModel->getArticleInfoByCommentId($commentId);
						?>
						<li class="comment-content">
								<span>Nome categoria: </span><span class="category" style="font-size: x-large;"><?= $articleInfo['category_name'];?></span><br>
								<span>Titolo dell'articolo: <b><?= $articleInfo['article_title'];?></b></span>
								<p>Contenuto del commento: <?= $content; ?></p>
								<span><?= $creationDate; ?></span>
								<div class="action-div">
									<a href="articolo.php?id=<?= $articleInfo['article_id']; ?>" class="read-article-button read-link" style="color: white;">Leggi</a>
									<a href="articolo.php?id=<?= $articleInfo['article_id']; ?>" class="read-article-button update-link" style="color: white;">Modifica</a>
									<a href="../controllers/delete_comment.php?comment_id=<?= $commentId; ?>" class="read-article-button delete-link" style="color: white;">Elimina</a>
								</div>
						</li>
							<?php
							}
						} else {
							echo "<p>Nessun commento trovato.</p>";
						}
							?>
					</ol>
				</div>
			</section>
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