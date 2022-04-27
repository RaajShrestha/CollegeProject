<?php 
session_start();
?>

<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'multiuser';

    $conn = mysqli_connect($servername, $username, $password, $db);

    if(!$conn){
        die ("Connection failed !!!");
    }
    else{
        // echo "Connection Successful!!!";
    }


    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM `regis` where email='$email'";
        $result = mysqli_query($conn, $sql);
        
        $num = mysqli_num_rows($result);
        if($num){
            $row = mysqli_fetch_assoc($result);

            $db_pass = $row['password'];

            $_SESSION['username'] = $row['username'];

            $pass_decode = password_verify($pass, $db_pass);

            if($pass_decode){
                echo "login successful";
                // header ('location:home.php');        or you can do in javascript
                ?>
                <script>
                    location.replace("home.php");
                </script>
                <?php
            }else{
                echo "password incorrect";
            }
        }else{
            echo "invalid email";
        }

    }else{
        echo "error occur";
    }
    mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<style>
    body{
        display: flex;
        align-items: center;
        flex-direction: column;
        margin-top: 20px;
    }
    form{
        transform: scale(2);
        margin-top: 80px;
    }
    input::placeholder{
        font-size: 8px;
    }
    form input{
        font-size: 10px;
        padding: 5px 10px;
        outline: 1px solid red ;
        border: none;
    }
    form input:focus{
        outline: 1px solid green;
    }
    form input:last-child{
        outline: 1px solid black;
    }
</style>
<body>
    <h1>Login Form</h1>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="form" method="post">
        <input type="email" placeholder="Enter Your Valid Email Address..." name="email" id="email"><br><br>
        <input type="password" placeholder="Enter Your Password..." name="password" id="password"><br><br>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>