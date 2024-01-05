<!-- display all the movies -->
<html>
<style >
th {
    background-color:gray;
    padding:7px;
    margin:5px;
}
a{
    text-decoration:none;
    color:black;
}
td{
    padding:7px;
}

   

</style>
</html>
<?php

include("connection.php");

$q="select * from list_of_movies";
$result=mysqli_query($con,$q) or die("query error");

echo "<table border=1 class='table'>";
echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Year</th><th>Genre</th><th>Rating</th><th>Action<//th><th>Edit</th></tr>";
while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo"<tr>";
    foreach($data as $key =>$value){
        echo "<td> $value </td>";
        
    }
    $id=$data['id'];
    echo"<td> <a href='delete.php?id=$id' onclick='return confirm(\"are you sure to delete\")'>Delete</a></td>";
    echo"<td> <a href='edit_form.php?id=$id'>Edit</a></td>";
    // echo"<td> <a href='view_item.php?id=$id'>View</a></td>";

    echo"</tr>";
}
echo"<table>";

?>
