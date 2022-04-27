<?php
    session_start();

    if(!(isset($_SESSION['username']))){
        echo "You are logged out";
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <div class="container">
        <h1>
            This is home... for <?php echo $_SESSION['username']; ?>
        </h1>

        <h2>Now you can do what do you want to do!!!</h2>
    </div>

    <div class="button">
        <a href="logout.php"><button>LogOut</button></a>
    </div>
</body>
</html>