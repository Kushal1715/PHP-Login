<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php
    $_SESSION['username']
    ?></title>
</head>
<body>
    Welcome --
    <?php
    echo $_SESSION['username'];
    ?>
    to home page
    <p>You can <a href="/kushal/logout.php">logout</a> from here.

</body>
</html>