
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

        $uname = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repassword = $_POST['repassword'];

        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
        $verify_pass = password_verify($pass, $hash_pass);

        $hash_repassword = password_hash($repassword, PASSWORD_DEFAULT);
        $verify_repassword = password_verify($repassword, $hash_repassword);
        
        if($uname == '' && $email == '' && $pass == '' && $repassword == ''){
            echo "You have to fill all the boxes :::";
        }
        elseif(!($verify_pass == $verify_repassword)){
            echo "Password doesn't match each other!! <br> Try again !!!";
        }else{

            $query = "SELECT * FROM `regis`";
            $out = mysqli_query($conn, $query);
            if(!$out){
                die ("error in out !!");
            }
            $num = mysqli_num_rows($out);

            if($num > 0){
                while($row = mysqli_fetch_assoc($out)){
                    if($email == $row['email']){
                        die ("Already exist , Try another email...");
                    }
                }
            }

            $sql = "INSERT INTO regis (`username`, `email`, `password`) VALUES ('$uname', '$email', '$hash_pass')";
            $result = mysqli_query($conn, $sql);

            if(!$result){
                die ("Data can't inserted !!!");
            }else{
                echo "Data inserted successfully!!!";
            }
        }
    }else{
        echo "error occur";
    }
    mysqli_close($conn);
?>