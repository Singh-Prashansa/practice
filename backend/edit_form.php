<!-- edit about the movie -->
<?php
include('connection.php');

$id=$_POST['id'];
$q="select * from list_of_movies where  `id`=$id";


$result=mysqli_query($con,$q) or die("error");
$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<html>
<style>
    #p {
        position: absolute;
        left: 1.5in;
    }

    #q1 {
        position: relative;
        top: 1.2in;
    }

    #q2 {
        position: relative;
        top: 93.5px;
        ;
        left: 0.7in;
    }
</style>

<body>

    <form method="post" action="edited.php" enctype="multipart/form-data">
        <input type="hidden" name='id' value="<?php echo $data['id'];?>">
        <!-- key=column name , value =coulumn value -->

        <label for="">Movie Title</label>
        <input type="text" id="title" name="title" value="<?php echo $data['title'];?>"><br><br>
        <label for="">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" ><?php echo $data['description'];?></textarea><br><br>
        <label for="">Year</label>
        <input type="date" id="year" name="year"  value="<?php echo $data['year'];?>"><br><br>
        <label for="">Genre</label>
        <select name="genre" id="genre">
            <option value="drama" <?php if ($data['genre'] == 'drama') echo $data['genre']; ?>>Drama</option>
            <option value="comedy" <?php if ($data['genre'] == 'comedy') echo $data['genre']; ?>>Comedy</option>
            <option value="action" <?php if ($data['genre'] == 'action') echo $data['genre']; ?>>Action</option>
            <option value="thriller" <?php if ($data['genre'] == 'thriller') echo $data['genre']; ?>>Thriller</option>
        </select><br><br>
        <label for="">Rating</label>
        <input type="number" step=".1" id="rating" name="rating" max="10" min="0" value="<?php echo $data['rating'];?>"><br><br>
        <button type="submit">Edit</button>

    
    </form>
</body>

</html>