<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'femployee';

    $conn = mysqli_connect($servername, $username, $password, $db);

    if(!$conn){
        die ("Connection failed !!!");
    }
    else{
        // echo "Connection Successful!!!";
    }
?>