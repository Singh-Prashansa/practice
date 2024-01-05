<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
</head>
<body>
    <h1>View Users</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>Country</th>
            <th>Status</th>
        </tr>

        <?php
        include('connection.php');

        // Construct the SQL query based on the provided parameters
        $q = "SELECT ID, email, birthdate, country, status FROM user";
        $result = mysqli_query($con, $q) or die("Query error");

        // Display user data in a table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["birthdate"] . "</td>";
                echo "<td>" . $row["country"] . "</td>";
                echo "<td><button class='status-button' data-user-id='" . $row["ID"] . "' data-current-status='" . $row["status"] . "'>" . $row["status"] . "</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }

        // Close connection
        mysqli_close($con);
        ?>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".status-button").click(function() {
                var userId = $(this).data('user-id');
                var currentStatus = $(this).text().trim();
                var statusCell = $(this);

                if (currentStatus === 'Pending') {
                    statusCell.text("Active");

                    $.ajax({
                        type: "POST",
                        url: "changestatus.php",
                        data: { ID: userId, newStatus: "Active" },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else if (currentStatus === 'Active') {
                    statusCell.text("Pending");

                    $.ajax({
                        type: "POST",
                        url: "user_revert_status.php",
                        data: { ID: userId, newStatus: "Pending" },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
