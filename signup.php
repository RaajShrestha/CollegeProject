<?php include_once 'connectDatabase.php' ?>

<?php
    if(!(isset($_POST['submit']))){
        die ("error occur");
    }else{
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repassword = $_POST['repassword'];
        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
        $verify_pass = password_verify($pass, $hash_pass);
        $hash_repass = password_hash($repassword, PASSWORD_DEFAULT);
        $hash_repass = password_verify($repassword, $hash_repass);

        if($email == '' && $pass == ''){
            die ("You have to fill all the boxes :::");
        }elseif(!($pass == $repassword)){
            die ("Password must match each other...");
        }else{
            $query = "SELECT * FROM `signup`";
            $out = mysqli_query($conn, $query);
            if(!$out){
                die ("error in out !!");
            }
            $num = mysqli_num_rows($out);

            if($num > 0){
                while($row = mysqli_fetch_assoc($out)){
                    if($num > 0){
                        while($rows = mysqli_fetch_assoc($exist)){
                            if($email == $row['email']){
                                die ("Already exist , Try another email...");
                            }
                        }
                    }
                }

                $sql = "INSERT INTO `signup` (`email`, `password`) VALUES ('$email', '$hash_pass')";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    die ("Insertion Failed!!!");
                }else{
                    echo "Data Inserted successfully!!!";
                    // header('Location: login.php');
                }
            }
        }
    }

    mysqli_close($conn);
?>