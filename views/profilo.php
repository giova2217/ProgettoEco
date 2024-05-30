<?php
// Starting the session
session_start();
include_once '../controllers/fetch_articles.php';
include_once '../controllers/fetch_comments.php';

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
  <link rel="stylesheet" href="../assets/styles/profile.css">
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
		<h1 class="main-title">Benvenuto <?= $username ?>, nella pagina di gestione del tuo profilo.</h1>

		<!-- ADMIN PANEL -->
		<?php 
			if($username == 'admin'):
		?>
		<!-- PUBLISHED USERS' ARTICLES LIST -->
		<h2 class="sub-title">Articoli pubblicati dagli utenti</h2>
		<div class="post-container">
			<section class="posts-section" style="max-width: none;">
				<!-- Article Container -->
				<div class="post">
					<ol class="post-content">

				<?php
					$articles = $articleModel->getEveryArticle();
					// Check if there are any created articles
					if (!empty($articles)) {
						
						// Output articles
						foreach ($articles as $article) {
							// If the article is made by the admin, skip it
							if("admin" == $articleModel->getUsernameByArticleId($article['id'])) {
								continue;
							}

							$articleId = $article['id'];
							$title = $article['title'];
							$author = $articleModel->getUsernameByArticleId($articleId);
							$creationDate = $article['creation_date'];
							$category = $articleModel->getCategoryNameFromArticleId($articleId);
							$approved = $article['approved'];

				?>
						<li class="items-list">
							<a class="category"><?= $category; ?></a>
							<a href="articolo.php?id=<?= $articleId; ?>" class="title" style="margin-bottom	: 0px;"><?= $title; ?></a>
							<span style="font-size: x-large;">Autore: <b><?= $author?></b></span>
							<div class="action-div">
								<a href="articolo.php?id=<?= $articleId; ?>" class="read-article-button read-link" style="color: white;">Leggi</a>
								<?php
								// If the article is not approved the button will be visible
								if(!$approved):
								?>
								<a href="../controllers/approve_article.php?article_id=<?= $articleId ?>" class="read-article-button update-link" style="color: white;">Approva</a>
								<?php endif; ?>
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

		<!-- PUBLISHED USERS' COMMENTS LIST -->
		<h2 class="sub-title">Ultimi <?= $commentsLimit ?> commenti pubblicati dagli utenti</h2>
		<div class="post-container">
			<section class="posts-section" style="max-width: none;">
				<div class="post">
					<ol class="post-content">
						<?php
						// Check if there are any comments in the database
						if (!empty($comments)) {
							foreach ($comments as $comment) {
								// If the comment is made by the admin, skip it
								if($comment['username'] == "admin") {
									continue;
								}
								$commentId = $comment['id'];
								$author = $comment['username'];
								$content = $comment['content'];
								$creationDate = $comment['date'];

								$articleInfo = $commentModel->getArticleInfoByCommentId($commentId);
						?>
						<li class="comment-content">
								<span>Nome categoria: </span><span class="category" style="font-size: x-large;"><?= $articleInfo['category_name'];?></span><br>
								<span>Titolo dell'articolo: <b><?= $articleInfo['article_title'];?></b></span><br>
								<span>Autore: <b><?= $author?></b></span>
								<p><?= $content; ?></p>
								<span><?= $creationDate; ?></span>
								<div class="action-div">
									<a href="articolo.php?id=<?= $articleInfo['article_id']; ?>" class="read-article-button read-link" style="color: white;">Leggi</a>
									<!--<a href="articolo.php?id=<?php //echo $articleInfo['article_id']; ?>" class="read-article-button update-link" style="color: white;">Modifica</a>-->
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

		<?php
			endif;
		?>

		<!-- PUBLISHED ARTICLES LIST -->
		<h2 class="sub-title">Articoli che hai pubblicato</h2>
		<div class="post-container">
      <section class="posts-section" style="max-width: none;">
				<!-- Article Container -->
				<div class="post">
					<ol class="post-content">

        <?php
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
							<a href="articolo.php?id=<?= $articleId; ?>" class="title" style="padding-bottom: 0px; margin-bottom: 0px;"><?= $title; ?></a>
							<p style="font-size: x-large;"><?= $creationDate;?></p>
							<div class="action-div">
								<a href="articolo.php?id=<?= $articleId; ?>" class="read-article-button read-link" style="color: white;">Leggi</a>
								<!--<a href="articolo.php?id=<?php //echo $articleId; ?>" class="read-article-button update-link" style="color: white;">Modifica</a>-->
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
								<p><?= $content; ?></p>
								<span><?= $creationDate; ?></span>
								<div class="action-div">
									<a href="articolo.php?id=<?= $articleInfo['article_id']; ?>" class="read-article-button read-link" style="color: white;">Leggi</a>
									<!--<a href="articolo.php?id=<?php //echo $articleInfo['article_id']; ?>" class="read-article-button update-link" style="color: white;">Modifica</a>-->
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

		<!-- LOGOUT -->
		<div class="logout-div">
			<h2 class="sub-title">Vuoi disconnetterti?</h2>
			<div class="post-container">
				<section class="posts-section" style="max-width: none;">
					<a href="../controllers/logout.php" class="read-article-button delete-link">Disconnettiti</a>
				</section>
			</div>
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