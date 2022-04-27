<?php include 'connectDatabase.php';?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $Jtit =  $_REQUEST['title'];
    $comp =  $_REQUEST['compname'];
    $cont = $_REQUEST['contact'];
    $email =  $_REQUEST['email'];
    $expd = $_REQUEST['expdate'];
    $add = $_REQUEST['address'];
    $desc = $_REQUEST['desc'];
    if(!($Jtit == '' || $comp == '' || $cont == '' || $email == '' || $expd == '' || $add == '' || $desc == '')){
        $sql = "INSERT INTO `openvacancy` (`Job Title`, `Company`, `Contact`, `Email`, `Expiry Date`, `Address`, `Description`) VALUES ('$Jtit', '$comp', '$cont', '$email', '$expd', '$add', '$desc')";
    
        $result = mysqli_query($conn, $sql);
    
        if(!$result){
            echo "Data can't inserted !!!";
        }
        header("location: vacancy.php");
    }else{
        die ("Please Fill all the boxes and try again...");
    }

    mysqli_close($conn);

}
?>