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
    <title>Terms And Condition</title>
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
                <h1>User Agreement</h1><br>
                <p>This Agreement was last modified on 5 Feb 2022.<br><br>
                    This User Agreement describes the terms and conditions which you accept by using our Website or our Services. We have incorporated by reference some linked information.</p><br><br>
                <h3>In this User Agreement:</h3>
                <p><b>"Account"</b> means the account must be associated with your email address.</p><br>
                <p><b>"Buyer"</b> means a User that purchases Seller Services or items from Sellers or identifies a Seller through the Website. A User may be both a Buyer and a Seller under this agreement.</p><br>
                <p><b>"Contest"</b> means a contest that is promoted by a Buyer and in respect of which a Seller can submit one or more entries via the Website.</p><br>
                <p><b>"Seller"</b> means a User that offers and provides services or identifies as a Seller through the Website. A User may be both a Buyer and a Seller under this agreement.</p><br>
                <p><b>"Seller Services"</b> means all services provided by a Seller.</p><br><br>
            </fieldset>

            <fieldset>
                <h1>1. Overview</h1><br>
                <p>We may amend this User Agreement and any linked information from time to time by posting amended terms on the Website, without notice to you.</p><br>
                <p>The Website is an online venue where Users buy and sell Seller Services and items. Sellers must register for an Account in order to sell Seller Services and/or items. The Website enables Users to work together online to complete and pay for Projects, buy and sell items and to use the services that we provide. We are not a party to any contractual agreements between Buyer and Seller in the online venue, we merely facilitate connections between the parties.</p><br>
                <p>We may, from time to time, and without notice, change or add to the Website or the information, products or services described in it. However, we do not undertake to keep the Website updated. We are not liable to you or anyone else if any error occurs in the information on the Website or if that information is not current.</p><br>
            </fieldset>

            <fieldset>
                <h1>2. Scope</h1><br>
                <p>Before using the Website, you must read the whole User Agreement, the Website policies and all linked information.</p><br>
                <p>You must read and accept all of the terms in, and linked to, this User Agreement, the Code of Conduct, the Freelancer Privacy Policy and all Website policies. By accepting this User Agreement as you access our Website, you agree that this User Agreement will apply whenever you use the Website, or when you use the tools we make available to interact with the Website. Some Websites may have additional or other terms that we provide to you when you use those services.You must read and accept all of the terms in, and linked to, this User Agreement, the Code of Conduct, the Freelancer Privacy Policy and all Website policies. By accepting this User Agreement as you access our Website, you agree that this User Agreement will apply whenever you use the Website, or when you use the tools we make available to interact with the Website. Some Websites may have additional or other terms that we provide to you when you use those services.</p><br>
            </fieldset>

            <fieldset>
                <h1>3. Eligibility</h1><br>
                <p>You will not use the Website if you:</p><br>
                <ol>
                    <li>are not able to form legally binding contracts;</li>
                    <li>are suspended from using the Website; or</li>
                    <li>do not hold a valid email address.</li>
                </ol><br>
                <p>All free user accounts are associated with individuals. Login credentials should not be shared by users with others. The individual associated with the account will be held responsible for all actions taken by the account, without limitation.</p><br>
                <p>Subject to your local laws, a person over 15 but under 18 can use an adult's account with the permission of the account holder. However, the account holder is responsible for all actions taken by the account, without limitation.</p><br>

            </fieldset>

            <fieldset>
                <h1>4. Using fEmployee</h1><br>
                <p>While using the Website, you will not attempt to or otherwise do any of the following:</p><br>
                <ol>
                    <li>post content or items in inappropriate categories or areas on our Websites and services;</li>
                    <li>infringe any laws, third party rights or our policies, such as the Code of Conduct;</li>
                    <li>fail to deliver payment for services delivered to you;</li>
                    <li>fail to deliver Seller Services purchased from you;</li>
                    <li>circumvent or manipulate our fee structure, the billing process, or fees owed to Freelancer;</li>
                </ol><br>
            </fieldset>

            <fieldset>
                <h1>5. Intellectual Property Rights Infringement</h1><br>
                <p>It is our policy to respond to clear notices of alleged intellectual property rights infringement. Our Copyright Infringement Policy is designed to make submitting notices of alleged infringement to us as straightforward as possible while reducing the number of notices that we receive that are fraudulent or difficult to understand or verify. If you believe that your Intellectual Property Rights have been violated, please notify us via <a style="color: blue; text-decoration: underline;" href="contact.html">this link</a> where you have a message option on our Website and we will investigate.</p>
                </ol><br>
            </fieldset>
        </div>

        <div class="adds">

        </div>


</body>

<script src="script.js"></script>

</html>