<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['ID'];
    $newStatus = $_POST['newStatus'];

    // Update user's status in the database
    $sql = "UPDATE `user_status` SET `status` = ? WHERE `ID` = ?";
    
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "si", $newStatus, $userId);

    if (mysqli_stmt_execute($stmt)) {
        echo "Status updated successfully!";
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>


