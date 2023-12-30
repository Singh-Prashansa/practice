<?php
include("connection.php");

if(isset($_POST['id'], $_POST['title'], $_POST['description'], $_POST['rating'], $_POST['genre'], $_POST['year'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    // Prepare the SQL query using prepared statements to prevent SQL injection
    $q = "UPDATE list_of_movies SET title=?, description=?, year=?, rating=?, genre=? WHERE id=?";
    
    // Prepare statement
    $stmt = mysqli_prepare($con, $q);
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'ssidsi', $title, $description, $year, $rating, $genre, $id); //(stmt,type(string,integer,double),para,para)
        
        // Execute statement
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            echo "Data updated successfully";
        } else {
            echo "Error updating data: " . mysqli_error($con);
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing statement";
    }
} else {
    echo "Missing POST data";
}
?>
