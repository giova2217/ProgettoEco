<?php
    // Include database connection
    include_once '../includes/db_connect.php'; // Database connection
    include_once '../models/Article.php'; // Article model

    // Create an instance of the Article model
    $articleModel = new Article($conn);

    // Fetch approved articles from the database using the model
    $articles = $articleModel->getApprovedArticles();
?>