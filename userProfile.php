<?php
    session_start();

    if(isset($_SESSION['name'])){
        ?>

<?php include 'connectDatabase.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        <?php include "userProfile.css" ?>
    </style>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        <?php include "style.css" ?>
    </style>
    <!-- <link rel="stylesheet" href="terms.css"> -->
    <style>
        <?php include "terms.css" ?>
    </style>

    <!-- Google font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    



</head>

<body>
    <nav id="nav">
        <ul>
            <img src="images\ThreeLineDot.png" alt="" id="threeLine" onclick="displayThreeLine()" />
            <li><a href="main.php">Home</a></li>
            <li><a href="vacancy.php">Find Job</a></li>
        </ul>
        <h2 id="logo">fEmployee</h2>
        <a href="">
            <img src="<?php echo $_SESSION['photo']; ?>" id="profile1" alt="">
        </a>
        <!-- <a href="logout.php"><button>Logout</button></a> -->
    </nav>
    <section id="menus">
        <ul>
            <a href="">
                <img src="<?php echo $_SESSION['photo']; ?>" id="profile1" alt="">
            </a>
            <li><a href="main.php">Home</a></li>
            <li><a href="vacancy.php">Find Job</a></li>
            <li onclick="hideThreeLine()"><a>Exit</a></li>
        </ul>
        <img class="section-images" src="images\facebook-icon.png" alt="">
        <img class="section-images" src="images\instagram-icon.png" alt="">
        <img class="section-images" src="images\twitter-icon.png" alt="">
    </section>


    <div class="container">
        <fieldset class="user">
            <img src="<?php echo $_SESSION['photo']; ?>" id="profile" alt="">
            <img class="edit" style="order: 3; height: 30px; width: 30px; float: right;" src="images/edit.png" alt="">
            <div class="data">
                <a href=""><label for=""><?php echo $_SESSION['name']; ?></label></a>
                <label for=""><?php echo $_SESSION['address']; ?></label>
                <label for=""><?php echo $_SESSION['skill']; ?></label>
            </div>
        </fieldset>
        
        <hr>
        <fieldset class="skill">
            <div class="skillName">
                <label for=""><?php echo $_SESSION['skill']; ?><img class="edit" style="height: 30px; width: 30px; float: right;" src="images/edit.png" alt=""></label>
                
            </div>
            <div class="skillDesc">
                <div class="dk">
                    <img class="edit" style="height: 30px; width: 30px; float: right;" src="images/edit.png" alt="">
                    <h2 style="float: left; text-decoration: underline; margin: 10px;">User Description</h2>
                    <textarea name="" id="desc" disabled><?php echo $_SESSION['desc']; ?></textarea>
                </div>
            </div>
        </fieldset>
        <hr>
        <fieldset class="workingHistory">
            <h2 style="text-decoration: underline;" class="working-history">Working History</h2><br>
            <div class="company">
                <strong for="">AAA Company Ltd.</strong>
                <p>This is the project to make a logo for our company. We use the previous logo for a years and we want
                    to change the logo in a new design</p>
            </div>
            <div class="company">
                <strong for="">AAA Company Ltd.</strong>
                <p>This is the project to make a logo for our company. We use the previous logo for a years and we want
                    to change the logo in a new design</p>
                </div>
                <div class="company">
                <strong for="">AAA Company Ltd.</strong>
                <p>This is the project to make a logo for our company. We use the previous logo for a years and we want
                    to change the logo in a new design</p>
            </div>
        </fieldset>
        <hr>
        <fieldset class="portfolio">
            <h1>Portfolio</h1>
            <div class="add-port">

                <div class="image-upload">
                    <label for="file-input" id="inputFile">
                        <img src="images/plus-icon.png" class="plus-icon" height=' 100vw' width='100vw' />
                    </label><br>
                    <input id="file-input" type="file" name="image" onchange="loadFile(event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.html" />
                </div>
                <div id="output" class="output">
                    
                </div>

                <label for="" style="color: orange; font-size: clamp(10px, 3vw, 15px);">ShowCase your work to win more projects. Add items to impress clients.</label>
            </div>
        </fieldset>
        <hr>
        <fieldset class="hrs">
            <img class="edit" style="height: 30px; width: 30px; float: right;" src="images/edit.png" alt="">
            <h2>Working Hours</h2>
            <p>More than 3 hrs a day</p>
        </fieldset>
        <hr>
        <fieldset class="languages">
            <img class="edit" style="height: 30px; width: 30px; float: right;" src="images/edit.png" alt="">
            <h2>Skills</h2>
            <p>Nepali</p>
            <p>English</p>
            <p>Hindi</p>
        </fieldset>
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
    </div>
    <?php
    }else{
        echo "You are logged out";
        header('location:login.php');
    }
    ?>
</body>

<script src="script.js"></script>

<script>
    var loadFile = function (event) {
        document.getElementById('output').style.display = 'block';
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('output').style.outline = '4px solid black';
    };
</script>

</html>