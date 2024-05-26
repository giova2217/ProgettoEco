<?php
class User {
	private $conn;

	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function userExists($username) {
		$query = "SELECT id FROM users WHERE username = ?";
		$stmt = mysqli_prepare($this->conn, $query);
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		
		$numRows = mysqli_stmt_num_rows($stmt);
		
		mysqli_stmt_close($stmt);
		
		return $numRows > 0;
	}

	public function insertUser($username, $password) {
		$query = "INSERT INTO users (username, password, creation_date) VALUES (?, ?, NOW())";
		$stmt = mysqli_prepare($this->conn, $query);
		mysqli_stmt_bind_param($stmt, "ss", $username, $password);
		$result = mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);
		
		return $result;
	}

	public function login($username, $password) {
		$query = "SELECT id, username, password FROM users WHERE username = ?";
		$stmt = mysqli_prepare($this->conn, $query);
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $id, $dbUsername, $dbPassword);
		mysqli_stmt_fetch($stmt);
		
		mysqli_stmt_close($stmt);
		
		// Check if the user exists and the password is correct
		if ($dbUsername && password_verify($password, $dbPassword)) {
				return ['id' => $id, 'username' => $dbUsername];
		} else {
				return false;
		}
	}

	public function getUserIdFromUsername($username) {
		$userId = null;
		// Preparing and executing the SQL query to retrieve user_id from username
		$query = "SELECT id FROM users WHERE username = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->bind_result($userId);
		$stmt->fetch();
		$stmt->close();

		return $userId;
	}
}

?>
