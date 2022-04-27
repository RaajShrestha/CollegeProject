<?php
    session_start();
    require_once("connectDatabase.php");
    // ini_set('display_errors', 0);
    // ini_set('display_startup_errors', 0);
?>

<?php
    if(!isset($_POST['submit'])){
        echo "Error Occur!!!";
    }else{
        $pass = $_POST['password'];
        $repass = $_POST['repassword'];
        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
        $mail = $_SESSION['email'];
        $sql = "select * from `registration` where `Email` = '$mail'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            die("error");
        }

        $num = mysqli_num_rows($result);
        if($num){
            while($row = mysqli_fetch_assoc($result)){
                $number = preg_match('@[0-9]@', $pass);
                $uppercase = preg_match('@[A-Z]@', $pass);
                $lowercase = preg_match('@[a-z]@', $pass);
                $specialChars = preg_match('@[^\w]@', $pass);
                
                if(strlen($pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){
                    $validPass = false;
                    echo "nothing entered ";
                }else{
                    if($pass == $repass){
                        $match = true;
                        $change = "UPDATE `registration` SET `Password` = '$hash_pass' WHERE `Email` = '$mail'";
                        $check = mysqli_query($conn, $change);
                        if($check){
                            // echo "update successfully";
                            header("location: login.php");
                        }
                    }
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
    <title>Change Password</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">Change Password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <p class="text-center">Use the form below to change your password. Your password cannot be the same as
                    your username.</p>
                <form method="post" id="passwordForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="password" class="input-lg form-control" name="password" id="password1" placeholder="New Password" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                                if($validPass){
                                    // echo '<span id="8char" class="" style="color:#FF0004;">"Your password is strong."</span>';
                                }else{
                                    echo '<span id="8char" class="" style="color:#FF0004;">"Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character."</span>';
                                }
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <span id="lcase" class="" style="color:#FF0004;"></span><br>
                            <span id="num" class="" style="color:#FF0004;"></span>
                        </div>
                    </div>
                    <input type="password" class="input-lg form-control" name="repassword" id="password2" placeholder="Repeat Password" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php 
                                if($match){
                                    // echo '<span id="pwmatch" class="" style="color:#FF0004;">Password Matched...</span>';
                                }else{
                                    echo '<span id="pwmatch" class="" style="color:#FF0004;">Password Not Matched!!!</span>';
                                }
                                ?>
                        </div>
                        
                        <div class="col-sm-12 text-right">
                            <input type="checkbox" name="checkbox" id="checkbox"> 
                            <label for="checkbox" id="show" onclick="show()">Show Password</label>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
                </form>
                <?php
                    mysqli_close($conn);
                    }
                ?>
            </div>
        </div>
</body>
<script>
    function show(){
        let password = document.getElementById('password1');
        let repassword = document.getElementById('password2');
        if(password.type == 'password' || repassword.type == 'password'){
            password.type = 'text';
            repassword.type = 'text';
            document.getElementById('show').style.color = 'red';
        }else{
            password.type = 'password';
            repassword.type = 'password';
            document.getElementById('show').style.color = 'black';
        }
    }
</script>
</html>