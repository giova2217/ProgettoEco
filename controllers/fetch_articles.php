<?php
    require_once '../includes/db_connect.php'; // Database connection
    require_once '../models/Article.php'; // Article model

    // Creating an instance of the Article model
    $articleModel = new Article($conn);

    // Fetching approved articles from the database using the model
    $articles = $articleModel->getApprovedArticles();
?>