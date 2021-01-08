<?php
require_once 'config/config.php';


if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con,"SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else{
    header("Location: register.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    <title>SocioBuddy</title>
</head>
<body>

<div class="top_bar">
    <div class="logo">
        <a href="index.php">SocioBuddy</a>
    </div>

    <nav>
        <a href="<?php echo $userLoggedIn?>">
            <?php echo $user['first_name']?>
        </a>
        <a href="#">
            <i class="fa fa-home fa-lg" title="Home"></i>
        </a>
        <a href="#">
            <i class="fa fa-envelope fa-lg" title="Message"></i>
        </a>
        <a href="#">
            <i class="fa fa-bell-o fa-lg" title="Notifications"></i>
        </a>
        <a href="#">
            <i class="fa fa-users fa-lg" title="Users"></i>
        </a>
        <a href="#">
            <i class="fa fa-cog fa-lg" title="Setting"></i>
        </a>

        <a href="includes/handlers/logout.php">
            <i class="fa fa-sign-out fa-lg"></i>
        </a>
    </nav>

</div>


<div class="wrapper">