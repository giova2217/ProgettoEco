<?php
    require_once '../includes/db_connect.php'; // Database connection
    require_once '../models/Article.php'; // Article model

    // Creating an instance of the Article model
    $articleModel = new Article($conn);

    // Fetching featured articles from the database using the model
    $featuredArticles = $articleModel->getFeaturedArticles($conn);
?>