<?php
    session_start();

    if(isset($_SESSION['email']) && $_SESSION['email'] == true){
        $loggedin = true;
    }else{
        $loggedin = false;
    }
    
?>

<?php include_once "connectDatabase.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <link rel="stylesheet" href="termsCondition.css">
    <link rel="stylesheet" href="form.css">

</head>
<body>
<header>
        <h2 id="logo">fEmployee</h2>
        <ul>
            <?php
            if($loggedin){
                echo '<a href="logout.php">
                <li id="startLogin" style="margin-left: -50%;">Logout</li>
                </a>
                <a href="userProfile.php">
                <img src="' . $_SESSION["photo"] . '" style="border-radius: 50%;" id="profile2" alt="">
                </a>';
            }
            if(!$loggedin){
                echo '<a href="registration.html">
                    <li  id="startSignup">Registration</li>
                </a>
                <a href="login.php">
                    <li id="startLogin">Login</li>
                </a>';
            }
            ?>
        </ul>
    </header>
    <div class="alert" id="alert">Form has been submitted successfully !</div>
    <nav id="nav">
        <ul>
            <img src="images/ThreeLineDot.png" alt="" id="threeLine" onclick="displayThreeLine()" />
            <!-- <a href="userProfile.php">
                <img src="images/profile.png" id="profile2" alt="">
            </a> -->
            <li><a href="main.php">Home</a></li>
            <li><a <?php 
            if($loggedin){
                echo 'href="vacancy.php"';
            }
            ?>>Find Vacancies</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
        <a href="contact.html"><button id="contact_btn">Contact</button></a>
    </nav>
    <section id="menus">
        <ul>
            <!-- <a href="userProfile.php">
                <img src="images/profile.png" id="profile1" alt="">
            </a> -->
            <li><a href="main.php">Home</a></li>
            <li><a <?php 
            if($loggedin){
                echo 'href="vacancy.php"';
            }
            ?>>Find Vacancies</a></li>
            <li><a href="about.html">About</a></li>
            <li onclick="hideThreeLine()"><a>Exit</a></li>
        </ul>
        <img class="section-images" src="images/facebook-icon.png" alt="">
        <img class="section-images" src="images/instagram-icon.png" alt="">
        <img class="section-images" src="images/twitter-icon.png" alt="">
    </section>
    <div class="container" id="container">

        <div class="content">
            <fieldset>
                <h1>Privacy Policy</h1>
                <p> This Privacy Policy tells you fEmployee's policies and procedures for the collection, use, and disclosure of information through www.femployee.com . It includes websites, features, applications, widgets, or online services owned or controlled by fEmployee and that post a link to this Privacy Policy (together with the Site, the "Service"). It also includes any information fEmployee collects offline in connection with the Service. <br><br>
                    This Privacy Policy describes the choices available to you for the use of, your access to, and how to update and correct your personal information . This Privacy Policy incorporates by reference the fEmployee Global Data Processing Agreement. Note that we combine the information we collect from you from the Site, through the Service generally.</p>
            </fieldset>
            
            <fieldset>
                <h1>1. INFORMATION COLLECTION</h1>
                <p><i>When you use the Service, you may provide us with information about you. This may include your name and contact information, financial information to make or receive payment for services obtained through the fEmployee platform, or information to help us fill out tax forms. When you use the Service, we may also collect information related to your use of the Service and aggregate this with information about other users. This helps us improve our Services for you.</i></p>
            </fieldset>
    
            <fieldset>
                <h1>2. USE OF INFORMATION</h1>
                <p><i>We use information collected through the Service to provide and improve the Service, process your requests, prevent fraud, provide you with information and advertising that may interest you, comply with the law, and as otherwise permitted with your consent.</i></p>
            </fieldset>
    
            <fieldset>
                <h1>3. INFORMATION SHARING AND DISCLOSURE</h1>
                <p><i>We may share information about you to provide the Services, for legal and investigative purposes, in connection with sweepstakes and promotions, or if we are part of a merger or acquisition.</i></p><br><br>
                <p>We may share aggregated Non-Identifying Information and we may otherwise disclose Non-Identifying Information (including, without limitation, Hashed Information) to third parties. We do not share your Personal Information with third parties for those third parties marketing purposes unless we first provide you with the opportunity to opt-in to or opt-out of such sharing. We may also share the information we have collected about you, including Personal Information, as disclosed at the time you provide your information, with your consent, as otherwise described in this Privacy Policy.</p>
            </fieldset>
    
        </div>

        <div class="adds">

        </div>
    </div>
</body>

<script src="script.js"></script>

</html>