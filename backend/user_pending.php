<!DOCTYPE html>
<html>
<head>
    <title>Pending Users</title>
</head>
<body>
    <h1>List of Pending Users</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            
        </tr>

        <?php
        include('connection.php');

        // Construct the SQL query based on the provided parameters
        $q = "SELECT ID, firstname, lastname, email,status FROM user_status WHERE status='pending'";
        $result = mysqli_query($con, $q) or die("Query error");

        // Display user data in a table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["firstname"] . "</td>";
                echo "<td>" . $row["lastname"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }

        // Close connection
        mysqli_close($con);
        ?>
    </table>

</body>
</html>
