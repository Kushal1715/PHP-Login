<?php
$msg = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "user";

    $conn = mysqli_connect($servername,$username,$password,$database);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $sqlExist = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn,$sqlExist);
    $num = mysqli_num_rows($result);

    if($num>0){
        $msg = "username already exists!";
    }
    else if($password != $cpassword){
        $msg = "password do not match!";
    }
    else{
        $sql = "INSERT INTO `users`(`username`,`password`,`date`) VALUES('$username','$password',current_timestamp())";
        $result2 = mysqli_query($conn,$sql);
        if($result2){
            $msg = "You are signed up!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <h1>Sign Up to out Website</h1>
    <?php
    echo $msg;
    ?>
    <form action="/kushal/signup.php" method="post">
        Username:
        <p><input type="text" name="username" size="100"></p>
        Password:
        <p><input type="password" name="password" size="100"></p>
        Confirm Password:
        <p><input type="password" name="cpassword" size="100"></p>
        <input type="submit" value="Sign up">
</form>
</body>
</html>