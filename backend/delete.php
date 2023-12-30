<!-- delete the movie -->
<?php

include('connection.php');

$id=$_GET['id'];
$query="delete from list_of_movies where `id`=$id";
$result=mysqli_query($con,$query) or die('error');
echo "deleted";
?>

