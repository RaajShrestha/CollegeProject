<?php include_once "connectDatabase.php" ?>
<?php 
    $sql = "SELECT * FROM registration ORDER BY `S.N.` DESC";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die ("Error in Selecting Database , <br> Please check!!!");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Workers</title>
    <!-- <link rel="stylesheet" href="hire.css"> -->
    <style>
        <?php include "hire.css" ?>
    </style>
    <link rel="stylesheet" href="terms.css">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container">
        <h2 id="logo">fEmployee</h2>
        <hr>
        <div class="search-bar">
            <a href="main.php">
                <img src="images/back_button.png" alt="" id="back_sign">
            </a>
            <i class="fa fa-search fa-2x" id="search-icon" onclick="clickSearch()"></i>
            <input type="search" name="search" placeholder="Search your nearest location ..." id="search">
        </div>
        <hr>
    </div>
    <div class="information">
        <?php 
            $num = mysqli_num_rows($result);
            // echo $num;
            if($num > 0){
                while($row = mysqli_fetch_assoc($result)){
                    if(!($row['Name'] == '' || $row['Address'] == '')){
        ?>
        <div class="contentinfo">
            <div class="info">
                <div class="top_section">
                    <div class="image-icons">
                        <img src="<?php echo $row['Photo'] ?>" alt="images" onerror="this.src='images/profile.png';" class="profile" />
                        <section class="img-icon">
                            <i class="fa fa-2x fa-github"></i>
                            <i class="fa fa-2x fa-facebook-square"></i>
                            <i class="fa fa-2x fa-twitter"></i>
                        </section>
                    </div>
                    <div class="userInfo">
                        <b style="text-decoration: underline; color:blue"><?php echo $row['Name'] ?></b>
                        <b><?php echo $row['Skill'] ?></b>
                        <b><?php echo $row['Address'] ?></b>
                    </div>
                </div>
                <div class="description">
                    <textarea name="desc" id="desc" disabled><?php echo $row['Description'] ?></textarea>
                </div>
                <a id="msg" href="mailto: <?php echo $row['Email'] ?>">
                    <input type="button" value="Direct Mail" id="message">
                </a>
            </div>
        </div>
        <?php
                }
            }
            }else{
                echo "no data found";
            }
            mysqli_close($conn);
        ?>
    </div>
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

    let searchBar = document.getElementById('search')

    function clickSearch() {

        if (searchBar.style.display == 'none') {
            searchBar.style.display = 'block'
        } else {
            searchBar.style.display = 'none'
        }
    }

</script>

</html>