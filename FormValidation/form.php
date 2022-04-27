<?php include 'C:\xampp\htdocs\College\connectDatabase.php' ?>
<?php

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repassword = $_POST['repassword'];

        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
        $verify_pass = password_verify($pass, $hash_pass);

        $hash_repassword = password_hash($repassword, PASSWORD_DEFAULT);
        $verify_repassword = password_verify($repassword, $hash_repassword);
        
        if($name == '' && $email == '' && $pass == '' && $repassword == ''){
            echo "You have to fill all the boxes :::";
        }
        elseif(!($verify_pass == $verify_repassword)){
            echo "Password doesn't match each other!! <br> Try again !!!";
        }else{

            $query = "SELECT * FROM `validation`";
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

            $sql = "INSERT INTO validation (`name`, `email`, `password`, `confirm_password`) VALUES ('$name', '$email', '$hash_pass', '$hash_repassword')";
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