<!DOCTYPE html>
<html>
<head>
    <title>Active Users</title>
</head>
<body>
    <h1>List of Active Users</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>Country</th>
            
        </tr>

        <?php
        include('connection.php');

        // Construct the SQL query based on the provided parameters
        $q = "SELECT ID, email, birthdate, country FROM user WHERE status='active'";
        $result = mysqli_query($con, $q) or die("Query error");

        // Display user data in a table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["birthdate"] . "</td>";
                echo "<td>" . $row["country"] . "</td>";
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
