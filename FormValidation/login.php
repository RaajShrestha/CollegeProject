<?php include 'C:\xampp\htdocs\College\connectDatabase.php' ?>

<?php  

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM `validation` WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);
        if($num > 0){
            while($row = mysqli_fetch_assoc($result)){
                if($num == 1){
                    if(password_verify($pass, $row['password'])){
                        echo "Login Successfully";
                    }
                    else{
                    }
                }else{
                    echo "login error";
                }
            }
        }

    }else{
        echo "error occur";
    }
    mysqli_close($conn);
?>