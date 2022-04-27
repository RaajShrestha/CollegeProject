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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fEmployee</title>

    <style><?php include "style.css" ?></style>
    <style><?php include "content.css" ?></style>
    <style><?php include "background.css" ?></style>
    <link rel="stylesheet" href="lastContent.css" />
    <style><?php include "terms.css" ?></style>
    <style><?php include "skill-categories.css" ?></style>
    <style><?php include "belowContent.css" ?></style>

    <!-- Google font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
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
        <a href="contact.php"><button id="contact_btn">Contact</button></a>
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
            <li><a href="about.php">About</a></li>
            <li onclick="hideThreeLine()"><a>Exit</a></li>
        </ul>
        <img class="section-images" src="images/facebook-icon.png" alt="">
        <img class="section-images" src="images/instagram-icon.png" alt="">
        <img class="section-images" src="images/twitter-icon.png" alt="">
    </section>
    
    <!-- Images of the background -->
    <div class="transparent" id="transparent">
        
        </div>
        
        <!-- Content of below the navigation bar -->
        <div class="content-container" id="content_container">
            <b class="first-content">Find Employee</b>
            <h1 class="first-content-heading heading">
                Hire the best freelancer for any job as physical or online.
            </h1>
            <p class="first-content-paragraph paragraph">
                Millions of people are using fEmployee site not to browse only but to
                make their dream into reality.
            </p>
            <div class="space"></div>
            <div class="buttons">
                <a href="hire.php"><button class="hire buttonhf">Hire Workers</button></a>
                <a href="open.html"><button class="find buttonhf">Open Vacancy</button></a>
            </div>
        </div>
        
        <hr>
        <!-- Main Informaion -->
        <h1 class="heading-info">Recently Joined Freelancers...</h1>
        <div class="informations">
            <div class="information">
                <?php 
                    $sql = "SELECT * FROM registration ORDER BY `S.N.` DESC LIMIT 7";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        die ("Error in Selecting Database , <br> Please check!!!");
                    }
                    $num = mysqli_num_rows($result);
                    // echo $num;
                    if($num > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            if (!($row['Name'] == '' || $row['Address'] == '')){
                                if(!$loggedin){
                                    echo '<div class="contentinfo">
                                        <div class="info">
                                            <div class="top_section">
                                                <div class="image-icons">
                                                    <img src="' .$row["Photo"] .'" alt="images" onerror="this.src="images/profile.png";" class="profile" />
                                                    <section class="img-icon">
                                                        <i class="fa fa-2x fa-github"></i>
                                                        <i class="fa fa-2x fa-facebook-square"></i>
                                                        <i class="fa fa-2x fa-twitter"></i>
                                                    </section>
                                                </div>
                                                <div class="userInfo">
                                                    <b style="text-decoration: underline; color:blue">' .$row["Name"] .'</b>
                                                    <b>' .$row["Skill"] .'</b>
                                                    <b>' .$row["Address"] .'</b>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <textarea name="desc" id="desc" disabled>' .$row["Description"]. '</textarea>
                                            </div>
                                            <a id="msg" href="mailto: ' .$row["Email"] .'">
                                                <input type="button" value="Direct Mail" id="message">
                                            </a>
                                        </div>
                                    </div>';
                                }else{
                                    $sql = "SELECT * FROM openvacancy ORDER BY `S.N.` DESC LIMIT 7";
                                    $result = mysqli_query($conn, $sql);
                                    if(!$result){
                                        die ("Error in Selecting Database , <br> Please check!!!");
                                    }
                                    $num = mysqli_num_rows($result);
                                    // echo $num;
                                    if($num > 0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo '<div class="vacancy_content" id="vacancy_content">
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
                                                <div class="vacancy_description">
                                                    <textarea disabled name="description" id="description" rows="10" disabled>' . $row['Description'] . '</textarea>
                                                </div>
                                                <input type="button" id="vacancy_button" value="Enroll">
                                            </div>';
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        echo "no data found";
                    }
                    mysqli_close($conn);
            ?>
        </div>
    </div>
    <hr>

    <div class="last-content">

        <div class="hiring-process">
            <h1 class="heading-info">How to hire ?</h1>
            <h3><span class="material-icons">perm_identity</span>Hire Workers</h3>
            <h5>This is very simple to hire workers. You just need to click the button then search workers from your nearby locations.</h5>

        </div>

        <div class="hiring-process">
            <h1 class="heading-info">Open Job vacancy</h1>
            <h3><span class="material-icons">open_in_new</span>Open Vacancy</h3>
            <h5>Go to open vacancy and fill up the form.</h5>

        </div>

        <div class="hiring-process">
            <h1 class="heading-info">About Payment</h1>
            <h3><span class="material-icons">
                    money
                </span>Physical job</h3>
            <h5>The workers are mostly as physical. So, you can easily get the money or check from the clients.</h5>
            <h3><span class="material-icons">
                    card_travel
                </span>Online job</h3>
            <h5>You can get your payment from eEewa, khalti, paypal, etc. from around the world.</h5>

        </div>

    </div>
    <hr>
    <h1 class="heading-info">Get workers from different skill categories !</h1>
    <div class="skill-categories">
        <div class="skill">
            <span><i class="fa fa-dollar-sign"></i></span>
            <span class="skills">PHP</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-code"></i></span>
            <span class="skills">Python</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-database"></i></span>
            <span class="skills">Web development</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-edit"></i></span>
            <span class="skills">Content Writing</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-pencil"></i></span>
            <span class="skills">Graphic Design</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-android"></i></span>
            <span class="skills">Android Apps</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-apple"></i></span>
            <span class="skills">IOS Apps</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-bolt"></i></span>
            <span class="skills">Electrician</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-wrench"></i></span>
            <span class="skills">Plumber</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-paint-brush"></i></span>
            <span class="skills">Photoshop</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-file-excel"></i></span>
            <span class="skills">Excel</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-search"></i></span>
            <span class="skills">Research</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-table"></i></span>
            <span class="skills">Data Entry</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-line-chart"></i></span>
            <span class="skills">eCommerce</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-area-chart"></i></span>
            <span class="skills">Marketing</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-html5"></i></span>
            <span class="skills">HTML</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-css3"></i></span>
            <span class="skills">CSS</span>
        </div>
        <div class="skill">
            <span><i class="fa fa-file-code-o"></i></span>
            <span class="skills">JavaScript</span>
        </div>
    </div>
    <div class="terms-conditions">
        <div class="terms">
            <h1 id="terms">Terms</h1>
            <a href="privacyPolicy.php" class="privacyPolicy">Privacy Policy</a>
            <a href="termsCondition.php" class="privacyPolicy">Terms and Conditions</a>
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

</body>


<script src="script.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.js" integrity="sha512-AsoAG+OFcSvtqlspW166UTUYg7F4GEu0yNhzTIRfOGysIQA8Dqk1WZwyoN4eX6mX4DaSk703Q1iM0M47rw25Kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script>
    // function noClick() {
    //     alert("You have to register first!!!");
    //     document.getElementById('startSignup').style.backgroundColor = 'red';
    // }
</script>
</html>