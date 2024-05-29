<?php
include_once '../includes/db_connect.php'; // Database connection

// Query to retrieve categories
$query = "SELECT id, name FROM categories";
$result = mysqli_query($conn, $query);

// Check if categories were fetched successfully
if ($result) {
    echo "<select name='category-id' id='category' class='login__input' style='color: #8beb7c;'>";
    
    // Loop through categories and create options
    while ($row = mysqli_fetch_assoc($result)) {
        $categoryId = $row['id'];
        $categoryName = $row['name'];
        // Output option element
        echo "<option value='$categoryId' style='color: #8beb7c;'>$categoryName</option>";
    }
    
    // End select element
    echo '</select>';
} else {
    echo "Errore nella ricezione delle categorie";
}

// Close database connection
mysqli_close($conn);
?>
