<?php
$msg = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "user";

    $conn = mysqli_connect($servername,$username,$password,$database);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    if($num==1){
        $msg = "You are logged in";
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: home.php");
    }
    else{
        $msg = "something went wrong!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <h1>Log in to out Website</h1>
    <?php
    echo $msg;
    ?>
    <form action="/kushal/login.php" method="post">
        Username:
        <p><input type="text" name="username" size="100"></p>
        Password:
        <p><input type="password" name="password" size="100"></p>
        <input type="submit" value="Sign up">
</form>
</body>
</html>