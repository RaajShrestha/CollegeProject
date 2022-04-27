<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="terms.css"> -->
    <style><?php include "contact.css" ?></style>
    <style><?php include "terms.css" ?></style>
</head>

<body>
    <div class="container">
        <h2 id="logo">fEmployee</h2>
        <hr>
        <div class="content">
            <a href="main.php">
                <img src="images/back_button.png" alt="" id="back_sign">
            </a>
            <h1 class="contact-us">Contact Us</h1>
            <span><span>Send mail to:</span><span><a href="mailto:femployee@gmail.com?subject=Write%20your%20subject%20here.....&body=%0D%0A">fEmployee@gmail.com</a></span></span>
            <b>or</b>
            <p>Drop your message:</p>
            <textarea placeholder="Drop your message and we will respond you as soon as possible....."
                name="message" id="message" rows="10"></textarea>
            <input type="submit" value="Submit" id="submit">
        </div>
        <div class="last-section">
            <div class="chat">
                <div class="none">
                    <h3 class="h3">Chat Section</h3>
                    <img id="chatImage" src="images/chat.png" alt="images" onclick="clickImg()">
                </div>
                <div id="chat-section">
                    <div class="chatBot">
                        <textarea name="chatContent" id="chatContent" disabled>How can I help You ?</textarea>
                        <input type="text" name="chat" id="chat">
                    </div>
                </div>
            </div>
        </div>
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
    let chat = document.getElementById('chat-section')

    function clickImg() {
        if (chat.style.visibility == 'hidden') {
            chat.style.visibility = 'visible'
        } else {
            chat.style.visibility = 'hidden'
        }
    }
</script>

</html>