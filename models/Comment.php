<?php

class Comment {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new comment
    public function createComment($user_id, $article_id, $content) {
        $query = "INSERT INTO comments (user_id, article_id, content, date) VALUES (?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iis", $user_id, $article_id, $content);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Get all comments for an article
    public function getCommentsByArticleId($article_id) {
        $query = "SELECT comments.id, comments.content, comments.date, users.username FROM comments 
                  INNER JOIN users ON comments.user_id = users.id 
                  WHERE article_id = ? ORDER BY comments.date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $article_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $comments = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $comments;
    }

    // Get a single comment by its ID
    public function getCommentById($comment_id) {
        $query = "SELECT * FROM comments WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $comment_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $comment = $result->fetch_assoc();
        $stmt->close();
        return $comment;
    }

    // Delete a comment
    public function deleteComment($user_id, $comment_id) {
        $query = "DELETE FROM comments WHERE id = ? AND user_id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $comment_id, $user_id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }


    // Get latest comments with a limit in the quantity given
    public function getLatestComments($limit) {
      $query = "SELECT comments.content, comments.article_id, users.username 
                FROM comments 
                INNER JOIN users ON comments.user_id = users.id 
                ORDER BY comments.date DESC 
                LIMIT ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("i", $limit);
      $stmt->execute();
      $result = $stmt->get_result();
      $comments = $result->fetch_all(MYSQLI_ASSOC);
      $stmt->close();
      return $comments;
    }

    // Get all the comments written by an user
    public function getCommentsByUserId($user_id) {
        // Prepare the SQL query
        $query = "SELECT * FROM comments WHERE user_id = ?";
        
        // Prepare the statement
        $stmt = mysqli_prepare($this->conn, $query);
    
        // Bind the user_id parameter
        mysqli_stmt_bind_param($stmt, "i", $user_id);
    
        // Execute the statement
        mysqli_stmt_execute($stmt);
    
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
    
        // Initialize an empty array to store comments
        $comments = [];
    
        // Fetch comments and store them in the array
        while ($row = mysqli_fetch_assoc($result)) {
            $comments[] = $row;
        }
    
        // Close the statement
        mysqli_stmt_close($stmt);
    
        // Return the array of comments
        return $comments;
    }

    public function getArticleInfoByCommentId($commentId) {
        // Preparing the SQL query to fetch the article information related to the comment
        $query = "
        SELECT 
            comments.id AS comment_id,
            comments.content AS comment_content,
            comments.date AS comment_date,
            articles.id AS article_id,
            articles.title AS article_title,
            articles.creation_date AS article_creation_date,
            articles.category_id AS article_category_id,
            categories.name AS category_name
        FROM comments
        INNER JOIN articles ON comments.article_id = articles.id
        INNER JOIN categories ON articles.category_id = categories.id
        WHERE comments.id = ?";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $commentId);
        $stmt->execute();
        $result = $stmt->get_result();
        $articleInfo = $result->fetch_assoc();
        $stmt->close();
    
        return $articleInfo;
    }
    
  
}

?>
