<!-- user homepage  -->
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('user_navbar.php');?>
    <br><br>
    welcome 
    <?php 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
    if(isset($_POST["email"])) {
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
    
        $position = strpos($email, '@'); // Finds the position of '@'
        if ($position !== false) {
            $substring = substr($email, 0, $position); // Gets "username"
        }
        echo $substring;}
    ?>
    <a href="">Logout</a>
    
</body>
</html>
