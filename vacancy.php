<?php include 'connectDatabase.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacancies</title>
    <!-- <link rel="stylesheet" media="all" href="vacancy.css"> -->
    <style>
        <?php include 'vacancy.css'; ?>
    </style>
    <link rel="stylesheet" media="all" href="terms.css">

    <!-- Google font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
</head>

<body>
    <h2 id="logo">fEmployee</h2><hr>
    <div class="search-bar">
        <a href="main.php">
            <img src="images/back_button.png" alt="" id="back_sign">
        </a>
        <i class="fa fa-search fa-2x" id="search-icon"></i>
        <input onkeyup="searchFilter()" type="text" name="search" placeholder="Search which skill you have ..." id="searchBox">
    </div>
    <hr>
    <div class="container1" id="container">
        <?php

            $sql = "SELECT * FROM openvacancy ORDER BY `S.N.` DESC";
            $result = mysqli_query($conn, $sql);
            // $num = mysqli_num_rows($result);
            // if($num >0 ){
            //     $row = mysqli_fetch_assoc($result);
            // }
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <?php
            echo '<div class="content" id="content">
                <div class="heading" id="heading">
                    <h3 id="title">' . $row['Job Title'] . '</h3>
                </div>
                <div class="parts">
                    <div class="part part1">
                        <article>
                            <span>' . $row['Company'] . '</span>
                            <span>' . $row['Address'] . '</span>
                            <span>' . $row['Email'] . '</span>
                        </article>
                    </div>
                    <div class="part part2">
                        <article>
                            <span>Opening Date:</span>
                            <span>' . $row['Open Date'] . '</span>
                            <span>Expiry Date:</span>
                            <span>' . $row['Expiry Date'] . '</span>
                        </article>
                    </div>
                </div>
                <div class="description">
                    <textarea disabled name="description" id="description" rows="10" disabled>' . $row['Description'] . '</textarea>
                </div>
                <input type="button" id="button" value="Enroll">
            </div>';
            ?>
        <?php   
                }
            } else {
                echo "0 results";
            }
            mysqli_close($conn);
        ?>
        
        
    </div>
    <hr>
    <div class="terms-conditions">
        <div class="terms">
            <h1 id="terms">Terms</h1>
            <a href="privacyPolicy.html" class="privacyPolicy">Privacy Policy</a>
            <a href="termsCondition.html" class="privacyPolicy">Terms and Conditions</a>
        </div>
        <h2 id="logo" class="logoE">fEmployee</h2>

        <div>
            <p class="copyright">
                fEmployee is a registered trademark of Freelancer Technology Pty Limited
            </p>
        </div>
        <div>
            <p class="copyright">
                Copyright &copy; 2022 Freelancer Technology Pty Limited
            </p>
        </div>
</body>

    <script>
        const searchFilter = () => {
            let filter = document.getElementById('searchBox').value.toUpperCase();
            let head = document.querySelector('.heading');
            
            for (var i = 0; i < head.length; i++){
                let job = head[i].getElementsByTagName('h3');
                let textValue = job.textContent || job.innerHTML;
                if(textValue.indexOf(filter) > -1){
                    head[i].style.display = '';
                }else{
                    head[i].style.display = 'none';
                }
            }
    }
    </script>

</html>