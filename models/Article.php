<?php
class Article {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createArticle($title, $body, $user_id, $category_id, $imagePath = null) {
        $query = "INSERT INTO articles (title, body, user_id, category_id, image_path, creation_date) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssiis", $title, $body, $user_id, $category_id, $imagePath);
        $result = $stmt->execute();
        
        if ($result) {
            $newArticleId = $this->conn->insert_id; // Getting the ID of the article that was just created
        } else {
            $newArticleId = false;
        }

        $stmt->close();
        
        return $newArticleId; // Return the new article ID or false if INSERT failed
    }
    
    public function getEveryArticle() {
        // Getting all articles, regardless of approval status
        $query = "SELECT * FROM articles ORDER BY creation_date DESC";
        $result = mysqli_query($this->conn, $query);
        $articles = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $articles[] = $row;
            }
        }
        return $articles;
    }

    public function getApprovedArticles() {
        // Getting only the approved articles
        $query = "SELECT * FROM articles WHERE approved = 1 ORDER BY creation_date DESC";
        $result = mysqli_query($this->conn, $query);
        $articles = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $articles[] = $row;
            }
        }
        return $articles;
    }

    public function approveArticle($article_id) {
        $query = "
            UPDATE articles
            SET approved=1
            WHERE id = $article_id
        ";
    
        // Executing the query
        $result = mysqli_query($this->conn, $query);
    
        // Checking if the query was successful
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getArticleById($article_id) {
        // Preparing the SQL query to fetch the article details along with user and category information
        $query = "
            SELECT 
                articles.*, 
                users.username, 
                categories.name AS category_name
            FROM articles
            INNER JOIN users ON articles.user_id = users.id
            INNER JOIN categories ON articles.category_id = categories.id
            WHERE articles.id = $article_id;
        ";
    
        // Executing the query
        $result = mysqli_query($this->conn, $query);
    
        // Checking if the query was successful and if it returned any rows
        if ($result && mysqli_num_rows($result) > 0) {
            // Fetching the article details from the result set
            $article = mysqli_fetch_assoc($result);
            // Return the fetched article details
            return $article;
        } else {
            return null;
        }
    }
    
    public function getUsernameByArticleId($article_id) {
        $query = "SELECT users.username 
                  FROM users 
                  INNER JOIN articles ON users.id = articles.user_id 
                  WHERE articles.id = $article_id;";
        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['username'];
        } else {
            return "Nessuno scrittore trovato dato l'id dell'articolo.";
        }
    }
    
    public function getCategoryNameFromArticleId($article_id) {
        $query = "SELECT categories.name 
                  FROM categories 
                  INNER JOIN articles ON categories.id = articles.category_id 
                  WHERE articles.id = $article_id;";
        $result = mysqli_query($this->conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['name'];
        } else {
            return "Nessuna categoria trovata dato l'id dell'articolo.";
        }
    }

    public function getImagePathByArticleId($article_id) {
        $query = "SELECT image_path 
                  FROM articles 
                  WHERE id = $article_id;";
        $result = mysqli_query($this->conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['image_path'];
        } else {
            return "Nessun immagine trovata dato l'id dell'articolo.";
        }
    }
    
    public function getCommentsByArticleId($articleId) {
        $query = "SELECT * FROM comments WHERE article_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $articleId);
        $stmt->execute();
        $result = $stmt->get_result();
        $comments = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $comments;
    }

    public function getUsernameByUserId($userId) {
        $username = null;
        $query = "SELECT username FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->fetch();
        $stmt->close();
        return $username;
    }

    public function getArticlesByUserId($user_id) {
        // Prepare the SQL query
        $query = "SELECT * FROM articles WHERE user_id = ?";
        
        // Prepare the statement
        $stmt = $this->conn->prepare($query);
    
        // Bind the user_id parameter
        $stmt->bind_param("i", $user_id);
    
        // Execute the statement
        $stmt->execute();
    
        // Get the result
        $result = $stmt->get_result();
    
        // Initialize an empty array to store articles
        $articles = [];
    
        // Fetch articles and store them in the array
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    
        // Close the statement
        $stmt->close();
    
        // Return the array of articles
        return $articles;
    }
    
    public function deleteArticle($article_id) {
        // Prepare the DELETE SQL query
        $query = "DELETE FROM articles WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        // Bind the parameters
        $stmt->bind_param("i", $article_id);

        // Execute the statement
        $stmt->execute();

        // Check if the article was deleted successfully
        if ($stmt->affected_rows > 0) {
            // Article deleted successfully
            return true;
        } else {
            // Article not found or user does not have permission to delete
            return false;
        }

        // Close the statement
        $stmt->close();
    }

    public function getFeaturedArticles($conn) {
        $query = "SELECT articles.*, categories.name as category_name FROM articles
                  JOIN featured_articles ON articles.id = featured_articles.article_id
                  JOIN categories ON articles.category_id = categories.id
                  WHERE articles.approved = 1";
        $result = $conn->query($query);
    
        if ($result === false) {
            echo "Errore: " . $conn->error;
            return false;
        }
        $featuredArticles = $result->fetch_all(MYSQLI_ASSOC);
        
        return $featuredArticles;
    }

    public function getWriterId($article_id) {
        // Prepare the SQL query
        $query = "SELECT user_id FROM articles WHERE id = ?";
        
        // Prepare the statement
        $stmt = mysqli_prepare($this->conn, $query);
    
        // Bind the article_id parameter
        mysqli_stmt_bind_param($stmt, "i", $article_id);
    
        // Execute the statement
        mysqli_stmt_execute($stmt);
    
        // Bind the result to a variable
        mysqli_stmt_bind_result($stmt, $user_id);
    
        // Fetch the result
        mysqli_stmt_fetch($stmt);
    
        // Close the statement
        mysqli_stmt_close($stmt);
    
        // Return the writer's user_id
        return $user_id;
    }
}
?>
