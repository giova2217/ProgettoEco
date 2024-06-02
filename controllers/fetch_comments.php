<?php
    require_once '../includes/db_connect.php'; // Database connection
    require_once '../models/Comment.php'; // Comment model

    // Creating an instance of the Comment model
    $commentModel = new Comment($conn);

    // Setting a limit the quantity of comments displayed
    $commentsLimit = 10;

    // Fetching comments from the database using the model
    $comments = $commentModel->getLatestComments($commentsLimit);
?>