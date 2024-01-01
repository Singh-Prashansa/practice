<?php
include("connection.php");

$id=$_POST['id'];   //$_POST[name];
$title=$_POST['title'];
$description=$_POST['description'];
$year=$_POST['year'];
$genre=$_POST['genre'];
$rating=$_POST['rating'];


$q="INSERT INTO `list_of_movies` VALUES ($id,'$title','$description','$year','$genre',$rating)";

// move_uploaded_file($_FILES['photo'],['tmp_name'],"images/$photo");
// moving files to server folder
// move_uploaded_file($_FILES['photo']['tmp_name'],"images/$photo");
$result=mysqli_query($con,$q) or die(mysqli_query());
echo "success";
?>