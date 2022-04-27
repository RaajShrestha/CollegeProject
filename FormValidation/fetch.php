<?php include 'connectDatabase.php' ?>
<?php
    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $img = $_FILES['image'];

        // echo $user;
        print_r($img);
        // echo "<br>";
        // $filename = $file['name'];
        // $filepath = $file['tmp_name'];
        // $fileerror = $file['error'];
        // if($fileerror == 0){
        //     $destfile = 'imagefolder/'. $filename;
        //     // echo $destfile;
        //     move_uploaded_file($filepath, $destfile);
        //     $sql = "INSERT INTO `regis` (`username`,`image`) VALUES ('$user', '$destfile')";
        //     $result = mysqli_query($conn, $sql);
        //     if($result){
        //         echo "inserted ";
        //     }else{
        //         echo "Not inserted ";
        //     }
        // }
    }
    else{
        echo "error";
    }
?>