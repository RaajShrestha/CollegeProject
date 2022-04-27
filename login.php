<?php session_start(); ?>

<?php include 'connectDatabase.php' ?>

<?php
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM `registration` where Email = '$email'";
        $result = mysqli_query($conn, $sql);
        
        $num = mysqli_num_rows($result);
        if($num){
            $row = mysqli_fetch_assoc($result);

            $db_pass = $row['Password'];

            $_SESSION['name'] = $row['Name'];
            $_SESSION['gender'] = $row['Gender'];
            $_SESSION['address'] = $row['Address'];
            $_SESSION['skill'] = $row['Skill'];
            $_SESSION['exp'] = $row['Experience'];
            $_SESSION['desc'] = $row['Description'];
            $_SESSION['photo'] = $row['Photo'];
            $_SESSION['email'] = $row['Email'];

            $pass_decode = password_verify($pass, $db_pass);

            if($pass_decode){
                if(!($row['Name'] == '' || $row['Photo'] == '' || $row['Address'] == '')){
                    header('location:main.php');
                }else{
                    header ('location:main.php');     
                }
                ?>
                <!-- <script>
                    //  or you can do in javascript
                    location.replace("main.php");
                </script> -->
                <?php
            }else{
                echo "password incorrect";
            }
        }else{
            echo "invalid email";
        }

    }else{
        // echo "error occur";
    }
    mysqli_close($conn);
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="logo\logo.css">

    <title>User Login</title>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="images/employee.jfif" class="img-fluid w-100" alt="Reponsive image">
                        <center><h2 id="logo" class="text-center mb-4 mb-4">fEmployee</h2></center>
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-4">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="d-flex flex-row align-items-center justify-content-start">
                            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                            <button type="button" class="btn btn-primary btn-floating mx-3">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4" name="error" id="error"></label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="forgot.php" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <div class="mt4 text-end justify-content-around w-100" >
                                <input type="submit" name="submit" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login">
                                <!-- <a href="signup.html">
                                    <button type="button" name="signupbtn" class="btn btn-danger btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign Up</button>
                                </a> -->
                            </div>
                                
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                                <a href="registration.html" class="link">Register</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</body>

</html>