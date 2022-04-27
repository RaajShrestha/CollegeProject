<?php include 'connectDatabase.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displaying</title>
    <style>
    </style>
</head>
<body>
    <?php 
        $sql = "SELECT * FROM `regis`";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="user">
            <span><?php echo $row['id']; ?></span>
            <strong><?php echo $row['username']; ?></strong><br>
            <div class="image">
                <img src="<?php echo $row['image']; ?>" alt="">
            </div>
        </div>
    <?php
            }
        }
        else{
            echo "Data not found";
        }
        mysqli_close($conn);
    ?>

    
</body>
</html>