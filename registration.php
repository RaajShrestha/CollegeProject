<?php session_start(); ?>

<?php include 'connectDatabase.php';?>
<?php
    if(!(isset($_POST['submit']))){
        die("error");
    }
    else{
        // For image upload
        $file = $_FILES['image'];
        // print_r($file);
        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];

        $fname =  $_POST['fname'];
        $lname = $_POST['lname'];
        $add = $_POST['address'];
        $gen = $_POST['gender'];
        $skill = $_POST['skill'];
        $phone = $_POST['phone'];
        $exp = $_POST['exp'];
        $desc = $_POST['desc'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repassword = $_POST['repassword'];

        $sqls = "SELECT * FROM `registration` where Email = '$email'";
        $result = mysqli_query($conn, $sqls);
        
        $numb = mysqli_num_rows($result);
        
        // Password verification
        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
        $verify_pass = password_verify($pass, $hash_pass);
        $hash_repass = password_hash($repassword, PASSWORD_DEFAULT);
        $hash_repass = password_verify($repassword, $hash_repass);

        $query = 'SELECT * FROM registration';
        $res = mysqli_query($conn, $query);
        $num = mysqli_num_rows($res);

        if($num > 0){
            while($row = mysqli_fetch_assoc($res)){
                if($numb > 0){
                    while($rows = mysqli_fetch_assoc($res)){
                        if($email == $row['Email']){
                            die ("Already exist , Try another email...");
                        }
                    }
                }
            }
        }else{
            echo "No data found!!!";
        }

        a:
        if($fileerror == 0){
            $destfile = 'imagefolder/'. $filename;
            // echo $destfile;
            move_uploaded_file($filepath, $destfile);
            if(!($fname == '' || $lname == '' || $add == '' || $skill == '' || $exp == '' || $desc == '' || $email == '' || $pass == '' || $phone == '')){
                if($pass == $repassword){
                    $sql = "INSERT INTO `registration` (`Name`, `Address`, `Gender`, `Skill`, `Phone`, `Experience`, `Description`, `Photo`, `Email`, `Password`) VALUES ('$fname $lname', '$add', '$gen', '$skill', '$phone', '$exp', '$desc', '$destfile', '$email', '$hash_pass')";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        echo "inserted ";
                        header("location: login.php");
                    }else{
                        echo "Not inserted ";
                    }
                }else{
                    die("Password must match each other...");
                }
            }else{
                die ("Please fill all the boxes and try again....");
            }
        }
    }
    mysqli_close($conn);
?>