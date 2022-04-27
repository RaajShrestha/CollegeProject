<?php 
session_start(); 
?>
<?php require_once("connectDatabase.php") ?>
<?php
    if(!(isset($_POST['submit']))){
        // echo "error occur";
    }else{
        $email = $_POST['email'];

        $sql = "select * from `registration` where `Email` = '$email'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "database not selected";
        }
        // else{
        //     echo "database found";
        // }
        $num = mysqli_num_rows($result);
        if($num){
            header('location:change.html');
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['password'] = $row['Password'];
                $_SESSION['email'] = $row['Email'];
            }
        }else{
            echo "Please insert valid email...";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgot.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="forgot">
                    <h2>Forgot your password?</h2>
                    <p>Change your password in three easy steps. This will help you to secure your password!</p>
                    <ol class="list-unstyled">
                        <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
                        <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary link</li>
                        <li><span class="text-primary text-medium">3. </span>Use the link to reset your password</li>
                    </ol>
                </div>
                <form method="post" action="change.php" class="card mt-4">
                    <div class="card-body">
                        <div class="form-group"> 
                            <label for="email-for-pass">Enter your email address</label> 
                            <input name="email" class="form-control" type="text" id="email-for-pass" required="">
                            <small class="form-text text-muted">Enter the email address you used during the registration.</small> 
                        </div>
                    </div>
                    <div class="card-footer"> 
                        <button class="btn btn-success" name="submit" type="submit">Get New Password</button>
                        <a href="login.php"><input class="btn btn-danger" type="button" value="Back to Login"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>